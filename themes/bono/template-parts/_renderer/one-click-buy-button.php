<?php
/**
 * ****************************************************************************
 *
 *   DON'T EDIT THIS FILE
 *   After update you will lose all changes. Use child theme
 *
 *   НЕ РЕДАКТИРУЙТЕ ЭТОТ ФАЙЛ
 *   После обновления Вы потереяете все изменения. Используйте дочернюю тему
 *
 *   https://support.wpshop.ru/docs/themes/bono/child/
 *
 * *****************************************************************************
 *
 * @package bono
 * @version 1.7.4
 */

defined( 'WPINC' ) || die;

/**
 * @var string       $button_label
 * @var WC_Product   $product
 * @var array|string $classes
 * @var string       $type
 */

$classes = isset( $classes ) ? $classes : '';
$classes = is_array( $classes ) ? implode( ' ', $classes ) : $classes;
$classes = $classes ? ' ' . $classes : '';

$attributes = apply_filters( 'bono_one_click_buy:button_attributes', [
    'class'           => 'button js-buy-one-click' . $classes,
    'data-product_id' => $product->get_id(),
] );
$result     = [];
foreach ( $attributes as $k => $v ) {
    $result[] = "$k=\"$v\"";
}
$attributes = implode( ' ', $result );
?>
<button <?php echo $attributes ?>>
    <?php echo esc_html( apply_filters( 'bono_one_click_buy:button_label', $button_label, $type, $product ) ) ?>
</button>
