<?php

namespace Drupal\tb08\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Example: uppercase this please' block.
 *
 * @Block(
 *   id = "example_uppercase",
 *   admin_label = @Translation("Example: uppercase this please")
 * )
 */
class ExampleUppercaseBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    // $values = \Drupal::database()->select('node_card')->fields('node_card', ['front_card'])->range(0, 24)->execute()->fetchAll()->__toString();
    // $values = \Drupal::database()->select('node_card')->fields('node_card', ['front_card'])->range(0, 24)->execute()->fetchAllAssoc();
    $values = \Drupal::database()->select('node_card')->fields('node_card', array('front_card'))->range(0, 24)->execute()->fetchAllAssoc('front_card');
    // $value_string = implode("", array_map(function($value) { return $value['node_card']; }));
    $value_string = implode("", array_map(function($value) {return $value['node_card']; }, $values));
    $markup = '<div class="row row-cols-1 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3">'.$value_string.'</div>';
    return [
      '#markup' => $markup
    ];
  }

}