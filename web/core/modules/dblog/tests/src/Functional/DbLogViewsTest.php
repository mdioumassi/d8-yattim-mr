<?php

namespace Drupal\Tests\dblog\Functional;

use Drupal\views\Views;

/**
 * Generate events and verify dblog entries; verify user access to log reports
 * based on permissions. Using the dblog UI generated by a View.
 *
 * @see Drupal\dblog\Tests\DbLogTest
 *
 * @group dblog
 */
class DbLogViewsTest extends DbLogTest {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = [
    'dblog',
    'node',
    'forum',
    'help',
    'block',
    'views',
  ];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'classy';

  /**
   * {@inheritdoc}
   */
  protected function getLogsEntriesTable() {
    return $this->xpath('.//table[contains(@class, "views-view-table")]/tbody/tr');
  }

  /**
   * {@inheritdoc}
   */
  protected function filterLogsEntries($type = NULL, $severity = NULL) {
    $query = [];
    if (isset($type)) {
      $query['type[]'] = $type;
    }
    if (isset($severity)) {
      $query['severity[]'] = $severity;
    }

    $this->drupalGet('admin/reports/dblog', ['query' => $query]);
  }

  /**
   * Tests the empty text for the watchdog view is not using an input format.
   */
  public function testEmptyText() {
    $view = Views::getView('watchdog');
    $data = $view->storage->toArray();
    $area = $data['display']['default']['display_options']['empty']['area'];

    $this->assertEqual('text_custom', $area['plugin_id']);
    $this->assertEqual('area_text_custom', $area['field']);
    $this->assertEqual('No log messages available.', $area['content']);
  }

}
