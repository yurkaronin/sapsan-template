<?php

namespace Wpshop\TheTheme;

use Exception;
use WC_Product;
use Wpshop\Core\Core;
use Wpshop\Core\Customizer\CustomizerCSS;
use Wpshop\TheTheme\Features\CompareProducts;
use Wpshop\TheTheme\Features\Favorite;
use Wpshop\TheTheme\Features\QuickView;

class WoocommerceBlocks {

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
        add_filter( 'woocommerce_blocks_product_grid_item_html', [ $this, '_change_markup' ], 11, 3 );
    }

    /**
     * @param string     $result
     * @param array      $data
     * @param WC_Product $product
     *
     * @return string
     * @throws Exception
     */
    public function _change_markup( $result, $data, $product ) {
        $features_order = apply_filters( 'bono_product_features_order', [
            'favorite',
            'quick_view',
            'compare',
        ], 'content-product-card-standard' );
        $icons          = [];
        foreach ( $features_order as $order ) {
            if ( $order === 'favorite' && theme_container()->get( Favorite::class )->enabled() ) {
                $icons[] = sprintf( '<span class="shop-item__icons-favorite js-shop-item-favorite" title="%s" data-product_id="%d"></span>', __( 'Add to Favorite', THEME_TEXTDOMAIN ), $product->get_id() );
            }
            if ( $order === 'quick_view' && theme_container()->get( QuickView::class )->enabled() ) {
                $icons[] = sprintf( '<span class="shop-item__icons-quick js-shop-item-quick" title="%s" data-product_id="%d"></span>', __( 'Quick View', THEME_TEXTDOMAIN ), $product->get_id() );
            }
            if ( $order === 'quick_view' && theme_container()->get( CompareProducts::class )->enabled() ) {
                $icons[] = sprintf( '<span class="shop-item__icons-compare js-shop-item-compare" title="%s" data-product_id="%d"></span>', __( 'Add to Compare', THEME_TEXTDOMAIN ), $product->get_id() );
            }
        }
        $icons = implode( "\n", $icons );

        $badges = _bono_ob_get_content( function ( $current_product ) {
            global $product;
            $product = $current_product;
            do_action( 'bono_shop_item_badges', 'card-standard' );
        }, $product );

        $image = $product->get_image( 'woocommerce_thumbnail' );

        if ( $button = $data->button ) {
            $attributes = [
                'aria-label'       => $product->add_to_cart_description(),
                'data-quantity'    => '1',
                'data-product_id'  => $product->get_id(),
                'data-product_sku' => $product->get_sku(),
                'rel'              => 'nofollow',
                'class'            => 'wp-block-button__link shop-item__buttons-cart add_to_cart_button',
            ];

            if ( $product->supports( 'ajax_add_to_cart' ) ) {
                $attributes['class'] .= ' ajax_add_to_cart';
            }
            $button = sprintf(
                '<a href="%s" %s>%s</a>',
                esc_url( $product->add_to_cart_url() ),
                wc_implode_html_attributes( $attributes ),
                esc_html( $product->add_to_cart_text() )
            );
        }

        $rating = '';
        if ( wc_review_ratings_enabled() && ! empty( $this->attributes['contentVisibility']['rating'] ) ) {
            if ( $rating_count = $product->get_rating_count() > 0 ) {
                $rating = wc_get_rating_html( $product->get_average_rating(), $rating_count );
            }
        }

        $inner_classes = esc_attr( apply_filters( 'bono_shop_item_inner_classes', 'shop-item-inner', 'block' ) );
        $inner_image_classes = esc_attr( apply_filters( 'bono_shop_item_image_inner_classes', 'shop-item__image-inner', 'block' ) );

        $result = "
<li class=\"wc-block-grid__product shop-item product shop-item--type-standard\">
    <div class=\"{$inner_classes}\">
        <div class=\"shop-item__image\">
            <div class=\"{$inner_image_classes}\">
                {$image}
                <div class=\"shop-item__buttons\">
                    {$button}
                    <div class=\"added_to_cart\"></div>
                </div>
            </div>
            <div class=\"shop-item__icons\">
                {$icons}
            </div>
        </div>
        <div class=\"shop-item__badges\">
            {$badges}
        </div>
        <div class=\"shop-item__title\">
            <a href=\"{$data->permalink}\" class=\"wc-block-grid__product-link\">
                {$data->title}
            </a>
        </div>
        <div class=\"shop-item__price\">
            {$data->price}
        </div>
        <div class=\"shop-item__rating\">
            {$rating}
        </div>
    </div>
</li>";

        return $result;
    }
}
