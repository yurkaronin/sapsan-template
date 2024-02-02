<?php

namespace Wpshop\TheTheme\Support;

use WP_Error;
use WP_Term;

class YoastSupport {

    /**
     * @return void
     */
    public function init() {
        add_filter( 'woocommerce_breadcrumb_main_term', [ $this, 'set_main_term' ] );
        do_action( __METHOD__, $this );
    }

    /**
     * @param WP_Term $term
     *
     * @return WP_Error|WP_Term|null
     */
    public function set_main_term( $term ) {
        global $post;
        if ( $post && class_exists( 'WPSEO_Primary_Term' ) ) {
            $wpseo_primary_term = new \WPSEO_Primary_Term( 'product_cat', $post->ID );
            $primary_term       = get_term( $wpseo_primary_term->get_primary_term() );
            if ( ! is_wp_error( $primary_term ) ) {
                return $primary_term;
            }
        }

        return $term;
    }
}
