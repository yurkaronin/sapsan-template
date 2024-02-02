<?php
/**
 * @version 3.6.0
 */

use Wpshop\TheTheme\Features\CompareProducts;
use Wpshop\TheTheme\Features\Favorite;

defined( 'ABSPATH' ) || exit;

/**
 * @var $product WC_Product
 */
global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form(); // WPCS: XSS ok.

    return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

    <?php
    /**
     * Hook: woocommerce_before_single_product_summary.
     *
     * @hooked woocommerce_show_product_sale_flash - 10
     * @hooked woocommerce_show_product_images - 20
     */
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash' );
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
    do_action( 'woocommerce_before_single_product_summary' );
    ?>
    <div class="product-container">

        <?php do_action( 'bono_after_product_container', 'main' ); ?>

        <div class="product-images">
            <?php do_action( 'bono_show_product_images' ); ?>

            <div class="single-product__badges">
                <?php do_action( 'bono_single_product_badges' ); ?>
            </div>

        </div>
        <div class="product-info">

            <?php do_action( 'bono_after_product_info', 'main' ); ?>

            <h1><?php echo $product->get_title() ?></h1>

            <?php do_action( 'bono_single_price' ); ?>

            <div class="woocommerce-product-details__short-description">
                <?php echo $product->get_short_description() ?>
            </div>

            <div class="woocommerce-product-form-wrap">
                <?php
                $did_favorite = $did_compare = false;
                add_action( 'woocommerce_after_add_to_cart_button', function () use ( $product, &$did_favorite, &$did_compare ) {
                    $output_stack = [];
                    if ( theme_container()->get( Favorite::class )->enabled() ) {
                        $did_favorite   = true;
                        $output_stack[] = '<button type="button" name="add-favorite" title="' . __( 'Add to Favorite', THEME_TEXTDOMAIN ) . '" class="product-favorite-btn js-product-favorite" data-product_id="' . $product->get_id() . '"></button>';
                    }
                    if ( theme_container()->get( CompareProducts::class )->enabled() ) {
                        $did_compare    = true;
                        $output_stack[] = '<button type="button" name="add-compare" title="' . __( 'Add to Compare', THEME_TEXTDOMAIN ) . '" class="product-compare-btn js-product-compare" data-product_id="' . $product->get_id() . '"></button>';
                    }

                    $output_stack = (array) apply_filters( 'bono_features_btn_output_stack', $output_stack );

                    if ( $output_stack ) {
                        echo '<div class="product-features-btn-container">';
                        echo implode( "\n", $output_stack );
                        echo '</div>';
                    }
                } );

                woocommerce_template_single_add_to_cart();

                add_action( 'bono_after_single_add_to_cart', function () use ( $product, $did_favorite, $did_compare ) {
                    $output_stack = [];
                    if ( theme_container()->get( Favorite::class )->enabled() && ! $did_favorite ) {
                        $output_stack[] = '<button type="button" name="add-favorite" title="' . __( 'Add to Favorite', THEME_TEXTDOMAIN ) . '" class="product-favorite-btn js-product-favorite" data-product_id="' . $product->get_id() . '"></button>';
                    }
                    if ( theme_container()->get( CompareProducts::class )->enabled() && ! $did_compare ) {
                        $output_stack[] = '<button type="button" name="add-compare" title="' . __( 'Add to Compare', THEME_TEXTDOMAIN ) . '" class="product-compare-btn js-product-compare" data-product_id="' . $product->get_id() . '"></button>';
                    }

                    $output_stack = (array) apply_filters( 'bono_features_btn_output_stack', $output_stack );

                    if ( $output_stack ) {
                        echo '<div class="product-features-btn-container">';
                        echo implode( "\n", $output_stack );
                        echo '</div>';
                    }
                } );

                do_action( 'bono_after_single_add_to_cart' );
                ?>

            </div>

            <div class="product_meta">
                <?php if ( apply_filters( 'bono_show_sku', true, 'single-product' ) ): ?>
                    <span class="sku_wrapper"><?php echo __( 'SKU', 'woocommerce' ) ?>: <span class="sku"><?php echo $product->get_sku() ?></span></span>
                <?php endif ?>
                <?php if ( apply_filters( 'bono_show_categories', true, 'single-product' ) ): ?>
                    <?php if ( $cats = wc_get_product_category_list( get_the_ID() ) ): ?>
                        <span class="posted_in"><?php echo __( 'Category', 'woocommerce' ) ?>: <?php echo $cats ?></span>
                    <?php endif ?>
                <?php endif ?>
                <?php if ( apply_filters( 'bono_show_tags', true, 'single-product' ) ): ?>
                    <?php if ( $tags = wc_get_product_tag_list( get_the_ID() ) ): ?>
                        <span class="tagged_as"><?php echo __( 'Tags', 'woocommerce' ) ?>: <?php echo $tags ?></span>
                    <?php endif ?>
                <?php endif ?>

                <?php do_action( 'bono_single_product_meta', 'single-product' ); ?>
            </div>

            <?php do_action( 'bono_after_single_product_meta' ); ?>
        </div>
    </div><!--.product-container-->

    <?php

    if ( apply_filters( 'bono_default_single_product_summary_action', true ) ):
        /**
         * Hook: woocommerce_single_product_summary.
         *
         * @hooked woocommerce_template_single_title - 5
         * @hooked woocommerce_template_single_rating - 10
         * @hooked woocommerce_template_single_price - 10
         * @hooked woocommerce_template_single_excerpt - 20
         * @hooked woocommerce_template_single_add_to_cart - 30
         * @hooked woocommerce_template_single_meta - 40
         * @hooked woocommerce_template_single_sharing - 50
         * @hooked WC_Structured_Data::generate_product_data() - 60
         */
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating' );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price' );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
        remove_action( 'woocommerce_single_product_summary', 'WC_Structured_Data::generate_product_data', 60 );
        do_action( 'woocommerce_single_product_summary' );

    endif ?>

    <?php
    /**
     * Hook: woocommerce_after_single_product_summary.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
    do_action( 'woocommerce_after_single_product_summary' );
    ?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
