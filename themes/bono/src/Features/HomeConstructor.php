<?php

namespace Wpshop\TheTheme\Features;

use Wpshop\Core\Core;

class HomeConstructor {

    const SECTION_TYPE_POSTS      = 'posts';
    const SECTION_TYPE_PRODUCTS   = 'products';
    const SECTION_TYPE_CATEGORIES = 'categories';
    const SECTION_TYPE_HTML       = 'html';
    const SECTION_TYPE_SLIDER     = 'slider';

    const HTML_WIDGET_ID          = 'homepage-construct-html';
    const HTML_WIDGET_PLACEHOLDER = '{{homepage_construct_widget}}';

    /**
     * @var Core
     */
    protected $core;

    /**
     * @var array|null
     */
    protected $_sections;

    /**
     * @var bool
     */
    protected $_prepared = false;

    /**
     * HomeConstructor constructor.
     *
     * @param Core $core
     */
    public function __construct( Core $core ) {
        $this->core = $core;
    }

    /**
     * @return void
     */
    public function init() {
        register_sidebar( [
            'id'            => self::HTML_WIDGET_ID,
            'name'          => esc_html__( 'Home Page Constructor Widget', THEME_TEXTDOMAIN ),
            'description'   => sprintf(
                esc_html__( 'to output this widget area place %s in homepage constructor HTML block', THEME_TEXTDOMAIN ),
                self::HTML_WIDGET_PLACEHOLDER
            ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-header">',
            'after_title'   => '</div>',
        ] );

        $this->setup_default_hooks();

        add_filter( 'bono_homepage_constructor:categories_section_header_text', [ $this, 'translate' ] );
        add_filter( 'bono_homepage_constructor:categories_section_description', [ $this, 'translate' ] );
        add_filter( 'bono_homepage_constructor:html_section_header_text', [ $this, 'translate' ] );
        add_filter( 'bono_homepage_constructor:posts_section_header_text', [ $this, 'translate' ] );
        add_filter( 'bono_homepage_constructor:posts_section_description', [ $this, 'translate' ] );
        add_filter( 'bono_homepage_constructor:products_section_header_text', [ $this, 'translate' ] );
        add_filter( 'bono_category_slide_item_title', [ $this, 'translate' ] );
        add_filter( 'bono_category_slide_item_description', [ $this, 'translate' ] );
        add_filter( 'bono_category_slide_item_button_text', [ $this, 'translate' ] );

        add_filter( 'bono_homepage_constructor:slide_title', [ $this, 'translate' ] );
        add_filter( 'bono_homepage_constructor:slide_button_text', [ $this, 'translate' ] );
        add_filter( 'bono_homepage_constructor:slide_excerpt', [ $this, 'translate' ] );

        do_action( __METHOD__, $this );
    }

    /**
     * @return void
     */
    public function prepare() {
        if ( $this->_prepared ) {
            return;
        }

        $this->_prepared = true;

        $default_slider_size = '1920:400';

        $to_init = [];

        foreach ( $this->get_sections( 'slider' ) as $sect_options ) {
            if ( ! empty( $sect_options['adaptive_scale'] ) ) {
                $slider_size = isset( $sect_options['base_slide_size'] ) ? $sect_options['base_slide_size'] : $default_slider_size;
                if ( false === strpos( $slider_size, ':' ) ) {
                    $slider_size = $default_slider_size;
                }
                list( $width, $height ) = array_map( 'absint', explode( ':', $slider_size ) );

                if ( ! $width ) {
                    break;
                }

                $to_init[] = [ 'uid' => $sect_options['_id'], 'width' => $width, 'height' => $height ];
            }
        }

        if ( $to_init ) {
            $to_init_json = json_encode( $to_init );
            add_action( 'wp_enqueue_scripts', function () use ( $width, $height, $to_init_json ) {
                wp_add_inline_script( THEME_SLUG . '-scripts', <<<"JS"
jQuery(function ($){
    var items = {$to_init_json};
    var scale_slider = function () {
        for (var i = 0; i < items.length; i++) {
            var uid = items[i].uid, baseWidth = items[i].width, baseHeight = items[i].height;
            var \$container = $('.card-slider-container[data-uid="' + uid +'"]');
            var width = \$container.width();
            var height = parseInt(width * baseHeight / baseWidth);
            if (height) {
                \$container.find('.card-slider--type-media .card-slider__image').css({'min-height': height + 'px'});
                \$container.find('.card-slider--type-post .card-slider__image').css({'min-height': height + 'px'});
            }

            document.dispatchEvent(new CustomEvent('bono_slider_scale', {detail:{uid, width, height}}));
        }
    };

    scale_slider();

    $(window).on('resize', scale_slider);
});
JS
                );
            } );
        }
    }

    /**
     * @param string $title
     *
     * @return string
     */
    public function translate( $title ) {
        return __( $title, THEME_TEXTDOMAIN );
    }

    /**
     * @return void
     */
    protected function setup_default_hooks() {
        add_filter( 'bono_output_homepage_constructor_section', function ( $result, $section ) {
            if ( $section['section_type'] === self::SECTION_TYPE_SLIDER &&
                 ! empty( $section['disable_on_mobile'] ) &&
                 wp_is_mobile()
            ) {
                $result = false;
            }

            return $result;
        }, 10, 2 );

        add_filter( 'bono_home_page_constructor_section', function ( $section ) {
            if ( $section['section_type'] === self::SECTION_TYPE_HTML &&
                 false !== mb_strpos( $section['html_code'], self::HTML_WIDGET_PLACEHOLDER, 0, 'UTF-8' )
            ) {
                ob_start();
                ob_implicit_flush( false );
                get_template_part( 'template-parts/sections/html-widget' );
                $widget = ob_get_clean();

                $section['html_code'] = str_replace( self::HTML_WIDGET_PLACEHOLDER, $widget, $section['html_code'] );
            }

            return $section;
        } );

        add_filter( 'bono_homepage_constructor:section_category:list', [ $this, 'filter_category_list' ], 10, 2 );

        add_action( 'init', function () {
            $this->prepare();
            if ( $this->do_output_constructor() ) {
//                remove_action( 'wp_head', 'rel_canonical' );
                add_filter( 'get_canonical_url', function () {
                    return get_home_url();
                } );
            }
        } );
    }

    /**
     * @param string|array|null $specific section_type one of <pre>HomeConstructor::SECTION_TYPE_*</pre>
     * @param bool              $revert   revert specific filter
     *
     * @return array
     */
    public function get_sections( $specific = null, $revert = false ) {
        $sections = $this->get_all_sections();
        if ( $specific ) {
            return array_filter( $sections, function ( $item ) use ( $specific, $revert ) {
                $result = is_array( $specific )
                    ? in_array( $item['section_type'], $specific, true )
                    : $item['section_type'] === $specific;

                return $revert ? ! $result : $result;
            } );
        }

        return $sections;
    }

    /**
     * @return bool
     */
    public function do_output_constructor() {
        return apply_filters(
            'bono_do_output_constructor',
            ( is_front_page() || is_home() ) && ! $this->is_blog_page() && $this->has_sections()
        );
    }

    /**
     * @return void
     */
    public function output() {
        do_action( 'bono_before_output_homepage_constructor' );

        foreach ( $this->get_sections() as $n => $section ) {
            if ( ! apply_filters( 'bono_output_homepage_constructor_section', true, $section ) ) {
                continue;
            }

            $section['n'] = $n;

            $section = apply_filters( 'bono_home_page_constructor_section', $section );

            do_action( 'bono_before_output_homepage_constructor_section', $section );

            $section_type = ( ! empty( $section['section_type'] ) ) ? $section['section_type'] : 'posts';
            set_query_var( 'section_options', $section );
            get_template_part( 'template-parts/sections/' . $section_type );

            do_action( 'bono_after_output_homepage_constructor_section', $section );
        }

        do_action( 'bono_after_output_homepage_constructor' );
    }

    /**
     * @return bool
     */
    public function is_blog_page() {
        return bono_is_blog_page();
    }

    /**
     * @return bool
     */
    public function has_sections() {
        return boolval( count( $this->get_all_sections() ) );
    }

    /**
     * @return array
     */
    protected function get_all_sections() {
//        if ( null === $this->_sections ) {
        if ( $data = $this->core->get_option( 'home_constructor' ) ) {
            $this->_sections = json_decode( $data, true );
        } else {
            $this->_sections = [];
        }

        $this->_sections = array_map( function ( $item ) {
            $item['_id'] = md5( serialize( $item ) );

            return $item;
        }, (array) $this->_sections );

//        }

        return $this->_sections;
    }

    /**
     * @param $ids
     *
     * @return \WP_Term[]
     * @todo move to dedicated class
     */
    public function get_categories( array $ids = [] ) {
        $args = apply_filters( 'bono_section_category_query_args', [
            'taxonomy'     => 'product_cat',
            'hide_empty'   => 0,
            'hierarchical' => 0,
            'orderby'      => 'include',
            'include'      => $ids,
        ] );

        $args = apply_filters( 'bono_homepage_constructor:section_category:args', $args );

        return (array) apply_filters( 'bono_homepage_constructor:section_category:list', null, $args );
    }

    /**
     * @param array|null $items
     * @param array      $args
     *
     * @return \WP_Term[]
     */
    public function filter_category_list( array $items = null, array $args = [] ) {
        return null === $items ? get_categories( $args ) : $items;
    }
}
