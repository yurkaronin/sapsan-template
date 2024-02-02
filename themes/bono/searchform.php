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

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$core = theme_container()->get( \Wpshop\Core\Core::class );
?>

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Search for:', THEME_TEXTDOMAIN ) ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_html__( 'Search…', THEME_TEXTDOMAIN ) ?>" value="<?php echo get_search_query() ?>" name="s">
    </label>
    <?php if ( $core->get_option( 'search_products_only' ) ): ?>
        <input type="hidden" name="post_type" value="product"/>
    <?php endif ?>
    <button type="submit" class="search-submit"></button>
</form>
