<?php

namespace Wpshop\TheTheme\Features;

use WC_Product;
use WC_Product_Grouped;
use Wpshop\Core\Core;

class SaleFlash {

    /**
     * @var Core
     */
    protected $core;

    /**
     * SalesDiscount constructor.
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
        add_action( 'bono_shop_item_badges', 'woocommerce_show_product_loop_sale_flash' );
        add_action( 'bono_single_product_badges', [ $this, '_single_product_badges' ] );
        do_action( __METHOD__, $this );
    }

    /**
     * @return void
     */
    public function _single_product_badges() {
        if ( theme_container()->get( ProductBadges::class )->is_module_enabled() &&
             $this->core->get_option( 'product_single_show_badges' )
        ) {
            woocommerce_show_product_sale_flash();
        }
    }

    /**
     * @param WC_Product $product
     *
     * @return string
     */
    public function get_message( $product ) {
        $format = $product->is_type( 'grouped' )
            ? $this->core->get_option( 'sale_flash_price_grouped_format' )
            : $this->core->get_option( 'sale_flash_price_format' );

        $precision = apply_filters( 'bono_sale_flash_precision', 0 );

        $format = apply_filters( 'bono_sale_flash_format', $format, $product );

        $default_message = $this->core->get_option( 'sale_flash_default' );

        if ( $format && false !== strpos( $format, '{{' ) ) {
            if ( $product->is_type( 'grouped' ) ) {
                if ( $discount_data = $this->get_grouped_discounts( $product, $precision ) ) {
                    $replace_pairs = array_combine( [
                        '{{min_discount_percent}}',
                        '{{max_discount_percent}}',
                        '{{min_discount_value}}',
                        '{{max_discount_value}}',
                    ], $discount_data );

                    return strtr( $format, $replace_pairs ) ?: $default_message;
                }
            } else {
                if ( $discount_data = $this->get_discounts( $product, $precision ) ) {
                    $replace_pairs = array_combine( [ '{{discount_percent}}', '{{discount_value}}' ], $discount_data );

                    return strtr( $format, $replace_pairs ) ?: $default_message;
                }
            }
        }

        return $default_message;
    }

    /**
     * @param WC_Product_Grouped $product
     * @param int                $precision
     *
     * @return array|null [min_percent, max_percent, min_discount, max_discount]
     */
    protected function get_grouped_discounts( $product, $precision = 2 ) {
        $min_percent =
        $max_percent =
        $min_discount =
        $max_discount = null;
        foreach ( $product->get_children() as $child_id ) {
            list( $percent, $discount ) = $this->get_discounts( wc_get_product( $child_id ), $precision, false );
            if ( null !== $percent ) {
                $min_percent = null === $min_percent ? $percent : min( $percent, $min_percent );
                $max_percent = max( $percent, (float) $max_percent );
            }
            if ( null !== $discount ) {
                $min_discount = null === $min_discount ? $discount : min( $discount, (float) $min_discount );
                $max_discount = max( $discount, (float) $max_discount );
            }
        }

        if ( null === $min_percent ) { // it is assumed that the others are also null
            return null;
        }

        return [ $min_percent, $max_percent, $min_discount, $max_discount ];
    }

    /**
     * @param WC_Product $product
     * @param int        $precision
     * @param bool       $do_format
     *
     * @return array|null [percent, discount]
     */
    protected function get_discounts( $product, $precision = 2, $do_format = true ) {
        if ( $product->is_type( 'simple' ) || $product->is_type( 'external' ) ) {
            if ( ! $product->is_on_sale() ) {
                return null;
            }
            $price      = (float) $product->get_regular_price();
            $sale_price = $product->get_sale_price();
            $percent    = round( ( ( floatval( $price ) - floatval( $sale_price ) ) / floatval( $price ) ) * 100, $precision );

            return [ $percent, $do_format ? $this->format_price( $price - $sale_price ) : ( $price - $sale_price ) ];

        } elseif ( $product->is_type( 'variable' ) ) {
            $available_variations = $product->get_available_variations();
            $max_percent          = 0;
            $max_discount         = 0;

            for ( $i = 0 ; $i < count( $available_variations ) ; ++ $i ) {
                $variation_id     = $available_variations[ $i ]['variation_id'];
                $variable_product = new \WC_Product_Variation( $variation_id );

                if ( ! $variable_product->is_on_sale() ) {
                    continue;
                }

                $price      = $variable_product->get_regular_price();
                $sale_price = $variable_product->get_sale_price();
                $percent    = round( ( ( floatval( $price ) - floatval( $sale_price ) ) / floatval( $price ) ) * 100, $precision );
                $discount   = $price - $sale_price;

                if ( $percent > $max_percent ) {
                    $max_percent = $percent;
                }

                if ( $discount > $max_discount ) {
                    $max_discount = $discount;
                }
            }

            return [ $max_percent, $do_format ? $this->format_price( $max_discount ) : $max_discount ];
        }

        return null;
    }

    /**
     * Use custom function for preventing add tax and etc
     *
     * @param float $price
     * @param array $args
     *
     * @return string
     * @see wc_price()
     */
    protected function format_price( $price, $args = [] ) {
        $args = apply_filters(
            'wc_price_args',
            wp_parse_args(
                $args,
                [
                    'currency'           => '',
                    'decimal_separator'  => wc_get_price_decimal_separator(),
                    'thousand_separator' => wc_get_price_thousand_separator(),
                    'decimals'           => wc_get_price_decimals(),
                    'price_format'       => get_woocommerce_price_format(),
                ]
            )
        );

        $negative = $price < 0;
        $price    = apply_filters( 'raw_woocommerce_price', floatval( $negative ? $price * - 1 : $price ) );
        $price    = apply_filters(
            'formatted_woocommerce_price',
            number_format(
                $price,
                $args['decimals'],
                $args['decimal_separator'],
                $args['thousand_separator']
            ),
            $price, $args['decimals'], $args['decimal_separator'], $args['thousand_separator']
        );

        if ( apply_filters( 'woocommerce_price_trim_zeros', false ) && $args['decimals'] > 0 ) {
            $price = wc_trim_zeros( $price );
        }

        $formatted_price = ( $negative ? '-' : '' ) . sprintf( $args['price_format'], '<span class="woocommerce-Price-currencySymbol">' . get_woocommerce_currency_symbol( $args['currency'] ) . '</span>', $price );

        return '<span class="woocommerce-Price-amount amount">' . $formatted_price . '</span>';
    }
}
