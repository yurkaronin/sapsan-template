<?php
/**
 * ****************************************************************************
 *
 *   DON'T EDIT THIS FILE
 *   After update you will lose all changes. Use child theme
 *
 *   НЕ РЕДАКТИРУЙТЕ ЭТОТ ФАЙЛ
 *   После обновления Вы потереяете все изменения. Используйте дочернюю тему
 *
 *   https://support.wpshop.ru/docs/themes/bono/child/
 *
 * *****************************************************************************
 *
 * @package bono
 * @version 1.9.0
 */

use Wpshop\TheTheme\Features\CompareProducts;
use Wpshop\TheTheme\Features\Favorite;
use Wpshop\TheTheme\Widget\MiniCart;

$wpshop_core        = theme_container()->get( \Wpshop\Core\Core::class );
$header_block_order = $wpshop_core->get_option( 'header_block_order' );
$header_block_order = apply_filters( 'bono_header_block_order', explode( ',', $header_block_order ) );

$header_style = ( $header_style = $wpshop_core->get_option( 'header_style_type' ) ) ? ' site-header--' . $header_style : '';

?>

<?php do_action( 'bono_before_header' ) ?>

<header id="masthead" class="site-header<?php echo $header_style ?> <?php $wpshop_core->the_option( 'header_width' ) ?>" itemscope itemtype="http://schema.org/WPHeader">
    <div class="site-header-inner <?php $wpshop_core->the_option( 'header_inner_width' ) ?>">

        <?php echo apply_filters( 'bono_header_humburger', '<div class="humburger js-humburger"><span></span><span></span><span></span></div>' ); ?>

        <?php foreach ( $header_block_order as $order ) {

            if ( $order == 'site_branding' ) {
                get_template_part( 'template-parts/header/site', 'branding' );
            }

            $header_html_block_1 = $wpshop_core->get_option( 'header_html_block_1' );
            if ( $order == 'header_html_block_1' && ! empty ( $header_html_block_1 ) ) { ?>
                <div class="header-html-1">
                    <?php echo do_shortcode( $header_html_block_1 ) ?>
                </div>
            <?php }

            if ( $order == 'header_social' ) {
                get_template_part( 'template-parts/blocks/social', 'links' );
            }

            if ( $order == 'top_menu' ) {
                get_template_part( 'template-parts/navigation/top' );
            }

            $header_html_block_2 = $wpshop_core->get_option( 'header_html_block_2' );
            if ( $order == 'header_html_block_2' && ! empty( $header_html_block_2 ) ) { ?>
                <div class="header-html-2">
                    <?php echo do_shortcode( $header_html_block_2 ) ?>
                </div>
            <?php }

            if ( $order == 'header_search' ) { ?>
                <?php
                $search_type = apply_filters( 'bono_header_search_type', $wpshop_core->get_option( 'header_search_type' ) );
                echo apply_filters( 'bono_header_search', _bono_ob_get_content( function () use ( $search_type, $wpshop_core ) {
                    ?>
                    <div class="header-search header-search--<?php echo $search_type ?>">

                        <?php if ( $search_type == 'compact' ): ?>
                            <span class="header-search-ico js-header-search-ico"></span>
                        <?php endif; ?>

                        <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                            <label>
                                <span class="screen-reader-text"><?php echo __( 'Search for:', THEME_TEXTDOMAIN ) ?></span>
                                <input type="search" class="search-field" placeholder="<?php echo __( 'Search', THEME_TEXTDOMAIN ) ?>..." value="" name="s">
                            </label>
                            <?php if ( $wpshop_core->get_option( 'search_products_only' ) ): ?>
                                <input type="hidden" name="post_type" value="product"/>
                            <?php endif ?>
                            <button type="submit" class="search-submit"></button>
                        </form>
                    </div>
                    <?php
                } ) )
                ?>
            <?php }

            if ( $order == 'header_phone_number' && $wpshop_core->get_option( 'header_phone_number' ) ) {
                ?>
                <div class="header-phone">
                    <?php
                    $phones = $wpshop_core->get_option( 'header_phone_number' );
                    $phones = explode( "\n", $phones );
                    $phones = array_map( 'trim', $phones );
                    $phones = array_filter( $phones );
                    foreach ( $phones as $phone ) {
                        $phone_parts = explode( "//", $phone );
                        $phone_parts = array_map( 'trim', $phone_parts );
                        $phone_clean = preg_replace( '/[^\d+]/ui', '', wp_strip_all_tags( $phone_parts[0] ) );

                        $phone_clean = apply_filters( 'bono_header_phone_clean', $phone_clean, $phone_parts );

                        $result = '<div class="header-phone__item">';
                        $result .= '<a href="tel:' . urlencode( $phone_clean ) . '">';
                        $result .= $phone_parts[0];
                        if ( ! empty( $phone_parts[1] ) ) {
                            $result .= '<br><small>' . $phone_parts[1] . '</small>';
                        }
                        $result .= '</a>';
                        $result .= '</div>';
                        echo apply_filters( 'bono_header_phone', $result );
                    }
                    ?>
                </div>
                <?php
            }

            if ( $order == 'header_favorite' ) {
                echo bono_get_header_favorite_item();
            }

            if ( $order == 'header_compare' ) {
                echo bono_get_header_product_compare_item();
            }

            if ( $order == 'header_cart' && apply_filters( 'bono_enabled_minicart', true ) ) {
                the_widget( MiniCart::class, 'title=', [
                    'wc_cart_widget_args' => [

                    ],
                ] );
            }

            if ( $order == 'customer_account' && is_wc_enabled() ) {
                echo bono_get_header_customer_account_item();
            }
        } ?>

    </div>
</header><!-- #masthead -->

<?php do_action( 'bono_after_header' ) ?>
