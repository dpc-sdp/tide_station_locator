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
        ->error('BadResponse error: @error', ['@error' => $e->getMessage()]);
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
        'recordCount' => 500,
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
        'recordCount' => 500,
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
  public function getFormattedStationResponse(array $stations) {
    $speciality_keys = [
      'Crime_Investigate_Unit_CIU',
      'Crime_Prevent_Officer_CPO',
      'FVIU',
      'FVLO',
      'FCLO',
      'Justice_Of_The_Peace',
      'LGBTIQ_Liaison_Officer_LLO',
      'Neighbourhood_Watch',
      'Pro_active_Police_Unit_PPU',
      'Regional_Firearms_Officers',
      'SOCIT',
      'Victim_Assist_Supp_Officer',
      'Youth_Resource_Officer',
    ];

    $final_stations = $states = $speciality_terms = [];

    // We want the accessibility terms to be in a certain order.
    // So initialising it.
    $accessibility_terms = [
      'Front entrance ground level' => 'Front entrance ground level',
      'Automatic entrance door' => 'Automatic entrance door',
      'Wheelchair/ramp access Internal' => 'Wheelchair/ramp access Internal',
      'Wheelchair/ramp access External' => 'Wheelchair/ramp access External',
      'Accessible parking' => 'Accessible parking',
      'Internal parking lift access' => 'Internal parking lift access',
      'Automatic lift door' => 'Automatic lift door',
      'Accessible toilet public/interior' => 'Accessible toilet public/interior',
      'Hearing loop' => 'Hearing loop',
      'Audible level recognition' => 'Audible level recognition',
      'SCOPE Communication Access accredited police station' => 'SCOPE Communication Access accredited police station',
      'Lift braille buttons' => 'Lift braille buttons',
      'External/entrance braille signage' => 'External/entrance braille signage',
      'Internal braille signage' => 'Internal braille signage',
    ];

    $i = 0;
    // Process the data so that we can save it in a format we need.
    foreach ($stations as $key => $station) {
      // Loop through attributes.
      foreach ($station['attributes'] as $attribute) {
        // Add attribute name as the key.
        $station[$attribute['name']] = html_entity_decode($attribute['value']);

        if ($attribute['name'] == 'State_Name') {
          $states[$key] = $attribute['value'];
        }
        if ($attribute['name'] == 'Accessibility') {
          $accessibility_terms_array = explode(",", $attribute['value']);
          if (isset($accessibility_terms_array) && is_array($accessibility_terms_array)) {
            foreach ($accessibility_terms_array as $key1 => $item) {
              $trimmed_item = trim($item);
              // Getting rif od non-breaking space.
              $trimmed_item = trim($trimmed_item, " \t\n\r\0\x0B\xc2\xa0");
              if ($trimmed_item === "") {
                continue;
              }
              // Check for same term but with different case.
              $accessibility_keys = array_keys($accessibility_terms);
              if (array_search(strtolower($trimmed_item), array_map('strtolower', $accessibility_keys))) {
                continue;
              }

              $accessibility_terms[$trimmed_item] = html_entity_decode($trimmed_item);
            }
          }
        }
        if (in_array($attribute['name'], $speciality_keys)) {
          if (!empty($attribute['value'])) {
            $speciality_terms[$i] = html_entity_decode($attribute['value']);
            $i++;
          }
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

    // Save the state csv.
    $stateFileLocation = $file_save_path_stream_directory . '/' . 'state.csv';
    $stateFile = fopen($stateFileLocation, 'w');
    array_unshift($states, 'term_name');
    // Write data in the CSV format.
    foreach (array_unique($states) as $state) {
      fputcsv($stateFile, [$state]);
    }
    // Close the stream.
    fclose($stateFile);

    // Save the accessibility csv.
    $accessibilityFileLocation = $file_save_path_stream_directory . '/' . 'accessibility.csv';
    $accessibilityFile = fopen($accessibilityFileLocation, 'w');
    array_unshift($accessibility_terms, 'term_name');
    // Write data in the CSV format.
    foreach (array_unique($accessibility_terms) as $accessibility) {
      fputcsv($accessibilityFile, [$accessibility]);
    }
    // Close the stream.
    fclose($accessibilityFile);

    // Save the specialityservicesandfacility csv.
    $specialityFileLocation = $file_save_path_stream_directory . '/' . 'specialityservicesandfacility.csv';
    $specialityFile = fopen($specialityFileLocation, 'w');
    array_unshift($speciality_terms, 'term_name');
    // Write data in the CSV format.
    foreach (array_unique($speciality_terms) as $speciality) {
      fputcsv($specialityFile, [$speciality]);
    }
    // Close the stream.
    fclose($specialityFile);
  }

}
