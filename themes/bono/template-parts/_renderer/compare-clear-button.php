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
 * @version 1.6.0
 */

defined( 'WPINC' ) || die;

/**
 * @var string $label
 * @var int    $do_refresh
 */
?>

<div class="bono-clear-product-compare">
    <button class="button js-clear-product-compare-page" data-do_refresh="<?php echo (int) $do_refresh ?>"><?php echo esc_html( $label ) ?></button>
</div>
