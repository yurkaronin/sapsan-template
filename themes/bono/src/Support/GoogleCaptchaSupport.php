<?php

namespace Wpshop\TheTheme\Support;

use WP_Error;
use Wpshop\Core\Core;

class GoogleCaptchaSupport {

    use CheckPluginTrait;

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
        if ( ! $this->is_plugin_enabled( 'google-captcha/google-captcha.php' ) ) {
            return;
        }

        add_filter( 'bono_customizer_controls', [ $this, '_add_customize_controls' ] );
        add_filter( 'bono_options_defaults', [ $this, '_add_options_defaults' ] );
        add_filter( 'bono_contact_form_fields', [ $this, '_add_contact_form_field' ] );
        add_filter( 'wpshop_contact_form_errors', [ $this, '_validate_contact_form' ] );
        add_filter( 'bono_one_click_buy:filters', [ $this, '_add_one_click_by_field' ], 20 );
        add_filter( 'bono_one_click_buy:validate', [ $this, '_validate_one_click_by' ] );
    }

    /**
     * @param array $items
     *
     * @return array
     */
    public function _add_customize_controls( $items ) {
        $items['modules']['sections']['contact_form']['controls']['cf_enable_google_captcha']   = [
            'label' => __( 'Enable google captcha', THEME_TEXTDOMAIN ),
            'type'  => 'checkbox',
        ];
        $items['modules']['sections']['one_click_buy']['controls']['onb_enable_google_captcha'] = [
            'label' => __( 'Enable google captcha', THEME_TEXTDOMAIN ),
            'type'  => 'checkbox',
        ];

        return $items;
    }

    /**
     * @param array $defaults
     *
     * @return array
     */
    public function _add_options_defaults( $defaults ) {
        $defaults['cf_enable_google_captcha']  = false;
        $defaults['onb_enable_google_captcha'] = false;

        return $defaults;
    }

    /**
     * @param array $fields
     *
     * @return array
     */
    public function _add_contact_form_field( $fields ) {
        if ( ! $this->core->get_option( 'cf_enable_google_captcha' ) ) {
            return $fields;
        }

        $fields[] = [
            'name'            => 'google_captcha',
            'render_callback' => function () {
                return do_shortcode( '[bws_google_captcha]' );
            },
        ];

        return $fields;
    }

    /**
     * @param array $errors
     *
     * @return array
     */
    public function _validate_contact_form( $errors ) {
        if ( ! $this->core->get_option( 'cf_enable_google_captcha' ) ) {
            return $errors;
        }

        $check = wp_parse_args( gglcptch_check(), [
            'response' => false,
            'reason'   => '',
            'errors'   => null,
        ] );

        if ( ! $check['response'] ) {
            if ( 'ERROR_NO_KEYS' == $check['reason'] ) {
                $errors[] = __( 'It is unable to send a message until the administrator has configured recaptcha', THEME_TEXTDOMAIN );
            } elseif ( $check['errors'] instanceof WP_Error ) {
                foreach ( $check['errors']->get_error_messages() as $error_message ) {
                    $errors[] = $error_message;
                }
            }
        }

        return $errors;
    }

    /**
     * @param array $fields
     *
     * @return array
     */
    public function _add_one_click_by_field( $fields ) {
        if ( ! $this->core->get_option( 'onb_enable_google_captcha' ) ) {
            return $fields;
        }

        $fields[] = [
            'render_callback' => function () {
                echo do_shortcode( '[bws_google_captcha]' );
            },
        ];

        return $fields;
    }

    /**
     * @param array $errors
     *
     * @return array
     */
    public function _validate_one_click_by( $errors ) {
        if ( ! $this->core->get_option( 'onb_enable_google_captcha' ) ) {
            return $errors;
        }

        $check = wp_parse_args( gglcptch_check(), [
            'response' => false,
            'reason'   => '',
            'errors'   => null,
        ] );

        if ( ! $check['response'] ) {
            if ( 'ERROR_NO_KEYS' == $check['reason'] ) {
                $errors['failed'] = __( 'It is unable to send a message until the administrator has configured recaptcha', THEME_TEXTDOMAIN );
            } elseif ( $check['errors'] instanceof WP_Error ) {
                foreach ( $check['errors']->get_error_messages() as $error_message ) {
                    $errors['failed'] = $error_message;
                }
            }
        }

        return $errors;
    }
}
