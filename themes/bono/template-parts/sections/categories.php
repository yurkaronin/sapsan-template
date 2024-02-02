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
 * @version 1.7.1
 */

defined( 'ABSPATH' ) || exit;

use Wpshop\TheTheme\Features\HomeConstructor;

$section_options = ( isset( $section_options ) ) ? $section_options : [];

$section_header_text = ! empty( $section_options['section_header_text'] ) ? $section_options['section_header_text'] : '';
$section_description = ! empty( $section_options['section_description'] ) ? $section_options['section_description'] : '';
$section_header_text = apply_filters( 'bono_homepage_constructor:categories_section_header_text', $section_header_text, $section_options );
$section_description = apply_filters( 'bono_homepage_constructor:categories_section_description', $section_description, $section_options );
$columns             = apply_filters( 'bono_homepage_constructor:categories_section_columns', wc_get_loop_prop( 'columns' ), $section_options );

$section_description_pos = apply_filters( 'bono_homepage_constructor:categories_section_description_pos', 'top' );

$homepage_constructor = theme_container()->get( HomeConstructor::class );

$section_classes = [ 'section-' . $section_options['n'] ];
if ( ! empty( $section_options['preset'] ) ) {
    $section_classes[] = 'section-preset--' . $section_options['preset'];
}

$product_categories = $homepage_constructor->get_categories( wp_parse_id_list( $section_options['cat'] ) );

do_action( 'bono_section_category_query_before', $section_options );

?>
    <div class="section-block section-categories <?php echo implode( ' ', $section_classes ) ?>">
        <?php if ( $section_header_text ): ?>
            <div class="section-block__header">
                <div class="section-block__title"><?php echo $section_header_text ?></div>
            </div>
        <?php endif ?>

        <?php if ( 'top' === $section_description_pos ): ?>
            <div class="section-block__description-wrapper">
                <div class="section-block__description section-block__description--<?php echo $section_description_pos ?>">
                    <?php echo do_shortcode( $section_description ) ?>
                </div>
            </div>
        <?php endif ?>

        <div class="shop-grid shop-grid--columns-<?php echo esc_attr( $columns ) ?>">
            <?php foreach ( $product_categories as $category ) {
                wc_get_template( 'content-product_cat.php', [
                    'category' => $category,
                ] );
            } ?>
        </div>

        <?php if ( 'bottom' === $section_description_pos ): ?>
            <div class="section-block__description-wrapper">
                <div class="section-block__description section-block__description--<?php echo $section_description_pos ?>">
                    <?php echo do_shortcode( $section_description ) ?>
                </div>
            </div>
        <?php endif ?>

    </div>

<?php

do_action( 'bono_section_category_query_after', $section_options );
