<?php

namespace Wpshop\TheTheme\Features;

use WP_Query;
use wpdb;
use Wpshop\Core\Core;

class Search {

    /**
     * @var Core
     */
    protected $core;

    /**
     * @var wpdb
     */
    protected $wpdb;

    /**
     * @param Core $core
     * @param wpdb $wpdb
     */
    public function __construct( Core $core, wpdb $wpdb ) {
        $this->core = $core;
        $this->wpdb = $wpdb;
    }

    /**
     * @return void
     */
    public function init() {
        add_action( 'pre_get_posts', [ $this, '_set_posts_per_page' ] );
        add_action( 'pre_get_posts', [ $this, '_set_product_in_results_only' ] );
        add_filter( 'posts_search_orderby', [ $this, '_modify_search_orderby' ], 10, 2 );
        add_filter( 'bono_header_search_type', [ $this, '_set_mobile_search_type' ] );
        add_filter( 'bono_header_block_order', [ $this, '_move_search_to_end' ] );

        do_action( __METHOD__, $this );
    }

    /**
     * @param WP_Query $query
     *
     * @return WP_Query
     */
    public function _set_posts_per_page( $query ) {
        if ( ! is_admin() && $query->is_search() ) {
            $query->set( 'posts_per_page', $this->core->get_option( 'search_count_per_page' ) );
        }

        return $query;
    }

    /**
     * @param WP_Query $query
     *
     * @return WP_Query
     */
    public function _set_product_in_results_only( $query ) {
        if ( ! is_admin() && $query->is_search() ) {
            if ( $this->core->get_option( 'search_products_only' ) && is_wc_enabled() ) {
                $query->set( 'post_type', 'product' );
            }
        }

        return $query;
    }

    /**
     * @param string   $search_orderby
     * @param WP_Query $query
     *
     * @return string
     */
    public function _modify_search_orderby( $search_orderby, $query ) {
        if ( ! is_admin() && $query->is_search() && $this->core->get_option( 'shop_products_first' ) ) {
            return "CASE {$this->wpdb->posts}.post_type WHEN 'product' THEN 1 ELSE 2 END ASC";
        }

        return $search_orderby;
    }

    /**
     * @param string $type
     *
     * @return string
     */
    public function _set_mobile_search_type( $type ) {
        $search_type = $this->core->get_option( 'show_mobile_search' );
        if ( wp_is_mobile() && $search_type ) {
            return $search_type;
        }

        return $type;
    }

    /**
     * @param array $order
     *
     * @return array
     */
    public function _move_search_to_end( $order ) {
        if ( ! wp_is_mobile() ) {
            return $order;
        }

        $found = false;
        $order = array_filter( $order, function ( $item ) use ( &$found ) {
            if ( $item === 'header_search' ) {
                $found = true;

                return false;
            }

            return true;
        } );

        if ( $found ) {
            $order[] = 'header_search';
        }

        return $order;
    }
}
