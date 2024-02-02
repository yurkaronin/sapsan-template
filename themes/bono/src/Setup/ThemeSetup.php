<?php

namespace Wpshop\TheTheme\Setup;

use Wpshop\Core\Advertising;
use Wpshop\Core\Breadcrumbs;
use Wpshop\Core\ContactForm;
use Wpshop\Core\Core;
use Wpshop\Core\Customizer\Customizer;
use Wpshop\Core\Fonts;
use Wpshop\Core\Social;
use Wpshop\Core\TableOfContents;
use Wpshop\TheTheme\ThemeOptions;
use Wpshop\TheTheme\Widget\MiniCart;

class ThemeSetup {

    /**
     * @var ThemeOptions
     */
    protected $themeOptions;

    /**
     * @var Core
     */
    protected $core;

    /**
     * @var Customizer
     */
    protected $customizer;

    /**
     * @var Social
     */
    protected $social;

    /**
     * @var Fonts
     */
    protected $fonts;

    /**
     * @var Breadcrumbs
     */
    protected $breadcrumbs;

    /**
     * @var ContactForm
     */
    protected $contactForm;

    /**
     * @var Advertising
     */
    protected $advertising;

    /**
     * ThemeSetup constructor.
     *
     * @param ThemeOptions $themeOptions
     * @param Core         $core
     * @param Customizer   $customizer
     * @param Social       $social
     * @param Fonts        $fonts
     * @param Breadcrumbs  $breadcrumbs
     * @param ContactForm  $contactForm
     * @param Advertising  $advertising
     */
    public function __construct(
        ThemeOptions $themeOptions,
        Core $core,
        Customizer $customizer,
        Social $social,
        Fonts $fonts,
        Breadcrumbs $breadcrumbs,
        ContactForm $contactForm,
        Advertising $advertising
    ) {
        $this->themeOptions = $themeOptions;
        $this->core         = $core;
        $this->customizer   = $customizer;
        $this->social       = $social;
        $this->fonts        = $fonts;
        $this->breadcrumbs  = $breadcrumbs;
        $this->contactForm  = $contactForm;
        $this->advertising  = $advertising;
    }

