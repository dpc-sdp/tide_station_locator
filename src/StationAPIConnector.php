<?php

namespace Drupal\tide_station_locator;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Logger\LoggerChannelFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\RequestOptions;
use Drupal\Core\File\FileSystemInterface;

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
      // Path to your .crt and .key files.
      $certPath = '/app/keys/nonprod/api.crt';
      $keyPath = '/app/keys/nonprod/api.pem';
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
    catch (\Exception $e) {
      $this->logger->get('tide_station_locator connect API.')
        ->error('BadResponse error: @error', ['@error' => $e->getResponse()]);
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
   * @param bool $delta
   *   Delta boolean.
   *
   * @return mixed
   *   Full data.
   */
  public function getApiResponse($client, $accessToken, $rdm_auth, $delta) {
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
        RequestOptions::JSON => $this->apiQueryPayload($delta),
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
        ->error('BadResponse error: @error', ['@error' => $e->getResponse()]);
      return FALSE;
    }

    return [];
  }

  /**
   * Helper method to get the Query Payload.
   *
   * @param bool $delta
   *   Whether the update or full migration required.
   *
   * @return array
   *   Payload.
   */
  public function apiQueryPayload($delta = FALSE) {
    // Get the 'last_api_access'.
    $config = $this->configFactory->getEditable('tide_station_locator.settings');
    $last_api_access = $config->get('last_api_access');

    if ($delta && !empty($last_api_access)) {
      $payload = [
        'name' => 'STATION_LOCATION',
        "productKey" => -1,
        'attributes' => [
          [
            'name' => 'RECORD_MODDATE',
            'value' => [$last_api_access],
            'operator' => 'gt',
            'caseSensitive' => FALSE,
          ],
        ],
      ];
    }
    else {
      $payload = [
        'name' => 'STATION_LOCATION',
        'attributes' => [
          [
            'name' => 'ACTIVE',
            'value' => ['Y'],
            'caseSensitive' => FALSE,
          ],
        ],
        'startIndex' => 1,
      ];
    }

    return $payload;
  }

  /**
   * Helper method to format and save the JSON file.
   *
   * @param array $stations
   *   Records array.
   *
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function getFormattedStationResponse($stations) {
    // Process the data so that we can save it in a format we need.
    $final_stations = [];
    foreach ($stations as $key => $station) {
      // Loop through attributes.
      foreach ($station['attributes'] as $attribute) {
        // Add attribute name as the key.
        $station[$attribute['name']] = $attribute['value'];
      }
      unset($station['attributes']);
      $final_stations['records'][$key] = $station;
    }

    $file_save_path_stream_directory = 'public://';
    $this->fileSystem->prepareDirectory($file_save_path_stream_directory, FileSystemInterface::CREATE_DIRECTORY | FileSystemInterface::MODIFY_PERMISSIONS);

    // Save the stations JSON.
    $stationsFileLocation = $file_save_path_stream_directory . '/' . 'stations.json';
    $stationsFile = file_save_data(json_encode($final_stations), $stationsFileLocation, FileSystemInterface::EXISTS_REPLACE);
  }

}
