<?php

namespace Wpshop\TheTheme\Features;

use WC_Product;
use WP_Query;
use Wpshop\Core\Core;
use Wpshop\Core\Customizer\CustomizerCSS;

class ProductBadges {

    /**
     * @var Core
     */
    protected $core;

    /**
     * @var bool
     */
    protected $module_enabled = false;

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
        add_action( 'woocommerce_product_options_advanced', [ $this, '_add_hit_checkbox' ] );
        add_action( 'woocommerce_process_product_meta', [ $this, '_precess_save_hit_meta' ] );

        add_action( 'woocommerce_product_options_advanced', [ $this, '_add_new_checkbox' ] );
        add_action( 'woocommerce_process_product_meta', [ $this, '_precess_save_new_meta' ] );

        add_action( 'bono_shop_item_badges', [ $this, '_output_shop_item_badges' ] );
        add_action( 'bono_single_product_badges', [ $this, '_output_single_product_badges' ] );

        add_action( 'bono_customizer_styles', [ $this, '_customizer_styles' ] );
        add_filter( 'bono_options_defaults', [ $this, '_default_options' ] );
        add_filter( 'bono_customizer_controls', [ $this, '_customizer_controls' ] );

//        add_action( 'woocommerce_product_query', [ $this, '_set_order' ] );

        $this->module_enabled = true;

