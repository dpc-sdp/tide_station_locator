<?php

namespace Drupal\tide_station_locator\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\CSV;

/**
 * Source plugin for CSV terms migration.
 *
 * @MigrateSource(
 *   id = "tide_station_locator_accessibility_terms",
 *   source_module = "tide_station_locator",
 * )
 */
class StationAccessibilityTerms extends CSV {

  /**
   * {@inheritdoc}
   */
  public function fields() {
    return [
      'term_name' => $this->t('Term Name'),
    ];
  }

}