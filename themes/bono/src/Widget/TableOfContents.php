<?php

namespace Wpshop\TheTheme\Widget;

use WP_Post;
use WP_Post_Type;
use WP_Widget;

class TableOfContents extends WP_Widget {

    /**
     * @inheritDoc
     */
    public function __construct() {
        parent::__construct(
            'wpshop_table_of_contents',
            __( 'Table Of Contents', THEME_TEXTDOMAIN ),
            [
                'description' => __( 'Widget for Table of Contents', THEME_TEXTDOMAIN ),
            ]
        );
    }

    /**
     * @inheritDoc
     *
     * @param array $args
     * @param array $instance
     *
     * @return void
     */
    public function widget( $args, $instance ) {
        $obj = get_queried_object();
        if ( ! $obj instanceof WP_Post ) {
            return;
        }

        $post_types = isset( $instance['post_types'] )
            ? $instance['post_types']
            : [
                'post' => 'on',
                'page' => 'on',
            ];

        $actual_types = $this->get_post_types( 'names' );
        $post_types   = array_filter( $post_types, function ( $key ) use ( $actual_types ) {
            return in_array( $key, $actual_types );
        }, ARRAY_FILTER_USE_KEY );

        if ( ! array_key_exists( $obj->post_type, $post_types ) ) {
            return;
        }

        echo $args['before_widget'];

        add_filter( 'wpshop_toc_header', $header_filter = function ( $default ) use ( $instance ) {
            return ! empty( $instance['title'] ) ? $instance['title'] : $default;
        }, 11 );

        echo theme_container()->get( \Wpshop\Core\TableOfContents::class )->get_toc_for_widget( $obj->post_content );

        remove_filter( 'wpshop_toc_header', $header_filter, 11 );

        echo $args['after_widget'];
    }

    /**
     * @inheritDoc
     *
     * @param array $instance
     *
     * @return void
     */
    public function form( $instance ) {
        $title = isset( $instance['title'] ) ? $instance['title'] : '';

        $post_types = isset( $instance['post_types'] )
            ? $instance['post_types']
            : [
                'post' => 'on',
                'page' => 'on',
            ];
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"/>
        </p>
        <label><?php echo esc_html__( 'Output in Post Types:', THEME_TEXTDOMAIN ) ?></label>
        <?php foreach ( $this->get_post_types() as $post_type ): ?>
            <div>
                <label>
                    <input type="checkbox" name="<?php echo $this->get_field_name( "post_types[{$post_type->name}]" ) ?>"<?php checked( true, array_key_exists( $post_type->name, $post_types ) ) ?>>
                    <?php echo esc_html( $post_type->label ) ?>
                </label>
            </div>
        <?php endforeach;
    }

    /**
     * @inheritDoc
     *
     * @param array $new_instance
     * @param array $old_instance
     *
     * @return array
     */
    public function update( $new_instance, $old_instance ) {
        $instance = [];

        $actual_types = $this->get_post_types( 'names' );
        $types        = isset( $new_instance['post_types'] ) ? $new_instance['post_types'] : [];

        $instance['post_types'] = array_filter( $types, function ( $key ) use ( $actual_types ) {
            return in_array( $key, $actual_types );
        }, ARRAY_FILTER_USE_KEY );

        $instance['title'] = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }

    /**
     * @param string $output 'names' or 'objects'
     *
     * @return string[]|WP_Post_Type[]
     */
    protected function get_post_types( $output = 'objects' ) {
        $exclude_types = [
            'attachment',
        ];

        $post_types = get_post_types( [
            'public' => true,
        ], 'objects' );
        $post_types = array_filter( $post_types, function ( $item ) use ( $exclude_types ) {
            return ! in_array( $item->name, $exclude_types );
        } );

        if ( 'names' === $output ) {
            return array_map( function ( $item ) {
                return $item->name;
            }, $post_types );
        }

        return $post_types;
    }
}
