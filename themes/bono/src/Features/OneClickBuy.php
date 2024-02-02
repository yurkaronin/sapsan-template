<?php


namespace Wpshop\TheTheme\Features;


use WC_Data_Exception;
use WC_Order;
use WP_Error;
use Wpshop\Core\Core;
use Wpshop\TheTheme\Features\OneClickBuy\Email;
use Wpshop\TheTheme\TemplateRenderer;

class OneClickBuy {

    /**
     * @var Core
     */
    protected $core;

    /**
     * @var TemplateRenderer
     */
    protected $renderer;

    /**
     * @var bool
     */
    protected $button_rendered = false;

    /**
     * @var string|null
     */
    protected $get_checkout_order_received_url;

    /**
     * OneClickBuy constructor.
     *
     * @param Core             $core
     * @param TemplateRenderer $renderer
     */
    public function __construct( Core $core, TemplateRenderer $renderer ) {
        $this->core     = $core;
        $this->renderer = $renderer;
    }

    /**
     * @return void
     */
    public function init() {

        add_action( 'woocommerce_after_add_to_cart_button', [ $this, 'render_button' ] );

        add_action( 'bono_after_single_add_to_cart', [ $this, 'render_button' ] );
        add_action( 'bono_after_single_add_to_cart_ajax', [ $this, 'render_button' ] );

        add_action( 'wp_footer', [ $this, 'render_popup' ] );

        if ( wp_doing_ajax() && $this->enabled() ) {
            $action = 'one_click_buy';
            add_action( "wp_ajax_$action", [ $this, '_ajax' ] );
            add_action( "wp_ajax_nopriv_$action", [ $this, '_ajax' ] );
        }

        add_action( 'bono_one_click_buy:order_created', [ $this, 'on_order_created_default' ], 10, 5 );

        add_action( 'bono_shop_item_buttons', [ $this, '_catalog_one_click_button' ] );

        add_action( 'bono_one_click_buy:handle', [ $this, '_handle' ] );

        add_filter( 'bono_one_click_buy:show_button', [ $this, '_hide_out_of_stock' ] );

        add_action( 'wp_enqueue_scripts', function () {
            if ( trim( $mask = $this->core->get_option( 'one_click_buy_phone_mask' ) ) ) {
                wp_enqueue_script( 'bono-phone-mask', get_template_directory_uri() . '/assets/js/theme/phone-mask.js', [ 'bono-scripts' ], '1.0', true );
                wp_localize_script( 'bono-phone-mask', 'bono_phone_mask_settings', apply_filters( 'bono_phone_mask_settings', [
                    'mask' => $mask,
                ] ) );
            }
        } );

        do_action( __METHOD__, $this );
    }

    /**
     * @param string $type
     *
     * @return void
     * @throws \Exception
     */
    public function _catalog_one_click_button( $type ) {
        if ( ! $this->do_show_button() ) {
            return;
        }
        if ( ! $this->core->get_option( 'one_click_buy_enable_on_catalog' ) ) {
            return;
        }
        if ( 'small' === $type ) {
            return;
        }

        global $product;

        if ( ! $product || ! $product->is_type( apply_filters( 'bono_one_click_buy:catalog_button:supported_types', [
                'external',
                'simple',
                'variation',
            ] ) ) ) {
            return;
        }

        echo $this->renderer->render( 'template-parts/_renderer/one-click-buy-button.php', [
            'button_label' => __( 'Buy One Click', THEME_TEXTDOMAIN ),
            'type'         => $type,
            'product'      => $product,
            'classes'      => 'shop-item__buttons-one-click-buy',
        ], true );
    }

    /**
     * @param bool $show
     *
     * @return false
     */
    public function _hide_out_of_stock( $show ) {
        if ( ! $this->core->get_option( 'one_click_buy_hide_on_not_in_stock' ) ) {
            return $show;
        }

        /** @var $product \WC_Product */
        global $product;
        if ( is_object( $product ) && ! $product->is_in_stock() ) {
            $show = false;
        }

        return $show;
    }


