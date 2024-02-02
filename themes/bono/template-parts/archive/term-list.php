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
 * @version 1.7.5
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * @var array $args
 */

$terms   = isset( $args['terms'] ) ? $args['terms'] : [];
$classes = isset( $args['classes'] ) ? ' ' . ( is_array( $args['classes'] ) ? implode( ' ', $args['classes'] ) : $args['classes'] ) : '';

if ( ! $terms ) {
    return;
}

?>

<div class="term-list<?php echo $classes ?>">
    <ul>
        <?php foreach ( $terms as $_term ): ?>
            <li>
                <a href="<?php echo get_term_link( $_term->term_id ) ?>"><?php echo esc_html( $_term->name ) ?></a>
            </li>
        <?php endforeach ?>
    </ul>
</div>
