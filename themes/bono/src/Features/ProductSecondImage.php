<?php

namespace Wpshop\TheTheme\Features;

use Wpshop\Core\Core;

class ProductSecondImage {

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
        add_action( 'bono_product_thumbnail', [ $this, '_product_thumbnail' ] );
        add_filter( 'wp_get_attachment_image_attributes', [ $this, '_append_second_image_attributes' ] );

        add_filter( 'bono_shop_item_inner_classes', [ $this, '_add_has_second_class' ], 10, 2 );
        add_filter( 'bono_shop_item_image_inner_classes', [ $this, '_add_has_second_class' ], 10, 2 );
        do_action( __METHOD__, $this );
    }

    /**
     * @return bool
     */
    public function enabled() {
        return (bool) apply_filters( 'bono_product_second_image_enabled', $this->core->get_option( 'bono_show_second_image' ) );
    }

    /**
     * @param string $type
     *
     * @return void
     */
    public function _product_thumbnail( $type ) {
        echo woocommerce_get_product_thumbnail();
    }

    /**
     * @param array $attr
     *
     * @return array
     * @see wp_get_attachment_image()
     */
    public function _append_second_image_attributes( $attr ) {
        if ( ! doing_filter( 'bono_product_thumbnail' ) ) {
            return $attr;
        }

        global $product;

        if ( $product ) {
            $gallery_ids = wc_get_product( $product )->get_gallery_image_ids();
            if ( isset( $gallery_ids[0] ) ) {
                list( $src, $width, $height ) = wp_get_attachment_image_src(
                    $gallery_ids[0],
                    apply_filters( 'single_product_archive_thumbnail_size', 'woocommerce_thumbnail' )
                );

                $attr['data-second-src'] = $src;

                $image_meta = wp_get_attachment_metadata( $gallery_ids[0] );
                if ( is_array( $image_meta ) ) {

                    $size_array = [ absint( $width ), absint( $height ) ];

                    $srcset = wp_calculate_image_srcset( $size_array, $src, $image_meta, $gallery_ids[0] );
                    $sizes  = wp_calculate_image_sizes( $size_array, $src, $image_meta, $gallery_ids[0] );

                    if ( $srcset && $sizes ) {
                        $attr['data-second-srcset'] = $srcset;
                        $attr['data-second-sizes']  = $sizes;
                    }
                }

            }
        }

        return $attr;
    }

    /**
     * @param string $classes
     *
     * @return string
     */
    public function _add_has_second_class( $classes, $type ) {
        if ( $this->enabled() &&
             ! in_array( $type, [ 'card-small', 'small' ] ) &&
             $this->has_gallery_images()
        ) {
            $classes .= ' has-second-image';
        }

        return trim( $classes );
    }

    /**
     * @param string $size
     * @param array  $attr
     * @param bool   $placeholder
     *
     * @return string
     * @see woocommerce_get_product_thumbnail()
     * @deprecated
     */
    public function get_product_thumbnail( $size = 'woocommerce_thumbnail', $attr = [], $placeholder = true ) {
        global $product;

        if ( ! is_array( $attr ) ) {
            $attr = [];
        }

        if ( ! is_bool( $placeholder ) ) {
            $placeholder = true;
        }

        $image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );

        $result = $product ? $product->get_image( $image_size, $attr, $placeholder ) : '';

        $gallery_ids = wc_get_product( $product )->get_gallery_image_ids();
        if ( isset( $gallery_ids[0] ) ) {
            $result .= wp_get_attachment_image( $gallery_ids[0], $image_size );
        } else {
            $result .= $result;
        }

        return $result;
    }

    /**
     * @param mixed $product
     *
     * @return bool
     * @see wc_get_product()
     */
    public function has_gallery_images( $product = false ) {
        if ( $product = wc_get_product( $product ) ) {
            return ! empty( $product->get_gallery_image_ids() );
        }

        return false;
    }
}
