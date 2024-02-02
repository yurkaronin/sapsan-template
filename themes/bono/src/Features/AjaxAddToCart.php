<?php

namespace Wpshop\TheTheme\Features;

use WC_AJAX;

class AjaxAddToCart {

    /**
     * @return void
     */
    public function init() {
        if ( ! class_exists( \WooCommerce::class ) ) {
            return;
        }

        $this->setup_ajax();

        do_action( __METHOD__, $this );
    }

    /**
     * @return void
     */
    protected function setup_ajax() {
        $action = 'bono_ajax_add_to_cart';
        add_action( "wp_ajax_$action", [ $this, '_add_to_cart' ] );
        add_action( "wp_ajax_nopriv_$action", [ $this, '_add_to_cart' ] );
        $action = 'bono_ajax_add_to_cart_grouped';
        add_action( "wp_ajax_$action", [ $this, '_add_to_cart_grouped' ] );
        add_action( "wp_ajax_nopriv_$action", [ $this, '_add_to_cart_grouped' ] );
    }

    /**
     * @return void
     * @throws \Exception
     * @see WC_Form_Handler::add_to_cart_handler_grouped()
     */
    public function _add_to_cart_grouped() {
        $data = wp_parse_args( $_POST['data'] ?? [], [
            'add-to-cart' => null,
            'quantity'    => [],
        ] );

        $product_id        = $data['add-to-cart'];
        $was_added_to_cart = false;

        $quantity_set = false;

        if ( ! $data['quantity'] && $product_id ) {
            wp_send_json( [
                'error'   => true,
                'message' => __( 'Please choose a product to add to your cart', THEME_TEXTDOMAIN ),
            ] );
        }

        foreach ( $data['quantity'] as $item => $quantity ) {
            $quantity = wc_stock_amount( $quantity );
            if ( $quantity <= 0 ) {
                continue;
            }

            $quantity_set = true;

            $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $item, $quantity );

            // Suppress total recalculation until finished.
            remove_action( 'woocommerce_add_to_cart', [ WC()->cart, 'calculate_totals' ], 20, 0 );

            if ( $passed_validation && false !== WC()->cart->add_to_cart( $item, $quantity ) ) {
                $was_added_to_cart      = true;
                $added_to_cart[ $item ] = $quantity;
            }

            add_action( 'woocommerce_add_to_cart', [ WC()->cart, 'calculate_totals' ], 20, 0 );
        }

        if ( ! $was_added_to_cart && ! $quantity_set ) {
            wp_send_json( [
                'error'   => true,
                'message' => __( 'Please choose the quantity of items you wish to add to your cart', THEME_TEXTDOMAIN ),
            ] );
        } elseif ( $was_added_to_cart ) {
            WC()->cart->calculate_totals();
            WC_AJAX::get_refreshed_fragments();
        }
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function _add_to_cart() {
        ob_start();

        $data = wp_parse_args( isset( $_POST['data'] ) ? $_POST['data'] : [], [
            'product_id' => '',
        ] );

        if ( ! $data['product_id'] ) {
            return;
        }

        $product_id        = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $data['product_id'] ) );
        $product           = wc_get_product( $product_id );
        $quantity          = empty( $data['quantity'] ) ? 1 : wc_stock_amount( wp_unslash( $data['quantity'] ) );
        $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );
        $product_status    = get_post_status( $product_id );
        $variation_id      = empty( $data['variation_id'] ) ? 0 : absint( $data['variation_id'] );
        $variations        = [];

        foreach ( $data as $key => $value ) {
            if ( 'attribute_' !== substr( $key, 0, 10 ) ) {
                continue;
            }
            $variations[ sanitize_title( wp_unslash( $key ) ) ] = wp_unslash( $value );
        }

        if ( $product && 'variation' === $product->get_type() ) {
            $variation_id = $product_id;
            $product_id   = $product->get_parent_id();
            $variations   = $product->get_variation_attributes();
        }

        if ( $passed_validation && false !== WC()->cart->add_to_cart( $product_id, $quantity, $variation_id, $variations ) && 'publish' === $product_status ) {

            do_action( 'woocommerce_ajax_added_to_cart', $product_id );

            if ( 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
                wc_add_to_cart_message( [ $product_id => $quantity ], true );
            }

            WC_AJAX::get_refreshed_fragments();

        } else {

            // If there was an error adding to the cart, redirect to the product page to show any errors.
            $data = [
                'error'       => true,
                'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id ),
            ];

            wp_send_json( $data );
        }
    }
}