    /**
     * @throws \Exception
     */
    public function render_button() {
        if ( $this->button_rendered ) {
            return;
        }

        if ( ! $this->do_show_button() ) {
            return;
        }

        $this->button_rendered = true;

        global $product;

        echo $this->renderer->render( 'template-parts/_renderer/one-click-buy-button.php', [
            'button_label' => __( 'Buy One Click', THEME_TEXTDOMAIN ),
            'product'      => $product,
            'classes'      => 'bono_buy_one_click',
            'type'         => 'single-product',
        ], true );
    }

    /**
     * @throws \Exception
     */
    public function render_popup() {
        if ( ! $this->do_show_button() ) {
            return;
        }
        echo $this->renderer->render( 'template-parts/_renderer/one-click-buy-popup.php', [], true );
    }

    /**
     * @return bool
     */
    public function do_show_button() {
        return apply_filters( 'bono_one_click_buy:show_button', $this->enabled() );
    }

    /**
     * @return bool
     */
    public function enabled() {
        $result = apply_filters( __METHOD__, is_wc_enabled() && $this->core->get_option( 'one_click_buy_enable' ) );
        $result = apply_filters( 'bono_one_click_buy_enabled', $result );

        return $result;
    }

    /**
     * @return void
     */
    public function _ajax() {
        if ( ! $this->enabled() ) {
            wp_send_json_error( [ 'message' => __( 'Forbidden', THEME_TEXTDOMAIN ) ], 403 );
        }

        if ( empty( $_POST['data'] ) ) {
            wp_send_json_error( [ 'message' => __( 'Unable to handle request with empty data', THEME_TEXTDOMAIN ) ] );
        }

        if ( is_customize_preview() ) {
            wp_send_json_success();
        }

        $data = map_deep( $_POST['data'], 'trim' );

        if ( ! wp_verify_nonce( $data['nonce'], 'wpshop-nonce' ) ) {
            wp_send_json_error( [ 'message' => __( 'Forbidden', THEME_TEXTDOMAIN ) ], 403 );
        }

        if ( apply_filters( 'bono_one_click_buy:do_handle', true, $data ) ) {
            do_action( 'bono_one_click_buy:handle', $data );
        }

        wp_send_json_success( [
            'message'      => $this->core->get_option( 'one_click_buy_success_message' ),
            'redirect_url' => $this->core->get_option( 'one_click_buy_redirect' ) ? $this->get_checkout_order_received_url : null,
        ] );
    }

    /**
     * @param array $request
     *
     * @return void
     */
    public function _handle( $request ) {
        if ( $errors = $this->validate( $request ) ) {
            wp_send_json_error( $errors, 'validation_failed' );
        }

        try {
            do_action( 'bono_one_click_buy:before_handle', $request );

            $product_id = absint( $request['product_id'] );
            $qty        = floatval( $request['qty'] ?? 1 );

            $name    = ! empty( $request['form']['name'] ) ? sanitize_text_field( $request['form']['name'] ) : '';
            $email   = ! empty( $request['form']['email'] ) ? sanitize_text_field( $request['form']['email'] ) : '';
            $phone   = ! empty( $request['form']['phone'] ) ? sanitize_text_field( $request['form']['phone'] ) : '';
            $consent = ! empty( $request['form']['consent'] ) ? (bool) $request['form']['consent'] : false;

            $data = apply_filters( 'bono_one_click_buy:data', [
                'phone' => $phone,
            ] );

            switch ( $this->core->get_option( 'one_click_buy_mode' ) ) {
                case 'send_email':
                    $this->send_email( $product_id, $qty, $email, $name, $data );
                    break;
                case 'create_order':
                    $this->create_order( $product_id, $qty, $name, $email, $phone, $request );
                    break;
                case 'both':
                    $this->send_email( $product_id, $qty, $email, $name, $data );
                    $this->create_order( $product_id, $qty, $name, $email, $phone, $request );
                    break;
                default:
                    break;
            }

            do_action( 'bono_one_click_buy:after_handle', $request );
        } catch ( WC_Data_Exception $e ) {
            wp_send_json_error( new WP_Error( 'failed', $e->getMessage() ) );
        } catch ( \Exception $e ) {
            wp_send_json_error( new WP_Error( 'failed', __( 'Something went wrong while handling one click buy', THEME_TEXTDOMAIN ) ) );
        }
    }