        do_action( __METHOD__, $this );
    }

    /**
     * @return bool
     */
    public function is_module_enabled() {
        return $this->module_enabled;
    }

    protected $orderby;

    /**
     * @param WP_Query $query
     *
     * @return void
     */
    public function _set_order( $query ) {
        $query->set( 'meta_query', [
            'relation' => 'OR',
            [
                'key'   => 'bono_new_enabled',
                //                'compare' => 'EXISTS',
                'value' => 1,
            ],
            [
                'key'     => 'bono_new_enabled',
                'compare' => 'NOT EXISTS',
            ],
        ] );
        $query->set( 'orderby', trim( 'meta_value ' . $query->get( 'orderby' ) ) );
        $query->set( 'order', 'ASC' );
        $query->set( 'meta_key', 'bono_new_enabled' );
        $this->orderby = trim( 'bono_new_enabled ' . $query->get( 'orderby' ) );
    }

    /**
     * @return void
     */
    public function _add_hit_checkbox() {
        global $product_object;

        woocommerce_wp_checkbox( [
            'id'      => 'bono_hit_enabled',
            'label'   => __( 'Mark as Hit', THEME_TEXTDOMAIN ),
            'cbvalue' => 1,
            'value'   => $product_object->get_meta( 'bono_hit_enabled' ),
        ] );
    }

    /**
     * @param int $post_id
     *
     * @return void
     */
    public function _precess_save_hit_meta( $post_id ) {
        if ( $product = wc_get_product( $post_id ) ) {
            if ( ! empty( $_POST['bono_hit_enabled'] ) ) {
                $product->update_meta_data( 'bono_hit_enabled', 1 );
            } else {
                $product->delete_meta_data( 'bono_hit_enabled' );
            }

            $product->save();
        }
    }

    /**
     * @return void
     */
    public function _add_new_checkbox() {
        global $product_object;

        woocommerce_wp_checkbox( [
            'id'      => 'bono_new_enabled',
            'label'   => __( 'Mark as New', THEME_TEXTDOMAIN ),
            'cbvalue' => 1,
            'value'   => $product_object->get_meta( 'bono_new_enabled' ),
        ] );
    }

    /**
     * @param int $post_id
     *
     * @return void
     */
    public function _precess_save_new_meta( $post_id ) {
        if ( $product = wc_get_product( $post_id ) ) {
            if ( ! empty( $_POST['bono_new_enabled'] ) ) {
                $product->update_meta_data( 'bono_new_enabled', 1 );
            } else {
                $product->delete_meta_data( 'bono_new_enabled' );
            }

            $product->save();
        }
    }

    /**
     * @return void
     */
    public function _output_shop_item_badges( $card_type ) {
        global $product;

        if ( ! apply_filters( 'bono_do_output_shop_item_badges', true, $product, $card_type ) ) {
            return;
        }

        if ( apply_filters( 'bono_is_product_hit', $product->get_meta( 'bono_hit_enabled' ), $product ) ) {
            printf( '<span class="shop-item__badge shop-item__badge--hit">%s</span>', $this->get_hit_text( $product ) );
        }
        if ( apply_filters( 'bono_is_product_new', $product->get_meta( 'bono_new_enabled' ), $product ) ) {
            printf( '<span class="shop-item__badge shop-item__badge--new">%s</span>', $this->get_new_text( $product ) );
        }
    }

    /**
     * @return void
     */
    public function _output_single_product_badges() {
        global $product;

        if ( ! apply_filters( 'bono_do_output_single_product_badges',
            (bool) $this->core->get_option( 'product_single_show_badges' ),
            $product
        ) ) {
            return;
        }

        if ( apply_filters( 'bono_is_product_hit', $product->get_meta( 'bono_hit_enabled' ), $product ) ) {
            printf( '<span class="single-product__badge single-product__badge--hit">%s</span>', $this->get_hit_text( $product ) );
        }
        if ( apply_filters( 'bono_is_product_new', $product->get_meta( 'bono_new_enabled' ), $product ) ) {
            printf( '<span class="single-product__badge single-product__badge--new">%s</span>', $this->get_new_text( $product ) );
        }
    }

    /**
     * @param CustomizerCSS $customizer
     *
     * @return void
     */
    public function _customizer_styles( $customizer ) {
        $customizer->add(
            '.shop-item__badges .onsale, .single-product__badge--onsale',
            [ 'color:%s', 'product_badge_sale_color' ]
        );
        $customizer->add(
            '.shop-item__badges .onsale, .single-product__badge--onsale',
            [ 'background-color:%s', 'product_badge_sale_bg_color' ]
        );
        $customizer->add(
            '.shop-item__badge--new, .single-product__badge--new',
            [ 'color:%s', 'product_badge_new_color' ]
        );
        $customizer->add(
            '.shop-item__badge--new, .single-product__badge--new',
            [ 'background-color:%s', 'product_badge_new_bg_color' ]
        );
        $customizer->add(
            '.shop-item__badge--hit, .single-product__badge--hit',
            [ 'color:%s', 'product_badge_hit_color' ]
        );
        $customizer->add(
            '.shop-item__badge--hit, .single-product__badge--hit',
            [ 'background-color:%s', 'product_badge_hit_bg_color' ]
        );
    }

    /**
     * @param array $options
     *
     * @return array
     */
    public function _default_options( $options ) {
        $options['product_badge_sale_color']    = '#ffffff';
        $options['product_badge_sale_bg_color'] = '#f43c33';
        $options['product_badge_new_text']      = __( 'New!', THEME_TEXTDOMAIN );
        $options['product_badge_new_color']     = '#ffffff';
        $options['product_badge_new_bg_color']  = '#3960ff';
        $options['product_badge_hit_text']      = __( 'Hit!', THEME_TEXTDOMAIN );
        $options['product_badge_hit_color']     = '#f43c33';
        $options['product_badge_hit_bg_color']  = '#ffffff';
        $options['product_single_show_badges']  = false;

        return $options;
    }

    /**
     * @param array $controls
     *
     * @return array
     */
    public function _customizer_controls( $controls ) {
        $controls['modules']['sections']['product_badges'] = [
            'title'    => _x( 'Product Badges', 'Customizer', THEME_TEXTDOMAIN ),
            'controls' => [
                'product_badge_sale_color'    => [
                    'label' => _x( 'Sale Text Color', 'Customizer', THEME_TEXTDOMAIN ),
                    'type'  => 'color',
                ],
                'product_badge_sale_bg_color' => [
                    'label' => _x( 'Sale Background Color', 'Customizer', THEME_TEXTDOMAIN ),
                    'type'  => 'color',
                ],
                'product_badge_new_text'      => [
                    'label' => _x( 'New Text', 'Customizer', THEME_TEXTDOMAIN ),
                    'type'  => 'text',
                ],
                'product_badge_new_color'     => [
                    'label' => _x( 'New Text Color', 'Customizer', THEME_TEXTDOMAIN ),
                    'type'  => 'color',
                ],
                'product_badge_new_bg_color'  => [
                    'label' => _x( 'New Background Color', 'Customizer', THEME_TEXTDOMAIN ),
                    'type'  => 'color',
                ],
                'product_badge_hit_text'      => [
                    'label' => _x( 'Hit Text', 'Customizer', THEME_TEXTDOMAIN ),
                    'type'  => 'text',
                ],
                'product_badge_hit_color'     => [
                    'label' => _x( 'Hit Text Color', 'Customizer', THEME_TEXTDOMAIN ),
                    'type'  => 'color',
                ],
                'product_badge_hit_bg_color'  => [
                    'label' => _x( 'Hit Background Color', 'Customizer', THEME_TEXTDOMAIN ),
                    'type'  => 'color',
                ],
                'product_single_show_badges'  => [
                    'label' => _x( 'Show Badges on Product Page', 'Customizer', THEME_TEXTDOMAIN ),
                    'type'  => 'checkbox',
                ],
            ],
        ];

        return $controls;
    }

    /**
     * @param WC_Product $product
     *
     * @return string
     */
    protected function get_hit_text( $product ) {
        return apply_filters( 'bono_badge_hit_default_text', $this->core->get_option( 'product_badge_hit_text' ), $product );
    }

    /**
     * @param WC_Product $product
     *
     * @return string
     */
    protected function get_new_text( $product ) {
        return apply_filters( 'bono_badge_new_default_text', $this->core->get_option( 'product_badge_new_text' ), $product );
    }
}
