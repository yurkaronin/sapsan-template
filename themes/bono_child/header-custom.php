<?php
use Wpshop\Core\Advertising;
use Wpshop\Core\Core;
use Wpshop\TheTheme\ThemeProvider;
$core        = theme_container()->get( Core::class );
$advertising = theme_container()->get( Advertising::class );
?>
<!doctype html>
<html class="custom" <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
  <?php $core->the_option( 'code_head' ) ?>
  <!-- Мои стили -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"
    loading="lazy" />
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/swiper/swiper-bundle.css" loading="lazy">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" loading="lazy">
  <link rel="stylesheet" type="text/css" href="/wp-content/themes/bono_child/assets/css/style.css" loading="lazy">
  <style>
  @media (min-width: 992px) {
    .site-footer-container {
      position: relative;
    }
  }
  </style>

<script>
  console.log('Подключён header-custom.php');
</script>
</head>

<body <?php body_class(); ?>>
  <?php theme_container()->get( ThemeProvider::class )->check(); ?>
  <?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
} ?>
  <?php do_action( THEME_SLUG . '_after_body' ) ?>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text"
      href="#content"><?php esc_html_e( 'Skip to content', THEME_TEXTDOMAIN ); ?></a>
    <?php
    if ( $core->get_option( 'super_header_show' ) || $core->get_option( 'super_header_show_mob' ) ): ?>
    <?php get_template_part( 'template-parts/header/super-header' ) ?>
    <?php endif ?>
    <?php
    if ( $core->is_show_element( 'header' ) ): ?>
    <?php get_template_part( 'template-parts/header/header' ) ?>
    <?php endif ?>
    <?php
    if ( $core->is_show_element( 'header_menu' ) ): ?>
    <?php get_template_part( 'template-parts/navigation/header' ) ?>
    <?php endif ?>
    <?php do_action( THEME_SLUG . '_before_site_content' ) ?>