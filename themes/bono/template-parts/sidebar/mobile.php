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
 * @version 1.7.2
 */

defined( 'ABSPATH' ) || exit;

use Wpshop\TheTheme\Sidebar;

$sidebar      = theme_container()->get( Sidebar::class );
$sidebar_name = $sidebar->get_sidebar_name();

$output_sidebar        = ! $sidebar->hide() && is_active_sidebar( $sidebar_name );
$output_mobile_filters = false;
if ( is_wc_enabled() ) {
    $output_mobile_filters = ( is_shop() ||
                               is_product_category() ||
                               apply_filters( 'bono_show_mobile_filters', false ) ) && is_active_sidebar( 'mobile-filters' );
}

$show_filters_text = __( 'Show filters', THEME_TEXTDOMAIN );
$hide_filters_text = __( 'Hide filters', THEME_TEXTDOMAIN );
$show_filters      = isset( $_COOKIE['bono_show_filters'] ) ? (bool) $_COOKIE['bono_show_filters'] : apply_filters( 'bono_default_open_mobile_filters', false );

if ( ! $output_sidebar && ! $output_mobile_filters ) {
    return;
}

?>

<?php if ( $output_mobile_filters ): ?>
    <aside id="secondary" class="widget-area widget-area--mobile" itemscope itemtype="http://schema.org/WPSideBar">
        <div class="widget-area--show-filters">
            <span class="js-show-filters" data-toggle_text="<?php echo ! $show_filters ? $hide_filters_text : $show_filters_text ?>"><?php echo $show_filters ? $hide_filters_text : $show_filters_text ?></span>
        </div>
        <div class="sticky-sidebar js-mobile-filters"<?php echo $show_filters ? '' : ' style="display:none;"' ?>>
            <?php dynamic_sidebar( 'mobile-filters' ); ?>
        </div>
    </aside>
<?php endif ?>
<?php if ( $output_sidebar ): ?>
    <aside id="secondary" class="widget-area" itemscope itemtype="http://schema.org/WPSideBar">
        <div class="sticky-sidebar">
            <?php dynamic_sidebar( $sidebar_name ); ?>
        </div>
    </aside><!-- #secondary -->
<?php endif ?>
