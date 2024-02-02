<?php
/**
 * Template name: Страница Контакты
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bono
 * @version 1.4.0
 */

use Wpshop\Core\Core;
use Wpshop\TheTheme\Features\Favorite;
use Wpshop\TheTheme\Features\HomeConstructor;

$core             = theme_container()->get( Core::class );
$favorite         = theme_container()->get( Favorite::class );
$home_constructor = theme_container()->get( HomeConstructor::class );

$home_constructor->prepare();

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
                do_action( 'bono_before_homepage_constructor' );
                $home_constructor->output();
                do_action( 'bono_after_homepage_constructor' );
            } else {
                do_action( 'bono_before_posts' );
                if ( have_posts() ) {

                    if ( is_home() && ! is_front_page() ) {
                        echo '<h1 class="page-title screen-reader-text">' . single_post_title( '', false ) . '</h1>';
                    }

                    get_template_part( 'template-parts/post-container/' . $core->get_option( 'structure_home_posts' ) );

                    the_posts_pagination();

                } else {
                    get_template_part( 'template-parts/content', 'none' );
                }
                do_action( 'bono_after_posts' );
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

    <?php

                $template_part_page = 'page';

                if ( is_wc_enabled() && apply_filters( 'bono_is_page_woocommerce', false ) ) {
                    $template_part_page = 'page-woocommerce';
                }

                get_template_part( 'template-parts/content', $template_part_page );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( $is_show_comments ) {
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                }
                ?>

    <?php
	// получаем все группы
	$terms = get_terms( 
	           	array(
           			'taxonomy' => 'sapsan_status_group'
	           	) 
           	);

 	?>

    <?php 
	    // крутим цикл по группам
		foreach ($terms as $term) {
	 ?>

    <?php //print_r($term); ?>

    <?php 
		 // формируем запрос на получение сотрудников + фильтрация по группе
		  $args = array(
			'post_type' => 'sapsan_people_cards',
			'posts_per_page' => '-1',
			'tax_query' => array(
							 array(
								 'taxonomy'  => 'sapsan_status_group',
								 'field'  => 'id',
								 'terms'  => $term->term_id,
							 ),
						),
		  ); 
	 ?>

    <section class="team">
      <?php
      $query = new WP_Query( $args);
      if($query->have_posts( ) ) :
        ?>
      <h2 class="team__title title"><?php echo $term->name; ?></h2>

      <ul class="team__list">
        <?php while ($query->have_posts() ) : $query->the_post(); ?>
        <li class="team__item">
          <div class="team__photo"><?php the_post_thumbnail(full) ?></div>
          <div class="team__wrapper">
            <span class="team__status"><?php the_field('person-card__label_1'); ?></span>
            <p class="team__name"><?php the_title() ?></p>
            <ul class="team__contacts-list">
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--mail"
                  href="mailto:<?php the_field('person-card__email_1'); ?>"><?php the_field('person-card__email_1'); ?></a>
              </li>
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--tel"
                  href="tel:<?php the_field('person-card__tel_1'); ?>"><?php the_field('person-card__tel_1'); ?></a>
              </li>
            </ul>
          </div>
        </li>
        <?php endwhile; ?>
      </ul>
      <?php endif;
      wp_reset_postdata(); ?>
    </section>


    <?php } ?>


    <?php if ( false ) { ?>
    <section class="team">
      <?php
      $args = array(
        'post_type' => 'sapsan_people_cards'
      );
      $query = new WP_Query( $args);
      if($query->have_posts( ) ) :
        ?>
      <h2 class="team__title title">Руководство</h2>

      <ul class="team__list">
        <?php while ($query->have_posts() ) : $query->the_post(); ?>
        <li class="team__item">
          <div class="team__photo"><?php the_post_thumbnail(full) ?></div>
          <div class="team__wrapper">
            <span class="team__status"><?php the_field('person-card__label_1'); ?></span>
            <p class="team__name"><?php the_title() ?></p>
            <ul class="team__contacts-list">
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--mail"
                  href="mailto:<?php the_field('person-card__email_1'); ?>"><?php the_field('person-card__email_1'); ?></a>
              </li>
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--tel"
                  href="tel:<?php the_field('person-card__tel_1'); ?>"><?php the_field('person-card__tel_1'); ?></a>
              </li>
            </ul>
          </div>
        </li>
        <?php endwhile; ?>
      </ul>
      <?php endif;
      wp_reset_postdata(); ?>
    </section>
    <?php  } ?>

    <div class="map-wrapper">
      <script type="text/javascript" charset="utf-8" async=""
        src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A3f2c2efbe5c9be4e11cbc48cba2121b9cea0298c4ae6934680f588bdce23089e&amp;width=100%25&amp;height=442&amp;lang=ru_RU&amp;scroll=true">
      </script>
    </div>
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