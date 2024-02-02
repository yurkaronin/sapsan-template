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
 * @version 1.9.4
 */

/* Template Name: Homepage construct page */

use Wpshop\Core\Core;
use Wpshop\TheTheme\Features\HomeConstructor;
use Wpshop\TheTheme\MetaBox\HomepageConstructElements;

$core             = theme_container()->get( Core::class );
$home_constructor = theme_container()->get( HomeConstructor::class );
$elements         = theme_container()->get( HomepageConstructElements::class );

$home_constructor->prepare();

$show_homepage_content = function ( $pos ) use ( $elements ) {
    if ( bono_is_blog_page() ) {
        return;
    }
    if ( $pos != $elements->get_position( get_the_ID() ) ) {
        return;
    }
    ?>
    <div class="home-content">
        <?php
        if ( $elements->do_show( 'header' ) ) {
            ?>
            <h1 class="home-header"><?php the_title() ?></h1>
            <?php
        }
        if ( $elements->do_show( 'content' ) ) {
            ?>
            <div class="home-text"><?php the_content() ?></div>
            <?php
        }
        ?>
    </div>
    <?php
};

bono_get_header();

?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php
            if ( $elements->do_show( 'header' ) || $elements->do_show( 'content', get_the_ID() ) ) {
                $show_homepage_content( 'top' );
            } else {
                if ( 'top' == $core->get_option( 'structure_home_position' ) ) {
                    get_template_part( 'template-parts/content', 'home' );
                }
            }

            ?>

            <?php do_action( 'bono_before_check_homepage_constructor' ); ?>

            <?php if ( $home_constructor->do_output_constructor() ): ?>
                <?php
                do_action( 'bono_before_homepage_constructor' );
                do_action( 'bono_homepage_constructor' );
                do_action( 'bono_after_homepage_constructor' )
                ?>
            <?php endif ?>

            <?php do_action( 'bono_after_check_homepage_constructor' ); ?>

            <?php
            if ( $elements->do_show( 'header' ) || $elements->do_show( 'content', get_the_ID() ) ) {
                $show_homepage_content( 'bottom' );
            } else {
                if ( 'bottom' == $core->get_option( 'structure_home_position' ) ) {
                    get_template_part( 'template-parts/content', 'home' );
                }
            }

            ?>
        </main>
    </div>

<?php if ( in_array( $core->get_option( 'structure_home_sidebar' ), [ 'left', 'right' ] ) ||
           apply_filters( 'bono_force_show_sidebar', false, basename( __FILE__ ) )
): ?>
    <?php get_sidebar() ?>
<?php endif ?>

<?php
bono_get_footer();
