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
  public function connect_api() {
    try {
      // Path to your .crt and .key files.
      $certPath = '/app/keys/non-prod-client.cer';
      $keyPath = '/app/keys/non-prod-key.key';
      // Path to the CA bundle file.
      $caBundlePath = '/app/keys/cacert.pem';

      // Initiating variables to escape phpcs errors.
      $apiUrl = '';
      // OAuth configuration variables.
      $tokenEndpoint = '';
      $clientId = '';
      $clientSecret = '';
      $rdm_auth = '';

      require "/app/keys/variables.php";

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
        'rdm_auth' => $rdm_auth
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
  public function get_api_response($client, $accessToken, $rdm_auth, $delta) {
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
        RequestOptions::JSON => $this->api_query_payload($delta),
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
   * @return array
   *   Payload.
   */
  public function api_query_payload($delta = FALSE) {
    // Get the 'last_api_access'.
    $config = $this->configFactory->getEditable('tide_station_locator.settings');

    if ($delta && !empty($config->get('last_api_access'))) {
      $payload = [
        'name' => 'STATION_LOCATION',
        "productKey" => -1,
        'attributes' => [
          [
            'name' => 'RECORD_MODDATE',
            'value' => [$config->get('last_api_access')],
            'operator' => 'gt',
            'caseSensitive' => FALSE,
          ],
        ]
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
        'recordCount' => 5,
      ];
    }

    return $payload;
  }

  /**
   * Helper method to get the 'last_access_api'.
   *
   * @return string
   *   Config value last_api_access.
   */
  public function get_last_access_api() {
    $config = $this->configFactory->getEditable('tide_station_locator.settings');
    if (empty($config->get('last_api_access'))) {
      $config->set('last_api_access', date('Y-m-d h:i:s'))->save();
    }

    return $config->get('last_api_access');
  }

  /**
   * Helper method to format and save the JSON file.
   *
   * @param $stations
   *   Records array.
   *
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function get_formatted_station_response($stations) {
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
    $fileLocation = $file_save_path_stream_directory . '/' . 'stations.json';
    // Save the processed JSON file.
    $file = file_save_data(json_encode($final_stations), $fileLocation, FileSystemInterface::EXISTS_REPLACE);
  }

}
