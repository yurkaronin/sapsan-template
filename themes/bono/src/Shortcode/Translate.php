<?php

namespace Wpshop\TheTheme\Shortcode;

class Translate {

    /**
     * @return void
     */
    public function init() {
        if ( ! shortcode_exists( 'i18n' ) ) {
            add_shortcode( 'i18n', [ $this, 'i18n' ] );
        }
        do_action( __METHOD__, $this );
    }

    /**
     * @param array  $atts
     * @param string $content
     * @param string $shortcode
     *
     * @return string
     */
    public function i18n( $atts, $content, $shortcode ) {
        $atts = shortcode_atts( [
            'text' => '',
        ], $atts, $shortcode );

        if ( $atts['text'] ) {
            return $this->translate( $atts['text'] );
        }

        return $this->translate( $content );
    }

    /**
     * @param string $text
     *
     * @return string
     */
    public function translate( $text ) {
        return __( $text, THEME_TEXTDOMAIN );
    }
}
