<?php

namespace Drupal\tide_station_locator;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\File\FileSystemInterface;
use Drupal\Core\Logger\LoggerChannelFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\RequestOptions;

/**
 * Connects to station locator API.
 */
class StationAPIConnector {

  /**
   * Drupal\Core\Config\ConfigFactoryInterface definition.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Drupal\Core\Logger\LoggerChannelFactory definition.
   *
   * @var \Drupal\Core\Logger\LoggerChannelFactory
   */
  protected $logger;

  /**
   * The file system service.
   *
   * @var \Drupal\Core\File\FileSystemInterface
   */
  protected $fileSystem;

  /**
   * Constructor for the class.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $configFactory
   *   Config factory.
   * @param \Drupal\Core\Logger\LoggerChannelFactory $logger
   *   Logger.
   * @param \Drupal\Core\File\FileSystemInterface $file_system
   *   File system.
   */
  public function __construct(ConfigFactoryInterface $configFactory, LoggerChannelFactory $logger, FileSystemInterface $file_system) {
    $this->configFactory = $configFactory;
    $this->logger = $logger;
    $this->fileSystem = $file_system;
  }

  /**
   * Helper method to connect API.
   *
   * @return mixed
   *   Client Id, Access token, Rdm auth values.
   */
  public function connectApi() {
    try {
      // Get the folder.
      $folder = (getenv('LAGOON_ENVIRONMENT_TYPE') !== 'production') ? 'nonprod' : 'production';
      // Path to your .crt and .key files.
      $certPath = '/app/keys/' . $folder . '/api.crt';
      $keyPath = '/app/keys/' . $folder . '/api.pem';
      // Path to the CA bundle file.
      $caBundlePath = '/app/keys/cacert.pem';

      // Initiating variables to escape phpcs errors.
      $apiUrl = getenv('API_URL');

      // OAuth configuration variables.
      $tokenEndpoint = getenv('TOKEN_END_POINT');
      $clientId = getenv('CLIENT_ID');
      $clientSecret = getenv('CLIENT_SECRET');
      $rdm_auth = getenv('RDM_AUTH');

      $client = new Client([
        'base_uri' => $apiUrl,
        'curl' => [
          CURLOPT_SSLCERT => $certPath,
          CURLOPT_SSLKEY => $keyPath,
          CURLOPT_CAINFO => $caBundlePath,
        ],
      ]);

      $accessToken = NULL;

      $response = $client->post($tokenEndpoint, [
        RequestOptions::FORM_PARAMS => [
          'grant_type' => 'client_credentials',
          'client_id' => $clientId,
          'client_secret' => $clientSecret,
        ],
      ]);

      $data = json_decode($response->getBody()->getContents(), TRUE);
      $accessToken = $data['access_token'];

      return [
        'clientId' => $client,
        'accessToken' => $accessToken,
        'rdm_auth' => $rdm_auth,
      ];
    }
    catch (BadResponseException $e) {
      $this->logger->get('tide_station_locator connect API.')
        ->error('BadResponse error: @error', ['@error' => $e->getMessage()]);
      return FALSE;
    }
  }

  /**
   * Get API response.
   *
   * @param string $client
   *   Client ID.
   * @param string $accessToken
   *   Access token.
   * @param string $rdm_auth
   *   Rdm Auth.
   *
   * @return mixed
   *   Full data.
   */
  public function getApiResponse(string $client, string $accessToken, string $rdm_auth) {
    try {
      // Make an API request.
      $response = $client->post('technology/rdm/3.0.0/STATION_LOCATION/search', [
        RequestOptions::HEADERS => [
          'Authorization' => 'Bearer ' . $accessToken,
          'rdmAuthorization' => $rdm_auth,
          'Accept' => '*/*',
          'Content-Type' => 'application/json',
          'Accept-Encoding' => 'gzip, deflate, br',
        ],
        RequestOptions::JSON => $this->apiQueryPayload(),
      ]);

      if ($response->getStatusCode() == '200') {
        // Get the config.
        $config = $this->configFactory->getEditable('tide_station_locator.settings');
        // Update 'last_api_access'.
        $config->set('last_api_access', date('Y-m-d h:i:s'))->save();

        // Get the response body.
        $body = $response->getBody()->getContents();

        $full_data = json_decode($body, TRUE);

        return $full_data;
      }
    }
    catch (BadResponseException $e) {
      $this->logger->get('tide_station_locator API response')
        ->error('BadResponse error: @error', ['@error' => $e->getMessage()]);
      return FALSE;
    }

    return [];
  }

