<?php

namespace Drupal\tide_station_locator\Commands;

use Drush\Commands\DrushCommands;

/**
 * Defines the drush command for Tide station locator.
 *
 * @package Drupal\tide_station_locator\Commands
 */
class TideStationLocatorMigrationCommands extends DrushCommands {

  /**
   * Import Stations.
   *
   * @usage drush migrate-stations
   *   Import stations.
   *
   * @command migrate-stations
   * @aliases ms
   * @validate-module-enabled tide_station_locator
   *
   * @option delta
   *   Optional delta if we only want to migrate updated stations.
   */
  public function importStations(array $options = ['delta' => FALSE]) {
    tide_station_locator_migrate_stations($options);
  }

}
