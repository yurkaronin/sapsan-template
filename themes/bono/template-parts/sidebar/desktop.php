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
 * @version 1.4.0
 */

defined( 'ABSPATH' ) || exit;

use Wpshop\TheTheme\Sidebar;

$sidebar      = theme_container()->get( Sidebar::class );
$sidebar_name = $sidebar->get_sidebar_name();

if ( $sidebar->hide() || ! is_active_sidebar( $sidebar_name ) ) {
    return;
}
?>

<aside id="secondary" class="widget-area widget-area--desktop" itemscope itemtype="http://schema.org/WPSideBar">
    <div class="sticky-sidebar js-sticky-sidebar">
        <?php dynamic_sidebar( $sidebar_name ); ?>
    </div>
</aside><!-- #secondary -->
