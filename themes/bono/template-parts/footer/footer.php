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
 * @version 1.7.0
 */

$wpshop_core = theme_container()->get( \Wpshop\Core\Core::class );

$classes = [];
if ( $wpshop_core->get_option( 'footer_sticky_disable' ) ) {
    array_push( $classes, 'site-footer-container--disable-sticky' );
}
if ( $wpshop_core->get_option( 'footer_widgets_equal_width' ) ) {
    array_push( $classes, 'site-footer-container--equal-width' );
}
?>

<?php do_action( 'bono_before_footer' ) ?>

<div class="site-footer-container <?php echo implode( ' ', $classes ) ?>">

    <?php get_template_part( 'template-parts/navigation/footer' ) ?>

    <?php if ( $wpshop_core->is_show_element( 'footer' ) ): ?>
        <footer id="colophon" class="site-footer site-footer--style-gray <?php $wpshop_core->the_option( 'footer_width' ) ?>">
            <div class="site-footer-inner <?php $wpshop_core->the_option( 'footer_inner_width' ) ?>">

                <?php get_template_part( 'template-parts/footer/widgets' ) ?>

                <?php get_template_part( 'template-parts/footer/bottom' ) ?>

            </div>
        </footer><!--.site-footer-->
    <?php endif ?>
</div>

<?php do_action( 'bono_after_footer' ) ?>
