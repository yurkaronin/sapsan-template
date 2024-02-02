<?php
/**
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
    return;
}

?>
<div class="shop-item__rating">
    <?php echo wc_get_rating_html( $product->get_average_rating() ); // WordPress.XSS.EscapeOutput.OutputNotEscaped. ?>
</div>
