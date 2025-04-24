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
   * @aliases mvps
   * @validate-module-enabled tide_station_locator
   */
  public function importStations() {
    tide_station_locator_get_api_data();
  }

}
