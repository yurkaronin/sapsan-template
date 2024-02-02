<?php

defined( 'WPINC' ) || exit();

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
 * @version 1.9.4
 */

use Wpshop\Core\Core;
use Wpshop\TheTheme\Features\HomeConstructor;

$core             = theme_container()->get( Core::class );
$home_constructor = theme_container()->get( HomeConstructor::class );

$home_constructor->prepare();

bono_get_header();
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php
            if ( 'top' == $core->get_option( 'structure_home_position' ) ) {
                get_template_part( 'template-parts/content', 'home' );
            }

            if ( $home_constructor->do_output_constructor() ) {
                do_action( 'bono_before_homepage_constructor' );
                do_action( 'bono_homepage_constructor' );
                do_action( 'bono_after_homepage_constructor' );
            } else {
                do_action( 'bono_before_posts' );
                if ( have_posts() ) {

                    if ( is_home() && ! is_front_page() ) {
                        echo '<h1 class="page-title screen-reader-text">' . single_post_title( '', false ) . '</h1>';
                    }

                    get_template_part( 'template-parts/post-container/' . $core->get_option( 'structure_home_posts' ) );

                    the_posts_pagination();

                } else {
                    get_template_part( 'template-parts/content', 'none' );
                }
                do_action( 'bono_after_posts' );
            }

            if ( 'bottom' == $core->get_option( 'structure_home_position' ) ) {
                get_template_part( 'template-parts/content', 'home' );
            }

            ?>

        </main><!-- .site-main -->
    </div><!-- .content-area -->

<?php


?>
<?php

if ( in_array( $core->get_option( 'structure_home_sidebar' ), [ 'left', 'right' ] ) ||
     ( bono_is_blog_page() && in_array( $core->get_option( 'structure_home_sidebar_on_blog' ), [
             'left',
             'right',
         ] ) ) ||
     apply_filters( 'bono_force_show_sidebar', false, basename( __FILE__ ) )
): ?>
    <?php get_sidebar() ?>
<?php endif ?>

<?php
bono_get_footer();
