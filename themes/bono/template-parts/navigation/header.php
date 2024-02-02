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

if ( has_nav_menu( 'header' ) ) : ?>

    <?php
    do_action( 'bono_before_main_navigation' );

    $navigation_classes = implode( ' ', (array) apply_filters( 'bono_main_navigation_classes', [
        'main-navigation',
        $wpshop_core->get_option( 'header_menu_width' ),
    ] ) );

    $inner_navigation_classes = implode( ' ', (array) apply_filters( '', [
        'main-navigation-inner',
        $wpshop_core->get_option( 'header_menu_inner_width' ),
    ] ) );
    ?>

    <nav id="site-navigation" class="<?php echo $navigation_classes ?>" itemscope itemtype="http://schema.org/SiteNavigationElement">
        <div class="<?php echo $inner_navigation_classes ?>">
            <?php
            wp_nav_menu( [
                'theme_location' => 'header',
                'menu_id'        => 'header_menu',
            ] );
            ?>
        </div>
    </nav><!-- #site-navigation -->

    <?php do_action( 'bono_after_main_navigation' ); ?>

<?php endif; ?>

<?php echo apply_filters( 'bono_mobile_menu_placeholder', '<div class="mobile-menu-placeholder js-mobile-menu-placeholder"></div>' ) ?>

