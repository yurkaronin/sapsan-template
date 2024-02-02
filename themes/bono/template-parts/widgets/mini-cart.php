<?php

/**
 * @package bono
 * @version 1.9.5
 */

/**
 * @var array $args
 */

$cart_style = $args['cart_style'];
$wc_args    = $args['wc_args'];
$instance   = $args['instance'];
$count      = $title_count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
$count      = apply_filters( 'bono_cart_contents_count', $count );

?>
<div class="header-cart site-header-cart header-cart--<?php echo esc_attr( $cart_style ) ?>">
    <?php
    if ( is_cart() ) {
        printf(
            '<span class="header-cart__link"><span class="header-cart__link-ico"></span><sup class="bono_header_widget_shopping_cart_count" title="%s">%s</sup></span>',
            $title_count,
            $count
        );
    } else {
        printf(
            '<a href="%s" class="header-cart__link js-header-cart-link"><span class="header-cart__link-ico"></span><sup class="bono_header_widget_shopping_cart_count" title="%s">%s</sup></a>',
            wc_get_cart_url(),
            $title_count,
            $count
        );
    }

    $wc_args['before_widget'] = '<div style="display: none" class="site-header-cart-hidden">';
    $wc_args['after_widget']  = '</div>';

    $wc_args['before_title'] = '<div class="header-cart__title">';
    $wc_args['after_title']  = '</div>';

    $instance['title'] = apply_filters( 'bono_minicart_header', __( 'Cart', THEME_TEXTDOMAIN ) );

    the_widget( 'WC_Widget_Cart', $instance, $wc_args );

    ?>
</div>
