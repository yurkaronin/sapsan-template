<?php

namespace Wpshop\TheTheme\Features;

use Wpshop\Core\Core;

class MinOrderAmount {

    /**
     * @var Core
     */
    protected $core;

    /**
     * @param Core $core
     */
    public function __construct( Core $core ) {
        $this->core = $core;
    }

    /**
     * @return void
     */
    public function init() {
        add_action( 'woocommerce_checkout_process', [ $this, '_minimum_order_amount' ] );
        add_action( 'woocommerce_before_cart', [ $this, '_minimum_order_amount' ] );

        do_action( __METHOD__, $this );
    }

    /**
     * @return void
     */
    public function _minimum_order_amount() {
        if ( ! $this->core->get_option( 'min_order_amount_enable' ) ) {
            return;
        }

        $minimum = absint( $this->core->get_option( 'min_order_amount' ) );

        if ( ! WC()->cart || ! $minimum ) {
            return;
        }

        $message = apply_filters(
            'bono_min_order_amount_message',
            sprintf(
                __( 'Your current order total is %s — you must have an order with a minimum of %s to place your order', THEME_TEXTDOMAIN ),
                wc_price( WC()->cart->total ),
                wc_price( $minimum )
            ),
            WC()->cart->total,
            $minimum
        );

        if ( WC()->cart->total < $minimum ) {
            if ( is_cart() ) {
                wc_print_notice( $message, 'error' );
            } else {
                wc_add_notice( $message, 'error' );
            }
        }
    }
}
