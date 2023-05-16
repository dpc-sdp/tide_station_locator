<?php

/**
 * @file
 * Drush integration for the vpsc_lobbyists_migration module.
 */

/**
 * Implements hook_drush_help().
 */
function tide_station_locator_drush_help($section) {
  switch ($section) {
    case 'stations-migration-cron':
      return dt('Run cron for the tide_station_locator module');
  }
}

/**
 * Implements hook_drush_command().
 */
function tide_station_locator_drush_command() {
  $commands['stations-migration-cron'] = [
    'description' => dt('Run cron for the tide_station_locator module'),
  ];

  return $commands;
}

/**
 * Run cron.
 */
function drush_tide_station_locator_cron() {
  tide_station_locator_migrate_stations();
}
