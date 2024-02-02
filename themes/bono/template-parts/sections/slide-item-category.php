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


/**
 * @var WP_Term $_category
 * @var array   $_item
 */

if ( empty( $_category ) || empty( $_item ) ) {
    return;
}

$title       = apply_filters( 'bono_category_slide_item_title',
    esc_html( empty( $_item['header'] ) ? $_category->name : $_item['header'] ),
    $_item,
    $_category
);
$description = apply_filters(
    'bono_category_slide_item_description',
    esc_html( empty( $_item['description'] ) ? $_category->description : $_item['description'] ),
    $_item,
    $_category
);
$url         = apply_filters(
    'bono_category_slide_item_url',
    $_item['link'] ?: get_term_link( $_category ),
    $_item,
    $_category
);
$button_text = apply_filters(
    'bono_category_slide_item_button_text',
    esc_html( $_item['btn_txt'] ?: __( 'More', THEME_TEXTDOMAIN ) ),
    $_item,
    $_category
);

?>
<div class="swiper-slide card-slider card-slider--type-<?php echo esc_attr( $_item['type'] ) ?>">
    <a href="<?php echo $url ?>" class="card-slider-wrap">
        <div class="card-slider__image">
            <?php woocommerce_subcategory_thumbnail( $_category ) ?>
        </div>
        <div class="card-slider__body">
            <div class="card-slider__body-inner">
                <div class="card-slider__title"><?php echo $title ?></div>
                <div class="card-slider__excerpt">
                    <p><?php echo $description ?></p>
                </div>
                <span class="card-slider__button"><?php echo $button_text ?></span>
            </div>
        </div>
    </a>
</div>
