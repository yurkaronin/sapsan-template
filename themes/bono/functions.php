<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Pimple\Psr11\Container;
use Psr\Container\ContainerInterface;
use Wpshop\TheTheme\Features\CompareProducts;
use Wpshop\TheTheme\Features\Favorite;
use Wpshop\TheTheme\ProductTabs;

require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/core/constants.php';
require __DIR__ . '/core/init.php';

/**
 * @return ContainerInterface
 */
function theme_container() {
    static $container;
    if ( ! $container ) {
        $config    = require __DIR__ . '/core/config.php';
        $init      = require __DIR__ . '/core/container.php';
        $container = new Container( $init( $config ) );
    }

    return $container;
}

/**
 * Check if WooCommerce plugin is enabled
 *
 * @return bool
 * @see https://woocommerce.com/document/create-a-plugin/#section-1
 */
function is_wc_enabled() {
    // todo add multisite support
    return class_exists( WooCommerce::class );
}

/**
 * Check if WP-PostViews plugin is enabled
 *
 * @return bool
 */
function is_postviews_enabled() {
    return in_array( 'wp-postviews/wp-postviews.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
}

/**
 * @return bool
 */
function bono_is_home_page() {
    return (bool) apply_filters( 'bono_is_home_page', ( is_front_page() || is_home() ) && ! bono_is_blog_page() );
}


/**
 * @param int|string|int[]|string[] $page Optional. Page ID, title, slug, or array of such
 *                                        to check against. Default empty.
 *
 * @return bool
 * @see is_page()
 */
function bono_is_page( $page = '' ) {
    return (bool) apply_filters(
        'bono_is_page',
        is_page( $page ) && ! bono_is_home_construct_page()
    );
}

/**
 * @param null $post
 *
 * @return bool
 */
function bono_is_home_construct_page( $post = null ) {
    return get_page_template_slug( $post ) === 'template-homepage-construct.php';
}

/**
 * @return bool
 */
function bono_is_blog_page() {
    $show_on_front  = get_option( 'show_on_front' );
    $page_for_posts = get_option( 'page_for_posts' );

    return (bool) apply_filters(
        'bono_is_blog_page',
        $show_on_front === 'page' && $page_for_posts && get_queried_object_id() == $page_for_posts
    );
}

/**
 * @return bool
 */
function bono_is_favorite_page() {
    return theme_container()->get( Favorite::class )->is_favorite_page();
}

/**
 * @return bool
 */
function bono_is_compare_page() {
    return theme_container()->get( CompareProducts::class )->is_compare_page();
}

/**
 * Transforms:
 * <pre>
 * [
 *     'slide_item[1][header]'      => 'header 1',
 *     'slide_item[2][header]'      => 'header 2',
 *     'slide_item[1][description]' => 'description 1',
 *     'slide_item[2][description]' => 'description 2',
 * ]
 * </pre>
 * to
 * <pre>
 * 'slide_item' => [
 *     1 => [
 *         'header'      => 'header 1'
 *         'description' => 'description 1'
 *     ],
 *     2 => [
 *         'header'      => 'header 2'
 *         'description' => 'description 2'
 *     ],
 * ]
 * </pre>
 *
 * @param array  $items
 * @param string $prefix
 *
 * @return mixed
 */
function transform_slide_items_data( $items, $prefix = 'slide_items' ) {

    $others     = [];
    $to_implode = [];
    foreach ( $items as $key => $value ) {
        if ( substr( $key, 0, strlen( $prefix ) + 1 ) === $prefix . '[' ) {
            $to_implode[] = $key . '=' . rawurlencode( $value );
        } else {
            $others[ $key ] = $value;
        }
    }
    $result = [];
    parse_str( implode( '&', $to_implode ), $result );

    if ( isset( $result[ $prefix ] ) && is_array( $result[ $prefix ] ) ) {
        $result[ $prefix ] = array_values( $result[ $prefix ] ); // reset indexes
    }

    return $others + $result;
}

if ( ! function_exists( 'woocommerce_default_product_tabs' ) ) {

    /**
     * Add default product tabs to product pages.
     *
     * @param array $tabs Array of tabs.
     *
     * @return array
     */
    function woocommerce_default_product_tabs( $tabs = [] ) {

        global $product, $post;

        // Description tab - shows product content.
        if ( $post->post_content ) {
            $tabs['description'] = [
                'title'    => apply_filters( 'bono_single_tab_description:label', __( 'Description', 'woocommerce' ) ),
                'priority' => 10,
                'callback' => 'woocommerce_product_description_tab',
            ];
        } elseif ( is_customize_preview() ) {
            $tabs['description'] = [
                'title'    => apply_filters( 'bono_single_tab_description:label', __( 'Description', 'woocommerce' ) ),
                'priority' => 10,
                'callback' => [ theme_container()->get( ProductTabs::class ), 'dummy_callback' ],
            ];
        }

        // Additional information tab - shows attributes.
        if ( $product && ( $product->has_attributes() || apply_filters( 'wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions() ) ) ) {
            $tabs['additional_information'] = [
                'title'    => apply_filters( 'bono_single_tab_additional_information:label', __( 'Additional information', 'woocommerce' ) ),
                'priority' => 20,
                'callback' => 'woocommerce_product_additional_information_tab',
            ];
        } elseif ( is_customize_preview() ) {
            $tabs['additional_information'] = [
                'title'    => apply_filters( 'bono_single_tab_additional_information:label', __( 'Additional information', 'woocommerce' ) ),
                'priority' => 20,
                'callback' => [ theme_container()->get( ProductTabs::class ), 'dummy_callback' ],
            ];
        }

        // Reviews tab - shows comments.
        if ( comments_open() ) {
            $tabs['reviews'] = [
                /* translators: %s: reviews count */
                'title'    => apply_filters( 'bono_single_tab_reviews:label', sprintf( __( 'Reviews (%d)', 'woocommerce' ), $product->get_review_count() ) ),
                'priority' => 30,
                'callback' => 'comments_template',
            ];
        } elseif ( is_customize_preview() ) {
            $tabs['reviews'] = [
                'title'    => apply_filters( 'bono_single_tab_reviews:label', sprintf( __( 'Reviews (%d)', 'woocommerce' ), $product->get_review_count() ) ),
                'priority' => 30,
                'callback' => [ theme_container()->get( ProductTabs::class ), 'dummy_callback' ],
            ];
        }

        return $tabs;
    }
}

if ( ! function_exists( 'bono_track_product_view' ) ) {
    /**
     * @see wc_track_product_view()
     */
    function bono_track_product_view() {
        if ( is_active_widget( false, false, 'woocommerce_recently_viewed_products', true ) ) {
            return; // because it will be handled with original function
        }

        if ( ! is_singular( 'product' ) ) {
            return;
        }

        global $post;

        if ( empty( $_COOKIE['woocommerce_recently_viewed'] ) ) { // @codingStandardsIgnoreLine.
            $viewed_products = [];
        } else {
            $viewed_products = wp_parse_id_list( (array) explode( '|', wp_unslash( $_COOKIE['woocommerce_recently_viewed'] ) ) ); // @codingStandardsIgnoreLine.
        }

        // Unset if already in viewed products list.
        $keys = array_flip( $viewed_products );

        if ( isset( $keys[ $post->ID ] ) ) {
            unset( $viewed_products[ $keys[ $post->ID ] ] );
        }

        $viewed_products[] = $post->ID;

        if ( count( $viewed_products ) > 15 ) {
            array_shift( $viewed_products );
        }

        // Store for session only.
        wc_setcookie( 'woocommerce_recently_viewed', implode( '|', $viewed_products ) );
    }
}

if ( ! function_exists( 'bono_get_header_favorite_item' ) ) {
    /**
     * @return false|string
     * @throws Exception
     */
    function bono_get_header_favorite_item() {
        $favorite = theme_container()->get( Favorite::class );

        if ( ! $favorite->enabled() ) {
            return '';
        }

        return _bono_ob_get_content( function ( $favorite ) {
            ?>
            <a href="<?php echo $favorite->get_page_url() ?>"
               title="<?php echo __( 'Favorite', THEME_TEXTDOMAIN ) ?>"
               class="header-cart__link header-favorite header-favorite--vis js-header-favorite">
                <?php if ( $favorite->show_counter() ): ?>
                    <?php $favorite_count = $favorite->count() ?>
                    <sup style="opacity: 1;<?php echo apply_filters( 'bono_favorite:counter:show_zero', (bool) $favorite_count ) ? '' : 'display:none;' ?>">
                        <?php echo $favorite_count ?>
                    </sup>
                <?php endif ?>
            </a>
            <?php
        }, $favorite );
    }
}

if ( ! function_exists( 'bono_get_header_product_compare_item' ) ) {
    /**
     * @return false|string
     * @throws Exception
     */
    function bono_get_header_product_compare_item() {
        $compare_products = theme_container()->get( CompareProducts::class );

        if ( ! $compare_products->enabled() ) {
            return '';
        }

        return _bono_ob_get_content( function ( $compare_products ) {
            ?>
            <a href="<?php echo $compare_products->get_page_url() ?>"
               title="<?php echo __( 'Compare Products', THEME_TEXTDOMAIN ) ?>"
               class="header-cart__link header-compare header-compare--vis js-header-compare">
                <?php if ( $compare_products->show_counter() ): ?>
                    <?php $compare_count = $compare_products->count() ?>
                    <sup style="opacity: 1;<?php echo apply_filters( 'bono_compare_products:counter:show_zero', (bool) $compare_count ) ? '' : 'display:none;' ?>">
                        <?php echo $compare_count ?>
                    </sup>
                <?php endif ?>
            </a>
            <?php
        }, $compare_products );
    }
}

if ( ! function_exists( 'bono_get_header_customer_account_item' ) ) {
    /**
     * @return false|string
     * @throws Exception
     */
    function bono_get_header_customer_account_item() {
        $account_page = get_post( get_option( 'woocommerce_myaccount_page_id' ) );

        if ( ! $account_page ) {
            return '';
        }

        return _bono_ob_get_content( function () use ( $account_page ) {
            $account_text = apply_filters( 'bono_my_account_text', get_the_title( $account_page ) );
            $login_text   = apply_filters( 'bono_my_account_login_text', sprintf( '%s / %s', __( 'Login', 'woocommerce' ), __( 'Register', 'woocommerce' ) ) );

            if ( is_user_logged_in() ) { ?>
                <a href="<?php echo get_permalink( $account_page ); ?>" class="header-customer-account header-customer-account--vis js-header-customer-account" title="<?php echo $account_text ?>">
                    <?php if ( $account_text ): ?>
                        <span class="header-customer-account__text"><?php echo $account_text ?></span>
                    <?php endif ?>
                </a>
            <?php } else { ?>
                <a href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>" class="header-customer-account header-customer-account--vis js-header-customer-account" title="<?php echo $login_text; ?>">
                    <?php if ( $login_text ): ?>
                        <span class="header-customer-account__text"><?php echo $login_text; ?></span>
                    <?php endif ?>
                </a>
            <?php }
        } );
    }
}

/**
 * @param callable $fn
 *
 * @return false|string
 * @throws \Exception
 */
function _bono_ob_get_content( $fn ) {
    $ob_level = ob_get_level();
    try {
        ob_start();
        ob_implicit_flush( false );

        $args = func_get_args();
        call_user_func_array( $fn, array_slice( $args, 1 ) );

        return ob_get_clean();

    } catch ( \Exception $e ) {
        while ( ob_get_level() > $ob_level ) {
            if ( ! @ob_end_clean() ) {
                ob_clean();
            }
        }
        throw $e;
    }
}

/**
 * @param string $file
 * @param array  $default_headers
 * @param string $context
 *
 * @return array
 * @see   get_file_data()
 * @since 1.5.0
 */
function bono_get_file_data( $file, $default_headers, $context = '' ) {
    $fp = fopen( $file, 'r' );

    if ( $fp ) {
        // Pull only the first 8 KB of the file in.
        $file_data = fread( $fp, 8 * KB_IN_BYTES );

        // PHP will close file handle, but we are good citizens.
        fclose( $fp );
    } else {
        $file_data = '';
    }

    // Make sure we catch CR-only line endings.
    $file_data = str_replace( "\r", "\n", $file_data );

    $extra_headers = $context ? apply_filters( "bono_extra_{$context}_headers", [] ) : [];
    if ( $extra_headers ) {
        $extra_headers = array_combine( $extra_headers, $extra_headers ); // Keys equal values.
        $all_headers   = array_merge( $extra_headers, (array) $default_headers );
    } else {
        $all_headers = $default_headers;
    }

    foreach ( $all_headers as $field => $regex ) {
        if ( preg_match( '/^[ \t\/*#@]*' . preg_quote( $regex, '/' ) . '\s+(.*)$/mi', $file_data, $match ) && $match[1] ) {
            $all_headers[ $field ] = _cleanup_header_comment( $match[1] );
        } else {
            $all_headers[ $field ] = '';
        }
    }

    return $all_headers;
}

if ( ! function_exists( 'bono_get_header' ) ) {
    /**
     * @param string $name
     * @param array  $args
     *
     * @return void
     * @see get_header()
     */
    function bono_get_header( $name = null, $args = [] ) {
        if ( function_exists( 'hfe_render_header' ) &&
             function_exists( 'get_hfe_header_id' ) &&
             get_hfe_header_id()
        ) {
            hfe_render_header();
            $advertising = theme_container()->get( \Wpshop\Core\Advertising::class );
            ?>
            <div id="content" class="site-content <?php echo apply_filters( 'bono_site_content_classes', 'fixed' ) ?>">
            <?php echo $advertising->show_ad( 'before_site_content' ); ?>
            <div class="site-content-inner">
            <?php
        } else {
            get_header( $name, $args );
        }
    }
}

if ( ! function_exists( 'bono_get_footer' ) ) {
    /**
     * @param string $name
     * @param array  $args
     *
     * @return void
     * @see get_footer()
     */
    function bono_get_footer( $name = null, $args = [] ) {
        if ( function_exists( 'hfe_render_footer' ) &&
             function_exists( 'get_hfe_footer_id' ) &&
             get_hfe_footer_id()
        ) {
            ?>
            </div><!--.site-content-inner-->
            </div><!--.site-content-->
            <?php
            hfe_render_footer();
            ?>
            </div><!-- #page -->
            <?php wp_footer(); ?>
            <?php get_template_part( 'template-parts/footer/init-slider' ) ?>
            </body>
            </html>
            <?php
        } else {
            get_footer( $name, $args );
        }
    }
}
