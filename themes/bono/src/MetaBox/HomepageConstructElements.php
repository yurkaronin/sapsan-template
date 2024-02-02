<?php

namespace Wpshop\TheTheme\MetaBox;

use WP_Post;
use Wpshop\Core\MetaBox;

class HomepageConstructElements extends MetaBox {

    /**
     * Constructor
     */
    public function __construct() {
        $this->set_settings( [
            'prefix'         => 'homepage_construct_page_',
            'post_type'      => 'page',
            'meta_box_title' => _x( 'Show Content', 'Homepage Construct Elements', THEME_TEXTDOMAIN ),
            'context'        => 'side',
        ] );
        parent::__construct();
    }

    /**
     * @param string      $element
     * @param int|WP_Post $post
     *
     * @return bool
     */
    public function do_show( $element = '', $post = 0 ) {
        $post = get_post( $post );

        if ( empty( $post->ID ) ) {
            return false;
        }

        $elements = (array) get_post_meta( $post->ID, 'homepage_construct_elements', true );

        return in_array( $element, $elements );
    }

    /**
     * @param int|WP_Post $post
     *
     * @return string|null
     */
    public function get_position( $post ) {
        $post = get_post( $post );

        if ( empty( $post->ID ) ) {
            return null;
        }

        return get_post_meta( $post->ID, 'homepage_construct_elements_pos', true );
    }

    /**
     * @return void
     */
    public function render_fields() {
        $this->field_checkboxes( 'homepage_construct_elements', '', [
            'header'  => _x( 'Header', 'Homepage Construct Elements', THEME_TEXTDOMAIN ),
            'content' => _x( 'Content', 'Homepage Construct Elements', THEME_TEXTDOMAIN ),
        ] );
        $this->custom_field_select( 'homepage_construct_elements_pos', '', [
            'top'    => __( 'Top', THEME_TEXTDOMAIN ),
            'bottom' => __( 'Bottom', THEME_TEXTDOMAIN ),
        ] );
    }

    /**
     * @return void
     */
    public function init_metabox() {
        add_action( 'add_meta_boxes', [ $this, '_add_metabox' ], 10, 2 );
        add_action( 'save_post', [ $this, '_save_metabox' ], 11, 2 );
        add_action( 'admin_enqueue_scripts', [ $this, 'load_scripts_styles' ] );
        add_action( 'admin_footer', [ $this, 'color_field_js' ] );
    }

    /**
     * @param string  $post_type
     * @param WP_Post $post
     *
     * @return void
     */
    public function _add_metabox( $post_type, $post ) {
        if ( bono_is_home_construct_page( $post ) ) {
            $this->add_metabox();
        }
    }

    /**
     * @param int     $post_id
     * @param WP_Post $post
     *
     * @return void
     */
    public function _save_metabox( $post_id, $post ) {
        if ( bono_is_home_construct_page( $post ) ) {
            $this->save_metabox( $post_id, $post );
        }
    }

    /**
     * @param string $name
     * @param string $label
     * @param array  $options
     * @param string $description
     *
     * @return void
     */
    protected function custom_field_select( $name = '', $label = '', $options = [], $description = '' ) {
        $this->add_to_save( $name, 'select' );

        $value = get_post_meta( $this->pid, $name, true );
        if ( empty( $value ) ) {
            $value = '';
        }

        echo '	<tr>';
        echo '		<td>';
        echo '			<select id="' . $name . '" name="' . $name . '" class="' . $name . '_field">';

        foreach ( $options as $key => $option ) {
            echo '			<option value="' . $key . '" ' . selected( $value, $key, false ) . '> ' . $option . '</option>';
        }

        echo '			</select>';
        echo '          <p class="description">' . $description . '</p>';
        echo '		</td>';
        echo '	</tr>';
    }
}
