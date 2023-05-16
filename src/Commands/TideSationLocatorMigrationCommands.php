<?php

namespace Drupal\tide_station_locator\Commands;

use Drush\Commands\DrushCommands;

/**
 * Class TideSationLocatorMigrationCommands.
 *
 * @package Drupal\tide_station_locator\Commands
 */
class TideSationLocatorMigrationCommands extends DrushCommands {

  public function __construct() {
    parent::__construct();
  }

  /**
   * Import Stations.
   *
   * @usage drush stations-migration-cron
   *   Import stations.
   *
   * @command stations-migration-cron
   * @validate-module-enabled tide_station_locator
   */
  public function importStations() {
    tide_station_locator_migrate_stations();
  }
}
