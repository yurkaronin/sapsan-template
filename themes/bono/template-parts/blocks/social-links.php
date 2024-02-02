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

$social_profiles = [
    'facebook', 'vkontakte', 'twitter', 'odnoklassniki', 'telegram', 'youtube',
    'instagram', 'tiktok', 'linkedin', 'whatsapp', 'viber', 'pinterest',
    'yandexzen', 'github', 'discord', 'rutube', 'yappy', 'pikabu', 'yandex'
];

foreach ( $social_profiles as $social_profile ) {
    if ( $wpshop_core->get_option( 'social_' . $social_profile ) ) {
        $social_profile_links[ $social_profile ] = $wpshop_core->get_option( 'social_' . $social_profile );
    }
}

if ( ! empty( $social_profile_links ) ) {

    $social_profile_links = apply_filters( 'bono_social_profiles', $social_profile_links );
    ?>

    <div class="social-links">
        <div class="social-buttons social-buttons--square">

            <?php
            $wpshop_social->social_profiles( $social_profile_links, $wpshop_core->get_option( 'structure_social_js' ) );
            ?>

        </div>
    </div>

<?php } ?>
