<?php

namespace Drupal\controlled_access_terms\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;

/**
 * Formatter to output raw values, e.g. rel_type=target_id.
 *
 * @FieldFormatter(
 *   id = "typed_relation_raw",
 *   label = @Translation("Typed Relation Formatter (Raw)"),
 *   field_types = {
 *     "typed_relation"
 *   }
 * )
 */
class TypedRelationFormatterRaw extends TypedRelationFormatter {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = parent::viewElements($items, $langcode);

    foreach ($elements as $delta => &$element) {
      $item = $items[$delta];
      unset($element['#prefix']);
      $element['#plain_text'] = $item->rel_type . '=' . $item->target_id;
    }

    return $elements;
  }

}
