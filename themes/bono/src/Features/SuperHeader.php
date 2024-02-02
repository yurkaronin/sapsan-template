<?php

namespace Wpshop\TheTheme\Features;

class SuperHeader {

    /**
     * @return void
     */
    public function init() {
        add_shortcode( 'super_header_menu', [ $this, 'menu_shortcode' ] );
        do_action( __METHOD__, $this );
    }

    /**
     * @param string|array $atts
     * @param string       $content
     * @param string       $shortcode
     *
     * @return false|string
     * @throws \Exception
     */
    public function menu_shortcode( $atts, $content, $shortcode ) {
        $atts = shortcode_atts( [
            'menu_id' => 'super_header_menu',
        ], $atts, $shortcode );

        if ( ! $atts['menu_id'] ) {
            return '';
        }

        return _bono_ob_get_content( function ( $atts ) {
            if ( has_nav_menu('super_header') ) {
                ?>
                <nav class="super-header-navigation">
                    <?php
                    wp_nav_menu( apply_filters( 'bono_super_header_nav_args', [
                        'menu_id'        => $atts['menu_id'],
                        'theme_location' => 'super_header',
                    ], $atts ) )
                    ?>
                </nav>
                <?php
            }
        }, $atts );
    }
}
