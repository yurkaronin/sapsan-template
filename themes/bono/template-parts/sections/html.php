<?php

/**
 * ****************************************************************************
 *
 *   DON'T EDIT THIS FILE
 *   After update you will lose all changes. Use child theme
 *
 *   НЕ РЕДАКТИРУЙТЕ ЭТОТ ФАЙЛ
 *   После обновления Вы потереяете все изменения. Используйте дочернюю тему
 *
 *   https://support.wpshop.ru/docs/themes/bono/child/
 *
 * *****************************************************************************
 *
 * @package bono
 * @version 1.7.0
 */

defined( 'ABSPATH' ) || exit;

$wpshop_helper   = theme_container()->get( \Wpshop\Core\Helper::class );
$wpshop_template = theme_container()->get( \Wpshop\Core\Template::class );

$section_options = ( isset( $section_options ) ) ? $section_options : [];

// default
$section_header_text = '';
$section_classes = [ 'section-' . $section_options['n'] ];

$html_code = '';

if ( ! empty( $section_options['section_header_text'] ) ) {
    $section_header_text = $section_options['section_header_text'];
}
if ( ! empty( $section_options['preset'] ) ) {
    $section_classes[] = 'section-preset--' . $section_options['preset'];
}
if ( ! empty( $section_options['html_code'] ) ) {
    $html_code = $section_options['html_code'];
}

$section_header_text = apply_filters( 'bono_homepage_constructor:html_section_header_text', $section_header_text, $section_options );

do_action( 'bono_section_html_query_before', $section_options );
?>

<div class="section-block section-html <?php echo implode( ' ', $section_classes ) ?>">
    <div class="section-block__header">
        <div class="section-block__title"><?php echo $section_header_text ?></div>
    </div>

    <div class="section-html__body">
        <?php echo do_shortcode( $html_code ) ?>
    </div>
</div><!--.section-posts-->

<?php do_action( 'bono_section_html_query_after', $section_options );
