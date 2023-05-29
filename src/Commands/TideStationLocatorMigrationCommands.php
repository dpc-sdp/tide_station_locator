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

  /**
   * Import State terms.
   *
   * @usage drush migrate-state
   *   Import stations.
   *
   * @command migrate-states
   * @aliases m-states
   * @validate-module-enabled tide_station_locator
   */
  public function importStates() {
    tide_station_locator_migrate_state();
  }

  /**
   * Import Speciality terms.
   *
   * @usage drush migrate-speciality
   *   Import speciality terms.
   *
   * @command migrate-speciality
   * @aliases m-speciality
   * @validate-module-enabled tide_station_locator
   */
  public function importSpeciality() {
    tide_station_locator_migrate_speciality();
  }

  /**
   * Import Accessibility terms.
   *
   * @usage drush migrate-accessibility
   *   Import accessibility terms.
   *
   * @command migrate-accessibility
   * @aliases m-accessibility
   * @validate-module-enabled tide_station_locator
   */
  public function importAccessibility() {
    tide_station_locator_migrate_accessibility();
  }

}