    /**
     * @param array $data
     *
     * @return WP_Error|null
     */
    protected function validate( $data ) {
        $errors = [];

        if ( empty( $data['form']['email'] ) ) {
            $errors['email'] = __( 'Email cannot be empty', THEME_TEXTDOMAIN );
        } elseif ( ! is_email( $data['form']['email'] ) ) {
            $errors['email'] = __( 'Invalid email address', 'woocommerce' );
        }

        if ( empty( $data['form']['name'] ) ) {
            $errors['name'] = __( 'Name cannot be empty', THEME_TEXTDOMAIN );
        }

        $errors = apply_filters( 'bono_one_click_buy:validate', $errors, $data );

        if ( $errors ) {
            $error = new WP_Error( 'validation_failed', __( 'Please fix errors', THEME_TEXTDOMAIN ) );
            foreach ( $errors as $code => $message ) {
                $error->add( $code, $message );
            }

            return $error;
        }

        return null;
    }

    /**
     * @param int    $product_id
     * @param int    $qty
     * @param string $name
     * @param string $email
     * @param string $phone
     * @param array  $data
     *
     * @throws WC_Data_Exception
     */
    protected function create_order( $product_id, $qty, $name, $email, $phone, $data ) {
        $address = apply_filters(
            'bono_order_address_arg',
            [
                'first_name' => $name,
                'email'      => $email,
                'phone'      => $phone,
            ]
        );

        $order = wc_create_order( apply_filters( 'bono_create_order_args', [
            'created_via' => 'bono_one_click_buy',
        ] ) );

        $this->get_checkout_order_received_url = $order->get_checkout_order_received_url();

        $cart = wp_parse_args( $data['cart'] ?? [] );

        do_action( 'bono_one_click_buy:order_created', $order, $product_id, $qty, $address, $cart );
    }

    /**
     * @param WC_Order $order
     * @param int      $product_id
     * @param int      $qty
     * @param array    $address
     * @param array    $cart
     *
     * @return void
     * @throws WC_Data_Exception
     * @see wc_get_order_statuses()
     */
    public function on_order_created_default( WC_Order $order, $product_id, $qty, $address, $cart ) {
        $product = wc_get_product( $product_id );
        if ( ! $product ) {
            return;
        }
        if ( $product->is_type( 'grouped' ) ) {
            $cart = wp_parse_args( $cart, [ 'quantity' => [] ] );
            foreach ( $cart['quantity'] as $item => $item_qty ) {
                if ( $product_item = wc_get_product( $item ) ) {
                    $order->add_product( $product_item, $item_qty );
                }
            }
        } else {
            $order->add_product( $product, $qty );
        }
        $order->set_address( $address, 'billing' );
        $order->set_address( $address, 'shipping' );
        $order->calculate_totals();
        $order->update_status( $this->core->get_option( 'one_click_buy_order_status' ), __( 'One click order', THEME_TEXTDOMAIN ), true );
    }

    /**
     * @param int    $product_id
     * @param int    $qty
     * @param string $from_email
     * @param string $from_name
     * @param array  $data
     *
     * @return bool
     */
    protected function send_email( $product_id, $qty, $from_email, $from_name = '', $data = [] ) {

        WC()->mailer(); // trigger load wc mail class

        $email = new Email();

        $email->from_address = $from_email;
        $email->from_name    = $from_name;
        $email->product      = wc_get_product( $product_id );
        $email->qty          = $qty;
        $email->set_post_data( $data );

        $message = wc_get_template_html( 'emails/one-click-buy.php', [
            'email' => $email,
        ] );

        $mail_to = $this->core->get_option( 'one_click_buy_email_to' );
        $name_to = $this->core->get_option( 'one_click_buy_name_to' );

        return $email->send(
            $name_to ? "$name_to <$mail_to>" : $mail_to,
            $this->core->get_option( 'one_click_buy_email_subject' ),
            $message,
            "Content-Type: text/html\r\n",
            ''
        );
    }
}