    /**
     * @return void
     */
    public function init() {
        add_action( 'wp_enqueue_scripts', function () {
            $this->enqueueResources();
        } );

        add_action( 'admin_enqueue_scripts', function () {
            $this->enqueueAdminResources();
        } );

        add_action( 'enqueue_block_editor_assets', function () {
            wp_enqueue_style( 'bono-gutenberg-style', get_template_directory_uri() . '/assets/css/gutenberg.min.css', [ 'wp-edit-blocks' ] );
        } );

        add_action( 'after_setup_theme', function () {
            $this->breadcrumbs->set_home_text( __( 'Home', THEME_TEXTDOMAIN ) );
            $this->setupAdvertising();
            $this->setupContactForm();

            register_nav_menus( [
                'top'          => esc_html__( 'Top menu', THEME_TEXTDOMAIN ),
                'header'       => esc_html__( 'Header menu', THEME_TEXTDOMAIN ),
                'footer'       => esc_html__( 'Footer menu', THEME_TEXTDOMAIN ),
                'super_header' => esc_html__( 'Super Header', THEME_TEXTDOMAIN ),
            ] );

            // Let WordPress manage the document title.
            add_theme_support( 'title-tag' );
            // Switch default core markup to output valid HTML5.
            add_theme_support( 'html5', [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'script',
                'style',
            ] );

            // Add support for responsive embedded content.
            add_theme_support( 'responsive-embeds' );
            // Add support for Block Styles.
            add_theme_support( 'wp-block-styles' );
            // Add support for full and wide align images.
            add_theme_support( 'align-wide' );
            // Add custom editor font sizes.
            add_theme_support(
                'editor-font-sizes',
                [
                    [
                        'name'      => __( 'Small', THEME_TEXTDOMAIN ),
                        'shortName' => __( 'S', THEME_TEXTDOMAIN ),
                        'size'      => 19.5,
                        'slug'      => 'small',
                    ],
                    [
                        'name'      => __( 'Normal', THEME_TEXTDOMAIN ),
                        'shortName' => __( 'M', THEME_TEXTDOMAIN ),
                        'size'      => 22,
                        'slug'      => 'normal',
                    ],
                    [
                        'name'      => __( 'Large', THEME_TEXTDOMAIN ),
                        'shortName' => __( 'L', THEME_TEXTDOMAIN ),
                        'size'      => 36.5,
                        'slug'      => 'large',
                    ],
                    [
                        'name'      => __( 'Huge', THEME_TEXTDOMAIN ),
                        'shortName' => __( 'XL', THEME_TEXTDOMAIN ),
                        'size'      => 49.5,
                        'slug'      => 'huge',
                    ],
                ]
            );

            add_theme_support( 'woocommerce' );

            add_theme_support( 'header-footer-elementor' );
        } );

        // Add additional fields to user profile
        add_filter( 'user_contactmethods', function ( $method ) {
            $user_social_profiles = [
                'facebook'      => __( 'Facebook profile link', THEME_TEXTDOMAIN ),
                'vkontakte'     => __( 'Vkontakte profile link', THEME_TEXTDOMAIN ),
                'twitter'       => __( 'Twitter profile link', THEME_TEXTDOMAIN ),
                'odnoklassniki' => __( 'Odnoklassniki profile link', THEME_TEXTDOMAIN ),
                'telegram'      => __( 'Telegram profile link', THEME_TEXTDOMAIN ),
                'youtube'       => __( 'Youtube profile link', THEME_TEXTDOMAIN ),
                'instagram'     => __( 'Instagram profile link', THEME_TEXTDOMAIN ),
                'tiktok'        => __( 'Tik Tok profile link', THEME_TEXTDOMAIN ),
                'linkedin'      => __( 'Linkedin profile link', THEME_TEXTDOMAIN ),
                'whatsapp'      => __( 'Whatsapp profile link', THEME_TEXTDOMAIN ),
                'viber'         => __( 'Viber profile link', THEME_TEXTDOMAIN ),
                'pinterest'     => __( 'Pinterest profile link', THEME_TEXTDOMAIN ),
                'yandexzen'     => __( 'Yandex Zen profile link', THEME_TEXTDOMAIN ),
                'github'        => __( 'GitHub profile link', THEME_TEXTDOMAIN ),
                'discord'       => __( 'Discord profile link', THEME_TEXTDOMAIN ),
                'rutube'        => __( 'RuTube profile link', THEME_TEXTDOMAIN ),
                'yappy'         => __( 'Yappy profile link', THEME_TEXTDOMAIN ),
                'pikabu'        => __( 'Pikabu profile link', THEME_TEXTDOMAIN ),
                'yandex'        => __( 'Yandex profile link', THEME_TEXTDOMAIN ),
            ];

            $method = array_merge( $method, $user_social_profiles );

            return $method;
        } );

        add_filter( 'wpshop_text_before_submit', function ( $result ) {
            if ( $text_before_submit = $this->core->get_option( 'contact_form_text_before_submit' ) ) {
                return '<div class="contact-form-notes-after">' . $text_before_submit . '</div>';
            }

            return $result;
        } );

        add_action( 'widgets_init', [ $this, '_setup_widgets' ] );

        add_action( 'bono_show_product_images', 'woocommerce_show_product_images' );

        add_filter( 'wp_kses_allowed_html', [ $this, 'wp_kses_allowed_html' ], 10, 2 );

        if ( apply_filters( 'bono/remove_global_styles', false ) ) {
            remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
        }
        if ( apply_filters( 'bono/remove_render_svg_filters', false ) ) {
            remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
        }

        do_action( __METHOD__, $this );
    }

    /**
     * @param array  $allowedtags
     * @param string $context
     *
     * @return array
     */
    public function wp_kses_allowed_html( $allowedtags, $context ) {
        if ( $context === 'pre_term_description' ) {
            $allowedtags['blockquote']['class'] = true;
        }

        return $allowedtags;
    }

