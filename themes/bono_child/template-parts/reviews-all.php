<?php
/**
 * Template name: Страница отзывов
 */

use Wpshop\Core\Core;
use Wpshop\TheTheme\Features\Favorite;
use Wpshop\TheTheme\HomeConstructor;

$core             = theme_container()->get( Core::class );
$favorite         = theme_container()->get( Favorite::class );

get_header();

if ( $home_constructor->do_output_constructor() ) {
    ?>
<div id="primary" class="content-area">
  <main id="main" class="site-main">

    <?php
            if ( 'top' == $core->get_option( 'structure_home_position' ) ) {
                get_template_part( 'template-parts/content', 'home' );
            }

            if ( $home_constructor->do_output_constructor() ) {
                $home_constructor->output();
            } else {

                if ( have_posts() ) {

                    if ( is_home() && ! is_front_page() ) {
                        echo '<h1 class="page-title screen-reader-text">' . single_post_title( '', false ) . '</h1>';
                    }

                    get_template_part( 'template-parts/post-container/' . $core->get_option( 'structure_home_posts' ) );

                    the_posts_pagination();

                } else {
                    get_template_part( 'template-parts/content', 'none' );
                }
            }

            if ( 'bottom' == $core->get_option( 'structure_home_position' ) ) {
                get_template_part( 'template-parts/content', 'home' );
            }

            ?>

  </main><!-- .site-main -->
</div><!-- .content-area -->
<?php if ( in_array( $core->get_option( 'structure_home_sidebar' ), [ 'left', 'right' ] ) ) {
        get_sidebar();
    }
} else {
    $structure_page_hide = $core->get_option( 'structure_page_hide' );
    if ( ! empty( $structure_page_hide ) ) {
        $structure_page_hide = explode( ',', $structure_page_hide );
        if ( is_array( $structure_page_hide ) ) {
            $structure_page_hide = array_map( 'trim', $structure_page_hide );
        }
    } else {
        $structure_page_hide = [];
    }

    $thumbnail_type = get_post_meta( $post->ID, 'thumbnail_type', true );

    $thumb_url = get_the_post_thumbnail_url( $post, 'full' );

    $is_show_thumb         = ( ! in_array( 'thumbnail', $structure_page_hide ) && $core->is_show_element( 'thumbnail' ) );
    $is_show_breadcrumbs   = $core->is_show_element( 'breadcrumbs' );
    $is_show_title_h1      = $core->is_show_element( 'title_h1' );
    $is_show_comments      = ( ! in_array( 'comments', $structure_page_hide ) && $core->is_show_element( 'comments' ) );
    $is_show_sidebar       = ( in_array( $core->get_option( 'structure_page_sidebar' ), [
            'left',
            'right',
        ] ) && $core->is_show_element( 'sidebar' ) );
    $is_show_related_posts = $core->is_show_element( 'related_posts' );


    ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php if ( $thumbnail_type == 'wide' || $thumbnail_type == 'full' || $thumbnail_type == 'fullscreen' ): ?>

<?php if ( ! empty( $thumb_url ) && $is_show_thumb ): ?>
<div class="entry-image entry-image--<?php echo $thumbnail_type ?>" <?php if ( ! empty( $thumb_url ) )
                    echo ' style="background-image: url(' . $thumb_url . ');"' ?>>

  <div class="entry-image__body">
    <?php if ( $is_show_breadcrumbs ) {
                            get_template_part( 'template-parts/blocks/breadcrumbs' );
                        } ?>

    <?php if ( $is_show_title_h1 ) { ?>
    <?php do_action( THEME_SLUG . '_single_before_title' ) ?>
    <h1 class="entry-title"><?php the_title() ?></h1>
    <?php do_action( THEME_SLUG . '_single_after_title' ) ?>
    <?php } ?>
  </div>

</div>
<?php endif; ?>

<?php endif; ?>

<div id="primary" class="content-area" itemscope itemtype="http://schema.org/Article">
  <main id="main" class="site-main">

    <section class="reviews">
      <?php
      $args = array(
        'post_type' => 'sapsan_reviews'
      );
      $query = new WP_Query( $args);
      if($query->have_posts( ) ) :
        ?>
      <div class="wrapper">
        <h2 class="reviews__title title">Отзывы наших клиентов</h2>
        <div class="reviews__wrapper swiper-container-4">
          <ul class="reviews__list swiper-wrapper">
            <?php while ($query->have_posts() ) : $query->the_post(); ?>
            <li class="reviews__item swiper-slide">
              <a data-fancybox="gallery" href="<?php the_post_thumbnail_url(full) ?>"><img
                  src="<?php the_post_thumbnail_url(full) ?>"></a>
            </li>
            <?php endwhile; ?>
          </ul>
          <div class="reviews__pagination swiper-pagination-4"></div>
        </div>
      </div>
      <?php endif;
      wp_reset_postdata(); ?>
    </section>

  </main><!-- #main -->
</div><!-- #primary -->

<?php if ( $is_show_sidebar ) {
            get_sidebar();
        } ?>

<?php endwhile; ?>

<?php if ( $is_show_related_posts ) {
        do_action( THEME_SLUG . '_single_before_related' );
        get_template_part( 'template-parts/related', 'posts' );
        do_action( THEME_SLUG . '_single_after_related' );
    }
}
?>


<?php
get_footer();