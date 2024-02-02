<?php

namespace Wpshop\TheTheme\Widget;

use WP_Widget;
use Wpshop\Core\Core;

class MiniCart extends WP_Widget {

    /**
     * @inheritDoc
     */
    public function __construct() {
        parent::__construct(
            THEME_SLUG . '_minicart_widget',
            __( 'Mini Cart', THEME_TEXTDOMAIN ),
            [
                'description' => sprintf( __( 'Mini Cart Widget from theme %s', THEME_TEXTDOMAIN ), THEME_TITLE ),
            ]
        );
    }

    /**
     * @inheritDoc
     */
    public function widget( $args, $instance ) {
        if ( ! class_exists( \WooCommerce::class ) ) {
            return;
        }

        $wc_args    = isset( $args['wc_cart_widget_args'] ) ? $args['wc_cart_widget_args'] : [];
        $cart_style = theme_container()->get( Core::class )->get_option( 'header_cart_style' );

        get_template_part( 'template-parts/widgets/mini-cart', null, compact( 'cart_style', 'wc_args', 'instance' ) );
    }
}
