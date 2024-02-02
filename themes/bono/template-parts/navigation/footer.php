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
 * @version 1.9.0
 */

$wpshop_core = theme_container()->get( \Wpshop\Core\Core::class );
?>

<?php if ( has_nav_menu( 'footer' ) && $wpshop_core->is_show_element( 'footer_menu' ) ) { ?>
    <?php
    do_action( 'bono_before_footer_navigation' );

    $navigation_classes = implode( ' ', (array) apply_filters( 'bono_footer_navigation_classes', [
        'footer-navigation',
        $wpshop_core->get_option( 'footer_menu_width' ),
    ] ) );

    $inner_navigation_classes = implode( ' ', (array) apply_filters( '', [
        'main-navigation-inner',
        $wpshop_core->get_option( 'footer_menu_inner_width' ),
    ] ) );
    ?>
    <div class="<?php echo $navigation_classes ?>" itemscope itemtype="http://schema.org/SiteNavigationElement">
        <div class="<?php echo $inner_navigation_classes ?>">
            <?php
            wp_nav_menu( [
                'theme_location' => 'footer',
                'menu_id'        => 'footer_menu',
            ] );
            ?>
        </div>
    </div><!--footer-navigation-->
    <?php do_action( 'bono_after_footer_navigation' ); ?>
<?php } ?>
