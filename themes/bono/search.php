<?php
/**
 * The template for displaying search results pages
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package bono
 * @version 1.9.4
 */

$core = theme_container()->get( \Wpshop\Core\Core::class );

bono_get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php if ( have_posts() ) : ?>

                <header class="page-header">
                    <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', THEME_TEXTDOMAIN ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                </header><!-- .page-header -->

                <div class="post-cards post-cards--search post-cards--vertical">

                    <?php if ( $core->get_option( 'search_page_type' ) === 'wc_products' && is_wc_enabled() ): ?>
                        <?php woocommerce_product_loop_start() ?>

                        <?php while ( have_posts() ) : the_post();
                            switch ( get_post_type() ) {
                                case 'product':
                                    do_action( 'woocommerce_shop_loop' );
                                    wc_get_template_part( 'content', 'product' );
                                    break;
                                default:
                                    get_template_part( 'template-parts/content', 'search' );
                                    break;
                            }
                        endwhile; ?>

                        <?php woocommerce_product_loop_end() ?>

                    <?php else: ?>
                        <?php while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content', 'search' );
                        endwhile; ?>
                    <?php endif ?>

                    <?php the_posts_pagination(); ?>

                </div>

            <?php else :

                get_template_part( 'template-parts/content', 'none' );

            endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php if ( apply_filters( 'bono_force_show_sidebar', true, basename( __FILE__ ) ) ) {
    get_sidebar();
} ?>

<?php if ( $core->get_option( 'search_show_related' ) ): ?>
    <?php do_action( 'bono_single_before_related' ); ?>
    <?php get_template_part( 'template-parts/related', 'posts' ); ?>
    <?php do_action( 'bono_single_after_related' ); ?>
<?php endif ?>

<?php
bono_get_footer();
