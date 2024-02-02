<?php

namespace Wpshop\TheTheme\Features;

use Wpshop\Core\Core;
use Wpshop\Core\Customizer\CustomizerCSS;

class FloatingCart {

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
        if ( ! is_wc_enabled() ) {
            return;
        }
        add_filter( 'bono_show_floating_cart', [ $this, '_show_cart' ] );
        add_action( 'bono_customizer_styles', [ $this, '_add_styles' ] );
        add_filter( 'bono_options_defaults', [ $this, '_default_options' ] );
        add_filter( 'bono_customizer_controls', [ $this, '_customizer_controls' ] );
        add_filter( 'bono_scripts_settings_array', [ $this, '_add_script_settings' ] );
    }

    /**
     * @return bool
     */
    public function _show_cart() {
        if ( ! $this->core->get_option( 'floating_cart_enabled' ) ) {
            return false;
        }
        $result = true;
        if ( is_cart() || is_checkout() ) {
            $result = false;
        }

        return $result;
    }

    /**
     * @param CustomizerCSS $customizer
     *
     * @return void
     */
    public function _add_styles( $customizer ) {
        $customizer->add( '.site-header-cart__floating', [
            [ 'right:%dpx', 'floating_cart_right' ],
            [ 'top:calc(100%% - %dpx)', 'floating_cart_bottom' ],
            [ 'padding:%dpx', 'floating_cart_padding' ],
            [ 'border-radius:%dpx', 'floating_cart_border_radius' ],
            [ 'background:%s', 'floating_cart_color' ],
        ] );
        $customizer->add(
            '.header-cart__link:hover',
            [ 'background:%s', 'floating_cart_color' ]
        );
        $customizer->add(
            '.header-cart__link:hover .header-cart__link-ico:after,
            .header-cart__link:active .header-cart__link-ico:after,
            .header-cart__link:focus .header-cart__link-ico:after',
            [ 'color:%s', 'floating_cart_ico_hover_color' ]
        );
    }

    /**
     * @param array $options
     *
     * @return array
     */
    public function _default_options( $options ) {
        $options['floating_cart_enabled']         = false;
        $options['floating_cart_mobile_enabled']  = false;
        $options['floating_cart_right']           = '15';
        $options['floating_cart_bottom']          = '50';
        $options['floating_cart_padding']         = '5';
        $options['floating_cart_border_radius']   = '5';
        $options['floating_cart_color']           = '#ffffff';
        $options['floating_cart_ico_hover_color'] = '#f43c33';

        return $options;
    }

    /**
     * @param array $controls
     *
     * @return array
     */
    public function _customizer_controls( $controls ) {
        $controls['modules']['sections']['floating_cart'] = [
            'title'    => _x( 'Floating Mini Cart', 'Customizer', THEME_TEXTDOMAIN ),
            'controls' => [
                'floating_cart_enabled'         => [
                    'label' => _x( 'Enabled', 'Customizer', THEME_TEXTDOMAIN ),
                    'type'  => 'checkbox',
                ],
                'floating_cart_mobile_enabled'  => [
                    'label'           => __( 'Enable on mobile', THEME_TEXTDOMAIN ),
                    'type'            => 'checkbox',
                    'active_callback' => function () {
                        return $this->core->get_option( 'floating_cart_enabled' );
                    },
                ],
                'floating_cart_right'           => [
                    'label'       => _x( 'Position Right', 'Customizer', THEME_TEXTDOMAIN ),
                    'type'        => 'range',
                    'sanitize'    => 'integer',
                    'input_attrs' => [ 'min' => 0, 'max' => 200, 'step' => 1 ],
                ],
                'floating_cart_bottom'          => [
                    'label'       => _x( 'Position Bottom', 'Customizer', THEME_TEXTDOMAIN ),
                    'type'        => 'range',
                    'sanitize'    => 'integer',
                    'input_attrs' => [ 'min' => 0, 'max' => 200, 'step' => 1 ],
                ],
                'floating_cart_padding'         => [
                    'label'       => _x( 'Padding', 'Customizer', THEME_TEXTDOMAIN ),
                    'type'        => 'range',
                    'sanitize'    => 'integer',
                    'input_attrs' => [ 'min' => 0, 'max' => 50, 'step' => 1 ],
                ],
                'floating_cart_border_radius'   => [
                    'label'       => _x( 'Border Radius', 'Customizer', THEME_TEXTDOMAIN ),
                    'type'        => 'range',
                    'sanitize'    => 'integer',
                    'input_attrs' => [ 'min' => 0, 'max' => 50, 'step' => 1 ],
                ],
                'floating_cart_color'           => [
                    'label' => _x( 'Background Color', 'Customizer', THEME_TEXTDOMAIN ),
                    'type'  => 'color',
                ],
                'floating_cart_ico_hover_color' => [
                    'label' => _x( 'Icon Hover Color', 'Customizer', THEME_TEXTDOMAIN ),
                    'type'  => 'color',
                ],
            ],
        ];

        return $controls;
    }

    /**
     * @param array $settings
     *
     * @return array
     */
    public function _add_script_settings( $settings ) {
        $settings['show_mobile_floating_cart'] = $this->core->get_option( 'floating_cart_mobile_enabled' );

        return $settings;
    }
}
