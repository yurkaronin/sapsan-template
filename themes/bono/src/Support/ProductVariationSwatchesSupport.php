<?php

namespace Wpshop\TheTheme\Support;

/**
 * Class ProductVariationSwatchesSupport
 * @package Wpshop\TheTheme\Support
 *
 * Support for https://themehigh.com/product/woocommerce-product-variation-swatches
 */
class ProductVariationSwatchesSupport {

    use CheckPluginTrait;

    /**
     * @return void
     */
    public function init() {
        if ( $this->is_plugin_enabled( 'product-variation-swatches-for-woocommerce/product-variation-swatches-for-woocommerce.php' ) ) {
            add_filter( 'thwvsf_is_quick_view_plugin_active', '__return_true' );
            add_filter( 'thwvsf_enqueue_public_scripts', '__return_true' );
            add_action( 'wp_enqueue_scripts', function () {
                wp_add_inline_script( 'bono-scripts', <<<JS
document.addEventListener('bono_quick_view_append_html', function (event) {
    thwvsf_public.initialize_thwvsf();
});
JS
                );
            } );
        }
    }
}
