<?php

namespace Wpshop\TheTheme\Features;

class I18n {

    /**
     * @return void
     */
    public function init() {
//        add_filter( 'option_bono_options', [ $this, '_localize_options' ] );
//        add_shortcode( 'translate', [ $this, '_translate_shortcode' ] );

        do_action( __METHOD__, $this );
    }

    /**
     * @param array  $atts
     * @param string $content
     * @param string $shortcode
     *
     * @return string
     */
    public function _translate_shortcode( $atts, $content, $shortcode ) {
        return $this->translate( $content );
    }

    /**
     * @param array $value
     *
     * @return array
     */
    public function _localize_options( $value ) {
        $to_localize = (array) apply_filters( 'bono_opt_key_to_localize', [
            'super_header_html_block_1',
            'super_header_html_block_2',
            'super_header_html_block_3',
            'super_header_html_block_4',
            'super_header_html_block_5',
            'super_header_html_block_6',
            'header_phone_number',
            'header_html_block_1',
            'header_html_block_2',
            'footer_copyright',
            'structure_home_h1',
            'structure_home_text',
            'comments_text_before_submit',
            'toc_title',
            'breadcrumbs_home_text',
            'contact_form_text_before_submit',
            'one_click_buy_success_message',
            'one_click_buy_name_to',
            'one_click_buy_email_subject',
            'product_badge_new_text',
            'product_badge_hit_text',
            'sale_flash_default',
            'sale_flash_price_format',
        ] );

        foreach ( $to_localize as $key ) {
            if ( ! empty( $value[ $key ] ) ) {
                $value[ $key ] = $this->translate( $this->translate_in_shortcode( $value[ $key ] ) );
            }
        }

        return $value;
    }

    /**
     * @param string $content
     *
     * @return string
     */
    public function translate_in_shortcode( $content ) {
        global $shortcode_tags;

        $stash_shortcode_tags = $shortcode_tags;
        $shortcode_tags       = [ 'translate' ];

        $result = do_shortcode( $content );

        $shortcode_tags = $stash_shortcode_tags;

        return $result;
    }

    /**
     * Try to translate text.
     * <pre>
     * "[ru:]русский текст[en_US:]american text[en:]common eng text"
     * </pre>
     * in this case the function returns string as is if locale not found
     *
     * <pre>
     * "default text[ru:]русский текст[en_US:]american text[en:]common eng text"
     * </pre>
     * will return "default text" if current locale not found
     *
     * @param string      $text
     * @param string|null $locale
     *
     * @return string
     */
    public function translate( $text, $locale = null ) {
        $locale       = $locale ?: get_locale();
        $locale_short = substr( $locale, 0, 2 );

        $matches = [];
        preg_match_all( '/\[([a-z]{2}|[a-z]{2}_[A-Z]{2}):]/us', $text, $matches, PREG_OFFSET_CAPTURE );

        if ( ! empty( $matches[0] ) ) {

            $found_text   = null;
            $default_text = null;

            for ( $i = 0 ; $i < count( $matches[0] ) ; $i ++ ) {
                $match = $matches[0][ $i ];

                if ( 0 == $i && 0 !== $match[1] ) {
                    $default_text = substr( $text, 0, $match[1] );
                }

                if ( $match[0] === "[{$locale}:]" ||
                     $match[0] === "[{$locale_short}:]"
                ) {
                    $start  = $match[1] + strlen( $match[0] );
                    $length = null;
                    if ( isset( $matches[0][ $i + 1 ] ) ) {
                        $length = $matches[0][ $i + 1 ][1] - $start;
                    }
                    $found_text = substr( $text, $start, $length );
                    break;
                }
            }

            if ( null !== $found_text ) {
                return $found_text;
            }

            if ( null !== $default_text ) {
                return $default_text;
            }
        }

        return $text;
    }
}
