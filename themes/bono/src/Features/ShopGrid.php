<?php

namespace Wpshop\TheTheme\Features;

use Wpshop\Core\Core;
use Wpshop\Core\Customizer\CustomizerCSS;

class ShopGrid {

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
        add_action( 'bono_customizer_styles', [ $this, '_add_styles' ] );
    }

    /**
     * @param CustomizerCSS $customizer
     *
     * @return void
     */
    public function _add_styles( $customizer ) {
        $pros = null;
        switch ( (int) $this->core->get_option( 'bono_columns_on_mobile' ) ) {
            case 1:
                return;
            case 2:
                $pros = 'width:50%';
                break;
            default:
                break;
        }

        if ( $pros ) {
            $columns = (array) apply_filters( 'bono:shop_grid_available_columns', [
                wc_get_loop_prop( 'columns' ),
                $this->core->get_option( 'bono_wc_recently_viewed_columns' ),
            ] );
            $columns = array_unique( array_map( 'absint', $columns ) );

            $selectors = [];
            foreach ( $columns as $column ) {
                $selectors[] = '.shop-grid--columns-' . $column . ' .product-category';
                $selectors[] = '.shop-grid--columns-' . $column . ' .shop-item:not(.shop-item--type-small)';
                $selectors[] = '.wc-block-grid.has-' . $column . '-columns .shop-item:not(.shop-item--type-small)';
                $selectors[] = '.wc-block-grid.has-' . $column . '-columns .shop-item:not(.shop-item--type-small)';
            }

            $customizer->add( implode( ",\n", $selectors ), [ $pros ], '(max-width:767px)' );

            $selectors = [];
            foreach ( range( 2, 8 ) as $column ) {
                $selectors[] = '.wc-block-grid.has-' . $column . '-columns .wc-block-grid__product';
            }
            $customizer->add( implode( ",\n", $selectors ), [
                [ 'flex:1 0 50%' ],
                [ 'max-width:50%' ],
            ], '(max-width:767px)' );
        }
    }
}
