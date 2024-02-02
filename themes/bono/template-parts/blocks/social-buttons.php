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

$wpshop_core   = theme_container()->get( \Wpshop\Core\Core::class );
$wpshop_social = theme_container()->get( \Wpshop\Core\Social::class );

$share_buttons = $wpshop_core->get_option( 'share_buttons' );
$share_buttons = explode( ',', $share_buttons );

echo '<div class="social-buttons">';
$wpshop_social->share_buttons( $share_buttons, [ 'show_label'    => false,
                                                 'show_counters' => $wpshop_core->get_option( 'share_buttons_counters' ),
] );
echo '</div>';
