<?php
/**
 * @version 3.6.0
 */

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

        <?php do_action( 'bono_after_product_container', 'ajax' ); ?>

        <div class="product-images">
            <?php do_action( 'bono_show_product_images' ); ?>

            <div class="single-product__badges">
                <?php do_action( 'bono_single_product_badges' ); ?>
            </div>

        </div>
        <div class="product-info">

            <?php do_action( 'bono_after_product_info', 'ajax' ); ?>

            <h1><?php echo $product->get_title() ?></h1>

            <?php do_action( 'bono_single_price' ); ?>

            <div class="woocommerce-product-details__short-description">
                <?php echo $product->get_short_description() ?>
            </div>
            <div class="woocommerce-product-form-wrap">
                <?php woocommerce_template_single_add_to_cart() ?>

                <?php do_action( 'bono_after_single_add_to_cart_ajax' ); ?>

            </div>
            <div class="product_meta">
                <?php if ( apply_filters( 'bono_show_sku', true, 'single-product-ajax' ) ): ?>
                    <span class="sku_wrapper"><?php echo __( 'SKU', 'woocommerce' ) ?>: <span class="sku"><?php echo $product->get_sku() ?></span></span>
                <?php endif ?>
                <?php if ( apply_filters( 'bono_show_categories', true, 'single-product-ajax' ) ): ?>
                    <?php if ( $cats = wc_get_product_category_list( get_the_ID() ) ): ?>
                        <span class="posted_in"><?php echo __( 'Category', 'woocommerce' ) ?>: <?php echo $cats ?></span>
                    <?php endif ?>
                <?php endif ?>
                <?php if ( apply_filters( 'bono_show_tags', true, 'single-product-ajax' ) ): ?>
                    <?php if ( $tags = wc_get_product_tag_list( get_the_ID() ) ): ?>
                        <span class="tagged_as"><?php echo __( 'Tags', 'woocommerce' ) ?>: <?php echo $tags ?></span>
                    <?php endif ?>
                <?php endif ?>

                <?php do_action( 'bono_single_product_meta', 'single-product-ajax' ); ?>

            </div>

            <?php do_action( 'bono_after_single_product_meta_ajax' ); ?>

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

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