  /**
   * Helper method to get the Query Payload.
   *
   * @return array
   *   Payload.
   */
  public function apiQueryPayload() {
    return [
      'name' => 'STATION_LOCATION',
      'attributes' => [
        [
          'name' => 'ACTIVE',
          'value' => ['Y'],
          'caseSensitive' => FALSE,
        ],
      ],
      'startIndex' => 1,
      'recordCount' => 500,
    ];
  }

  /**
   * Helper method to format and save the JSON file.
   *
   * @param array $stations
   *   Records array.
   *
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function getFormattedStationResponse(array $stations) {
    $final_stations = $speciality_keys = [];

    $speciality_terms = \Drupal::entityTypeManager()
      ->getStorage('taxonomy_term')
      ->loadByProperties(['vid' => 'specialty_services_or_facilities']);

    foreach ($speciality_terms as $speciality_term) {
      if (is_object($speciality_term)) {
        $key = $speciality_term->get('field_key')->getValue()[0]['value'] ?? 'null';
        $speciality_keys[$key] = $key;
      }
    }

    $i = 0;
    // Process the data so that we can save it in a format we need.
    foreach ($stations as $key => $station) {
      // Loop through attributes.
      foreach ($station['attributes'] as $attribute) {
        if (html_entity_decode($attribute['value']) == 'Y' && in_array($attribute['name'], $speciality_keys)) {
          $station['specialty_services'][] = [$attribute['name'], html_entity_decode($attribute['displayName'])];
        }
        // Fetch the accessibility values.
        elseif ($attribute['name'] == 'Accessibility') {
          $accessibility_array = explode(",", $attribute['value']);
          if (isset($accessibility_array) && is_array($accessibility_array)) {
            foreach ($accessibility_array as $item) {
              $trimmed_item = trim($item);
              // Getting rif od non-breaking space.
              $trimmed_item = trim($trimmed_item, " \t\n\r\0\x0B\xc2\xa0");
              if ($trimmed_item === "") {
                continue;
              }
              $station['Accessibility'][] = ucfirst(html_entity_decode($trimmed_item));
            }
          }
        }
        else {
          // Add attribute name as the key.
          $station[$attribute['name']] = html_entity_decode($attribute['value']);
        }

        // If the date is empty set default value.
        if ($attribute['name'] == 'ValidFromDt' && empty($attribute['value'])) {
          $station['ValidFromDt'] = '1900-01-01';
        }
        // If the date is empty set default value.
        if ($attribute['name'] == 'ValidToDt' && empty($attribute['value'])) {
          $station['ValidToDt'] = '9999-12-31';
        }
      }
      unset($station['attributes']);
      $final_stations['records'][$key] = $station;
    }

    $file_save_path_stream_directory = 'public://';
    $this->fileSystem->prepareDirectory($file_save_path_stream_directory, FileSystemInterface::CREATE_DIRECTORY | FileSystemInterface::MODIFY_PERMISSIONS);

    // Save the stations JSON.
    $stationsFileLocation = $file_save_path_stream_directory . '/' . 'stations.json';
    $stationsFile = \Drupal::service('file.repository')->writeData(json_encode($final_stations), $stationsFileLocation, FileSystemInterface::EXISTS_REPLACE);
  }

}
