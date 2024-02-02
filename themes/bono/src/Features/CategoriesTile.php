<?php

namespace Wpshop\TheTheme\Features;

use WP_Term;
use Wpshop\Core\Core;

class CategoriesTile {

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
        add_action( 'woocommerce_archive_description', [ $this, '_categories_tile' ], 9 );

        add_action( 'product_cat_add_form_fields', [ $this, '_render_category_fields' ], 11 );
        add_action( 'product_cat_edit_form_fields', [ $this, '_render_category_fields' ], 11 );
        add_action( 'created_term', [ $this, '_save_category_fields' ], 10, 3 );
        add_action( 'edit_term', [ $this, '_save_category_fields' ], 10, 3 );

        add_filter( 'bono_show_categories', [ $this, '_show_categories_on_product_page' ] );
        add_filter( 'bono_show_categories', [ $this, '_hide_default_categories' ], 11 );

        add_action( 'bono_single_product_meta', [ $this, '_show_categories_as_tile' ] );

        do_action( __METHOD__, $this );
    }

    /**
     * @return void
     */
    public function _categories_tile() {
        if ( is_product_taxonomy() && 0 === absint( get_query_var( 'paged' ) ) ) {
            /** @var WP_Term $term */
            $term = get_queried_object();
            if ( get_term_meta( $term->term_id, 'bono_show_categories_tile', true ) ) {
                $args  = apply_filters( 'bono_archive_tile_categories_args', [
                    'parent'   => $term->term_id,
                    'taxonomy' => 'product_cat',
                ], $term );
                $terms = apply_filters( 'bono_archive_tile_categories', get_categories( $args ) );

                get_template_part( 'template-parts/archive/term-list', null, compact( 'terms' ) );
            }
        }
    }

    /**
     * @param WP_Term $term
     *
     * @return void
     */
    public function _render_category_fields( $term ) {
        $term_id    = is_object( $term ) ? $term->term_id : $term;
        $show_title = $term_id ? (bool) get_term_meta( $term_id, 'bono_show_categories_tile', true ) : false;
        ?>
        <tr class="form-field term-display-type-wrap">
            <th scope="row" valign="top">
                <label><?php echo esc_html__( 'Categories Tile', THEME_TEXTDOMAIN ) ?></label>
            </th>
            <td>
                <label>
                    <input type="checkbox" name="bono_show_categories_tile" value="1" <?php checked( true, $show_title ) ?>>
                    <?php echo esc_html__( 'show', THEME_TEXTDOMAIN ) ?>
                </label>
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
        if ( 'product_cat' === $taxonomy ) {
            update_term_meta( $term_id, 'bono_show_categories_tile', isset( $_POST['bono_show_categories_tile'] ) ? 1 : 0 );
        }
    }

    /**
     * @return bool
     */
    public function _show_categories_on_product_page() {
        return ! $this->core->get_option( 'product_hide_categories' );
    }

    /**
     * @param bool $result
     *
     * @return bool
     */
    public function _hide_default_categories( $result ) {
        if ( $this->core->get_option( 'product_show_categories_as_tile' ) ) {
            $result = false;
        }

        return $result;
    }

    public function _show_categories_as_tile() {
        if ( ! $this->core->get_option( 'product_hide_categories' ) &&
             $this->core->get_option( 'product_show_categories_as_tile' )
        ) {
            if ( $terms = get_the_terms( get_the_ID(), 'product_cat' ) ) {
                $classes = 'term-list--product-categories';
                echo '<div class="term-list-wrap">';
                get_template_part( 'template-parts/archive/term-list', null, compact( 'terms', 'classes' ) );
                echo '</div>';
            }
        }
    }
}