    /**
     * @return void
     */
    public function _setup_widgets() {
        $footer_widgets = min( absint( $this->core->get_option( 'footer_widgets' ) ), 5 );
        if ( $footer_widgets ) {
            for ( $n = 1 ; $n <= $footer_widgets ; $n ++ ) {
                register_sidebar( [
                    'name'          => sprintf( __( 'Footer %d', THEME_TEXTDOMAIN ), $n ),
                    'id'            => 'footer-widget-' . $n,
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<div class="widget-header">',
                    'after_title'   => '</div>',
                ] );
            }
        }

        $sidebar_widgets = min( max( 1, absint( $this->core->get_option( 'sidebar_widgets' ) ) ), 5 );
        for ( $n = 1 ; $n <= $sidebar_widgets ; $n ++ ) {
            register_sidebar( [
                'name'          => sprintf( __( 'Sidebar %d', THEME_TEXTDOMAIN ), $n ),
                'id'            => 'sidebar-' . $n,
                'description'   => esc_html__( 'Add widgets here.', THEME_TEXTDOMAIN ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<div class="widget-header">',
                'after_title'   => '</div>',
            ] );
        }
        register_sidebar( [
            'name'          => __( 'Mobile filters', THEME_TEXTDOMAIN ),
            'id'            => 'mobile-filters',
            'description'   => esc_html__( 'Add widgets here.', THEME_TEXTDOMAIN ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-header">',
            'after_title'   => '</div>',
        ] );

        register_widget( MiniCart::class );
        register_widget( \Wpshop\TheTheme\Widget\TableOfContents::class );
    }

    /**
     * @return void
     */
    protected function enqueueResources() {
        global $wp_version;
        if ( $this->core->get_option( 'move_jquery_in_footer' ) ) {
            $suffix = wp_scripts_get_suffix();

            wp_deregister_script( 'jquery' );
            // @see wp-includes/script-loader.php:1124
            wp_register_script( 'jquery', false, [ 'jquery-core', 'jquery-migrate' ], '', true );
            wp_register_script( 'jquery-core', includes_url( '/js/jquery/jquery.js' ), [], '', true );
            wp_register_script( 'jquery-migrate', includes_url( "/js/jquery/jquery-migrate$suffix.js" ), [], '', true );

            wp_enqueue_script( 'jquery' );
        }

        $style_version  = apply_filters( 'bono_style_version', THEME_ORIG_VERSION );
        $scrips_version = apply_filters( 'bono_scrips_version', THEME_ORIG_VERSION );

        $fonts_options = [
            'typography_body',
            'typography_site_title',
            'typography_site_description',
            'typography_menu_links',
            'typography_header_h1',
            'typography_header_h2',
            'typography_header_h3',
            'typography_header_h4',
            'typography_header_h5',
            'typography_header_h6',
        ];

        $fonts_list = [];
        foreach ( $fonts_options as $option ) {
            $option        = $this->core->get_option( $option );
            $option_decode = json_decode( $option, true );
            if ( ! empty( $option_decode['font-family'] ) ) {
                $fonts_list[] = $option_decode['font-family'];
            } else {
                // back compat, when option is font family
                $fonts_list[] = $option;
            }
        }
        $google_fonts = $this->fonts->get_enqueue_link( $fonts_list );

        if ( ! empty( $google_fonts ) ) {
            wp_enqueue_style( 'google-fonts', $google_fonts, false );
        }

        wp_enqueue_style( 'bono-style', get_template_directory_uri() . '/assets/css/style.min.css', [], $style_version );
        wp_style_add_data( 'bono-style', 'rtl', 'replace' );

        wp_enqueue_script( 'bono-scripts', get_template_directory_uri() . '/assets/js/all.min.js', [ 'jquery' ], $scrips_version, true );
        wp_localize_script( 'bono-scripts', 'bono_settings_array', apply_filters( 'bono_scripts_settings_array', [
                'rating_text_average'      => __( 'average', THEME_TEXTDOMAIN ),
                'rating_text_from'         => __( 'from', THEME_TEXTDOMAIN ),
                'lightbox_display'         => $this->core->get_option( 'lightbox_display' ),
                'sidebar_fixed'            => $this->core->get_option( 'sidebar_fixed' ),
                'compare_limit'            => $this->core->get_option( 'compare_products_limit' ),
                'is_mobile'                => wp_is_mobile(),
                'disable_ajax_add_to_cart' => $this->core->get_option( 'disable_ajax_add_to_cart' ),
                'show_mobile_minicart'     => apply_filters( 'show_mobile_minicart', true ),

                'open_current_category' => apply_filters( 'bono_open_current_category', true ),
                'show_mobile_search'    => $this->core->get_option( 'show_mobile_search' ),

                'show_floating_cart' => (bool) apply_filters( 'bono_show_floating_cart', false ),
            ] )
        );

        wp_localize_script( 'bono-scripts', 'global_i18n', [
                'compare_to_many' => __( 'Too many products to add to compare', THEME_TEXTDOMAIN ),
                'must_consent'    => __( 'You have to consent to the processing of personal data', THEME_TEXTDOMAIN ),
            ]
        );

        // ajax
        wp_localize_script( 'bono-scripts', 'wpshop_ajax', [
            'url'           => admin_url( 'admin-ajax.php' ),
            'nonce'         => wp_create_nonce( 'wpshop-nonce' ),
            'is_wc_enabled' => is_wc_enabled(),
        ] );

        // comment reply script
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        $this->init_toc();;
    }

    /**
     * @return void
     */
    protected function init_toc() {
        if ( $this->core->get_option( 'toc_display' ) || $this->core->get_option( 'toc_display_pages' ) ) {
            theme_container()->get( TableOfContents::class )->init();
            if ( ! $this->core->get_option( 'toc_display' ) ) {
                add_filter( 'wpshop_toc_in_single', '__return_false' );
            }
            if ( $this->core->get_option( 'toc_display_pages' ) ) {
                add_filter( 'wpshop_toc_in_page', '__return_true' );
            }
        }
        if ( ! $this->core->get_option( 'toc_open' ) ) {
            add_filter( 'wpshop_toc_open', '__return_false' );
        }
        if ( $this->core->get_option( 'toc_place' ) ) {
            add_filter( 'wpshop_toc_place', '__return_false' );
        }

        add_filter( 'wpshop_toc_header', function ( $default ) {
            if ( $title = trim( $this->core->get_option( 'toc_title' ) ) ) {
                return $title;
            }

            return $default;
        } );
    }

    /**
     * @return void
     */
    protected function enqueueAdminResources() {
        wp_enqueue_style( THEME_SLUG . '-admin-style', get_template_directory_uri() . '/assets/css/admin.min.css', [], null );
        wp_enqueue_script( THEME_SLUG . '-admin-scripts', get_template_directory_uri() . '/assets/js/theme/admin.js', [ 'jquery' ], null, true );
        wp_localize_script( THEME_SLUG . '-admin-scripts', 'wps_admin_globals', [
            'assets' => get_template_directory_uri() . '/assets',
        ] );
    }

    /**
     * @return void
     */
    protected function setupAdvertising() {
        $advertising_positions = apply_filters( THEME_SLUG . '_advertising_positions', [
            'before_site_content' => [
                'title' => __( 'After the header and top menu (for the entire width of the site)', THEME_TEXTDOMAIN ),
                'type'  => 'regular',
            ],
            'before_content'      => [
                'type' => 'before_content',
            ],
            'middle_content'      => [
                'type' => 'middle_content',
            ],
            'after_content'       => [
                'type' => 'after_content',
            ],
            'after_p_1'           => [
                'type' => 'after_p',
            ],
            'after_p_2'           => [
                'type' => 'after_p',
            ],
            'after_p_3'           => [
                'type' => 'after_p',
            ],
            'after_p_4'           => [
                'type' => 'after_p',
            ],
            'after_p_5'           => [
                'type' => 'after_p',
            ],
            'before_related'      => [
                'title' => __( 'Before related posts', THEME_TEXTDOMAIN ),
                'type'  => 'single',
            ],
            'after_related'       => [
                'title' => __( 'After related posts', THEME_TEXTDOMAIN ),
                'type'  => 'single',
            ],
            'after_site_content'  => [
                'title' => __( 'Before the bottom menu and footer (for the entire width of the site)', THEME_TEXTDOMAIN ),
                'type'  => 'regular',
            ],
        ] );
        $this->advertising->set_positions( $advertising_positions );
        $this->advertising->init();
    }

    /**
     * @return void
     */
    protected function setupContactForm() {
        $fields = [
            [
                'name'        => 'contact-name',
                'placeholder' => __( 'Your name', THEME_TEXTDOMAIN ),
                'required'    => 'required',
            ],
            [
                'name'        => 'contact-email',
                'type'        => 'email',
                'placeholder' => __( 'Your e-mail', THEME_TEXTDOMAIN ),
                'required'    => 'required',
            ],
            [
                'name'        => 'contact-subject',
                'placeholder' => __( 'Your subject', THEME_TEXTDOMAIN ),
            ],
            [
                'tag'         => 'textarea',
                'name'        => 'contact-message',
                'placeholder' => __( 'Message', THEME_TEXTDOMAIN ),
                'required'    => 'required',
            ],
        ];
        $fields = apply_filters( 'bono_contact_form_fields', $fields );
        $this->contactForm->create_fields( $fields );
    }
}
