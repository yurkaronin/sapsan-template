<?php

namespace Wpshop\TheTheme\Features;

use AIOSEO\Plugin\Common\Main\Head;
use WC_Product;
use WP_Term;
use Wpshop\Core\Core;

class Seo {

    /**
     * @var Core
     */
    protected $core;

    /**
     * @var bool
     */
    protected static $items_rendered = [
        'keywords'    => false,
        'description' => false,
    ];

    /**
     * Seo constructor.
     *
     * @param Core $core
     */
    public function __construct( Core $core ) {
        $this->core = $core;
    }

    /**
     * @return void
     */
    public function init() {
        if ( $this->enabled() ) {
            $this->add_additional_fields();;

            add_filter( 'pre_get_document_title', [ $this, 'filter_document_title' ], 999991 );
            add_action( 'wp_head', [ $this, 'head_metadata' ], .9 );

            add_filter( 'woocommerce_page_title', [ $this, '_category_title' ] );

            add_filter( 'aioseo_meta_views', [ $this, 'filter_aioseo_meta_views' ] );
        }

        do_action( __METHOD__, $this );
    }

    /**
     * @return bool
     */
    public static function is_aioseo_enabled() {
        return in_array(
            'all-in-one-seo-pack/all_in_one_seo_pack.php',
            (array) apply_filters( 'active_plugins', get_option( 'active_plugins' ), [] )
        );
    }

    /**
     * @param string $type
     *
     * @return bool
     */
    public static function aioseo_do_render_item( $type ) {
        if ( array_key_exists( $type, static::$items_rendered ) ) {
            switch ( theme_container()->get( Core::class )->get_option( 'integrate_aioseo_action' ) ) {
                case 'replace_not_empty':
                    return ! static::$items_rendered[ $type ];
                case 'replace_always':
                    return false;
                default:
                    break;
            }
        }

        return true;
    }

    /**
     * @param $views
     *
     * @return mixed
     * @see Head::__construct()
     */
    public function filter_aioseo_meta_views( $views ) {
        $views['meta'] = TEMPLATEPATH . '/template-parts/all-in-one-seo-pack/meta.php';

        return $views;
    }

    /**
     * @return void
     */
    public function head_metadata() {
        $keywords = $description = null;
        if ( is_wc_enabled() && is_product() ) {
            $product     = wc_get_product();
            $keywords    = $product->get_meta( 'seo_meta_keywords' );
            $description = $product->get_meta( 'seo_meta_description' );
        }
        if ( is_wc_enabled() && is_product_category() ) {
            $term        = get_queried_object();
            $keywords    = get_term_meta( $term->term_id, 'seo_meta_keywords', true );
            $description = get_term_meta( $term->term_id, 'seo_meta_description', true );
        }

        if ( $keywords ) {
            printf( '<meta name="keywords" content="%s">', esc_attr( $keywords ) );
            static::$items_rendered['keywords'] = true;
        }
        if ( $description ) {
            printf( '<meta name="description" content="%s">', esc_attr( $description ) );
            static::$items_rendered['description'] = true;
        }
    }

    /**
     * @param $result
     *
     * @return string
     */
    public function _category_title( $result ) {
        if ( is_wc_enabled() && is_product_category() ) {
            $term = get_queried_object();
            if ( $h1 = trim( get_term_meta( $term->term_id, 'seo_h1', true ) ) ) {
                $result = $h1;
            }
        }

        return $result;
    }

    /**
     * @param string $title
     *
     * @return string
     */
    public function filter_document_title( $title ) {
        $meta_title = null;
        if ( is_wc_enabled() && is_product() ) {
            $product    = wc_get_product();
            $meta_title = $product->get_meta( 'seo_meta_title' );
        }
        if ( is_wc_enabled() && is_product_category() ) {
            $term       = get_queried_object();
            $meta_title = get_term_meta( $term->term_id, 'seo_meta_title', true );
        }

        if ( $meta_title ) {
            $title = $meta_title;
        }

        return $title;
    }

    /**
     * @return void
     */
    protected function add_additional_fields() {
        add_action( 'product_cat_add_form_fields', [ $this, '_render_category_fields' ], 11 );
        add_action( 'product_cat_edit_form_fields', [ $this, '_render_category_fields' ], 11 );
        add_action( 'created_term', [ $this, '_save_category_fields' ], 10, 3 );
        add_action( 'edit_term', [ $this, '_save_category_fields' ], 10, 3 );

        add_action(
            'woocommerce_product_options_advanced', //'woocommerce_product_options_general_product_data',
            [ $this, '_add_woocommerce_additional_fields' ]
        );
        add_action(
            'woocommerce_process_product_meta',
            [ $this, '_save_woocommerce_additional_fields' ]
        );
    }

