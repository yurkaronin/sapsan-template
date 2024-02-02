<?php

namespace Wpshop\TheTheme;

use Wpshop\Core\Core;
use Wpshop\TheTheme\Features\HomeConstructor;

class DefaultHooks {

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
        add_action( 'init', [ $this, '_trigger_rating_click' ] );

        add_action( 'bono_single_price', [ $this, '_single_price' ] );

        add_filter( 'woocommerce_output_related_products_args', [ $this, '_related_and_recent_columns_and_count' ], 9 );

        add_action( 'bono_after_product_info', [ $this, '_single_product_breadcrumbs' ] );
        add_action( 'bono_after_product_container', [ $this, '_single_product_breadcrumbs_mobile' ] );

        add_filter( 'bono_one_click_buy:button_label', [ $this, '_one_click_btn_label' ], 9 );
        add_filter( 'bono_one_click_buy:consent_checked', [ $this, '_one_click_by_consent_checked' ], 9 );

        add_filter( 'bono_related_products__header', [ $this, '_related_products_header' ] );
        add_filter( 'bono_recently_viewed__header', [ $this, '_recently_viewed_header' ] );

        add_filter( 'bono_recently_viewed__card_type', [ $this, '_recently_viewed_card_type' ] );

        add_filter( 'bono_super_header_block', 'do_shortcode' );

        add_action( 'bono_homepage_constructor', [ theme_container()->get( HomeConstructor::class ), 'output' ] );

        add_filter( 'bono_my_account_text', 'esc_html' );
        add_filter( 'bono_my_account_login_text', 'esc_html' );

        add_filter( 'bono_sale_flash_format', 'trim' );

        add_filter( 'bono_cart_contents_count', 'ceil' );
    }

    /**
     * @return void
     */
    public function _single_price() {
        //wc_get_template( 'loop/price.php' );
        wc_get_template( 'single-product/price.php' );
    }

    /**
     * @return void
     */
    public function _trigger_rating_click() {
        if ( function_exists( 'is_product' ) && is_product() ) {
            add_action( 'wp_enqueue_scripts', function () {
                $js = <<<'JS'
jQuery(function ($){
    $('.comment-form-rating .star-5').trigger('click');
});
JS;
                wp_add_inline_script( 'bono-scripts', $js );
            } );
        }
    }

    /**
     * @return array
     */
    public function _related_and_recent_columns_and_count() {
        $args['columns']        = $this->core->get_option( 'bono_wc_recently_viewed_columns' );
        $args['posts_per_page'] = $this->core->get_option( 'bono_related_products_limit' );

        return $args;
    }

    /**
     * @param string $type
     *
     * @return void
     */
    public function _single_product_breadcrumbs( $type = 'main' ) {
        if ( $type !== 'main' ) {
            return;
        }

        if ( ! $this->apply_breadcrumbs_legacy() && wp_is_mobile() ) {
            return;
        }

        woocommerce_breadcrumb();
    }

    /**
     * @param string $type
     *
     * @return void
     */
    public function _single_product_breadcrumbs_mobile( $type = 'main' ) {
        if ( $type !== 'main' ) {
            return;
        }

        if ( $this->apply_breadcrumbs_legacy() ) {
            return;
        }

        if ( ! wp_is_mobile() ) {
            return;
        }

        woocommerce_breadcrumb();
    }

    /**
     * @return string
     */
    public function _one_click_btn_label() {
        return esc_html( $this->core->get_option( 'one_click_buy_btn_text' ) );
    }

    /**
     * @return bool
     */
    public function _one_click_by_consent_checked() {
        return (bool) $this->core->get_option( 'one_click_buy_consent_checked' );
    }

    /**
     * @return string
     */
    public function _related_products_header() {
        return $this->core->get_option( 'product_related_title' );
    }

    /**
     * @return string
     */
    public function _recently_viewed_header() {
        return $this->core->get_option( 'product_recent_title' );
    }

    /**
     * @return string
     */
    public function _recently_viewed_card_type() {
        return $this->core->get_option( 'product_recent_card_type' );
    }

    /**
     * @return bool
     */
    protected function apply_breadcrumbs_legacy() {
        return (bool) apply_filters( 'bono_breadcrumbs:apply_legacy', false );
    }

}
