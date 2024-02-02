<?php

namespace Wpshop\TheTheme\Support;

class MaxMegaMenuSupport {

    use CheckPluginTrait;

    /**
     * @return bool
     */
    public function enabled() {
        return $this->is_plugin_enabled( 'megamenu/megamenu.php' );
    }

    /**
     * @return void
     */
    public function init() {
        if ( ! $this->is_plugin_enabled( 'megamenu/megamenu.php' ) ) {
            return;
        }

        add_filter( 'bono_header_humburger', '__return_empty_string' );
        add_filter( 'bono_mobile_menu_placeholder', '__return_empty_string' );

        add_filter( 'bono_main_navigation_classes', [ $this, '_add_navigation_classes' ] );
        add_filter( 'bono_footer_navigation_classes', [ $this, '_add_navigation_classes' ] );
    }

    /**
     * @param array $classes
     *
     * @return array
     */
    public function _add_navigation_classes( $classes ) {
        $classes[] = 'mobile-not-hide';

        return $classes;
    }
}
