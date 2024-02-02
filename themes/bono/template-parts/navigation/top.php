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
 * @version 1.4.0
 */

if ( has_nav_menu( 'top' ) ) {
    echo '<div class="top-menu">';
    wp_nav_menu(
        [
            'theme_location'  => 'top',
            'container'       => 'ul',
            'menu_id'         => 'top-menu',
            'menu_class'      => 'menu',
            'container_class' => 'top-menu',
        ]
    );
    echo '</div>';
}