    /**
     * @param WP_Term $term
     *
     * @return void
     */
    public function _render_category_fields( $term ) {
        ?>
        <tr class="form-field term-display-type-wrap">
            <th scope="row" valign="top"><label><?php echo esc_html__( 'SEO Title', THEME_TEXTDOMAIN ) ?></label></th>
            <td>
                <input name="seo_meta_title"
                       id="seo_meta_title"
                       type="text"
                       value="<?php echo get_term_meta( $term->term_id, 'seo_meta_title', true ) ?>">
            </td>
        </tr>
        <tr class="form-field term-display-type-wrap">
            <th scope="row" valign="top"><label><?php echo esc_html__( 'SEO h1', THEME_TEXTDOMAIN ) ?></label></th>
            <td>
                <input name="seo_h1"
                       id="seo_h1"
                       type="text"
                       value="<?php echo get_term_meta( $term->term_id, 'seo_h1', true ) ?>">
            </td>
        </tr>
        <tr class="form-field term-display-type-wrap">
            <th scope="row" valign="top"><label><?php echo esc_html__( 'SEO Description', THEME_TEXTDOMAIN ) ?></label>
            </th>
            <td>
            <textarea name="seo_meta_description"
                      id="seo_meta_description"
                      rows="5" cols="50"
                      class="large-text"><?php echo get_term_meta( $term->term_id, 'seo_meta_description', true ) ?></textarea>
            </td>
        </tr>
        <tr class="form-field term-display-type-wrap">
            <th scope="row" valign="top"><label><?php echo esc_html__( 'SEO Keywords', THEME_TEXTDOMAIN ) ?></label>
            </th>
            <td>
            <textarea name="seo_meta_keywords"
                      id="seo_meta_keywords"
                      rows="5" cols="50"
                      class="large-text"><?php echo get_term_meta( $term->term_id, 'seo_meta_keywords', true ) ?></textarea>
            </td>
        </tr>
        <?php
    }

    /**
     * @param int    $term_id
     * @param string $tt_id
     * @param string $taxonomy
     *
     * @return void
     */
    public function _save_category_fields( $term_id, $tt_id = '', $taxonomy = '' ) {
        foreach ( [ 'seo_meta_title', 'seo_meta_description', 'seo_meta_keywords', 'seo_h1' ] as $key ) {
            if ( isset( $_POST[ $key ] ) && 'product_cat' === $taxonomy ) {
                update_term_meta( $term_id, $key, esc_attr( $_POST[ $key ] ) );
            }
        }
    }

    /**
     * @return void
     */
    public function _add_woocommerce_additional_fields() {
        global $product_object;
        /** @var WC_Product $product_object */
        woocommerce_wp_text_input( [
            'id'    => 'seo_meta_title',
            'label' => __( 'SEO Meta Title', THEME_TEXTDOMAIN ),
            'value' => $product_object->get_meta( 'seo_meta_title' ),
        ] );
        woocommerce_wp_textarea_input( [
            'id'    => 'seo_meta_description',
            'label' => __( 'SEO Meta Description', THEME_TEXTDOMAIN ),
            'value' => $product_object->get_meta( 'seo_meta_description' ),
        ] );
        woocommerce_wp_textarea_input( [
            'id'    => 'seo_meta_keywords',
            'label' => __( 'SEO Meta Keywords', THEME_TEXTDOMAIN ),
            'value' => $product_object->get_meta( 'seo_meta_keywords' ),
        ] );
    }

    /**
     * @param int $post_id
     *
     * @return void
     */
    public function _save_woocommerce_additional_fields( $post_id ) {
        $product = wc_get_product( $post_id );
        foreach ( [ 'seo_meta_title', 'seo_meta_description', 'seo_meta_keywords' ] as $key ) {
            if ( ! array_key_exists( $key, $_POST ) ) {
                continue;
            }
            $data = wp_unslash( $_POST[ $key ] );
            $product->update_meta_data( $key, $data );
        }
        $product->save();
    }

    /**
     * @return bool
     */
    public function enabled() {
        $result = apply_filters( __METHOD__, $this->core->get_option( 'seo_enabled' ) );
        $result = apply_filters( 'bono_seo_enabled', $result );

        return $result;
    }
}
