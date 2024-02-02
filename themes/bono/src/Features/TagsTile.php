<?php

namespace Wpshop\TheTheme\Features;

use Wpshop\Core\Core;

class TagsTile {

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
        add_shortcode( 'bono_tags', [ $this, '_tags_shortcode' ] );

        add_filter( 'bono_show_tags', [ $this, '_show_tags_on_product_page' ] );
        add_filter( 'bono_show_tags', [ $this, '_hide_standard_tags' ], 11 );

        add_action( 'bono_single_product_meta', [ $this, '_show_tags_as_tile' ] );

        do_action( __METHOD__, $this );
    }

    /**
     * @param array  $atts
     * @param string $content
     * @param string $shortcode
     *
     * @return string
     * @throws \Exception
     */
    public function _tags_shortcode( $atts, $content, $shortcode ) {
        $atts = shortcode_atts( [
            'product_id' => null,
        ], $atts, $shortcode );

        return _bono_ob_get_content( function () use ( $atts ) {
            if ( $atts['product_id'] ) {
                $terms = get_the_terms( $atts['product_id'], 'product_tag' );
            } else {
                $terms = get_terms( [
                    'taxonomy'   => 'product_tag',
                    'hide_empty' => true,
                ] );
            }

            if ( $terms ) {
                $classes = 'term-list--product-tags';
                echo '<div class="term-list-wrap">';
                get_template_part( 'template-parts/archive/term-list', null, compact( 'terms', 'classes' ) );
                echo '</div>';
            }
        } );
    }

    /**
     *
     * /**
     * @return bool
     */
    public function _show_tags_on_product_page() {
        return ! $this->core->get_option( 'product_hide_tags' );
    }

    /**
     * @param bool $result
     *
     * @return bool
     */
    public function _hide_standard_tags( $result ) {
        if ( $this->core->get_option( 'product_show_tags_as_tile' ) ) {
            $result = false;
        }

        return $result;
    }

    /**
     * @return void
     */
    public function _show_tags_as_tile() {
        if ( ! $this->core->get_option( 'product_hide_tags' ) &&
             $this->core->get_option( 'product_show_tags_as_tile' )
        ) {
            if ( $terms = get_the_terms( get_the_ID(), 'product_tag' ) ) {
                $classes = 'term-list--product-tags';
                echo '<div class="term-list-wrap">';
                get_template_part( 'template-parts/archive/term-list', null, compact( 'terms', 'classes' ) );
                echo '</div>';
            }
        }
    }
}
