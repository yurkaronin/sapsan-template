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
 * @version 1.6.0
 */

global $authordata;

$wpshop_core   = theme_container()->get( \Wpshop\Core\Core::class );
$wpshop_social = theme_container()->get( \Wpshop\Core\Social::class );
$wpshop_rating = theme_container()->get( \Wpshop\Core\StarRating::class );

$author_link              = $wpshop_core->get_option( 'author_link' );
$author_link_target       = $wpshop_core->get_option( 'author_link_target' );
$author_social_title_show = $wpshop_core->get_option( 'author_social_title_show' );
$author_social_enable     = $wpshop_core->get_option( 'author_social_enable' );
$is_show_social_js        = $wpshop_core->get_option( 'author_social_js' );
$is_show_rating           = $wpshop_core->is_show_element( 'rating' );
?>

<!--noindex-->
<div class="author-box">
    <div class="author-info">
        <div class="author-box__ava">
            <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( THEME_SLUG . '_author_avatar_size', 70 ) ); ?>
        </div>

        <div class="author-box__body">
            <div class="author-box__author">
                <?php
                if ( $author_link ) {
                    $author_link_target = $author_link_target ? '_blank' : '_self';

                    echo '<a href ="' . get_author_posts_url( $authordata->ID ) . '" target="' . $author_link_target . '">' . get_the_author() . '</a>';
                } else {
                    echo get_the_author();
                }
                ?>
            </div>
            <div class="author-box__description">
                <!--noindex--><?php echo wpautop( get_the_author_meta( 'description' ) ) ?><!--/noindex-->
            </div>

            <?php
            if ( $author_social_enable ) {

                $author_social_profiles = apply_filters( THEME_SLUG . '_social_share_links', [
                    'facebook', 'vkontakte', 'twitter', 'odnoklassniki', 'telegram', 'youtube',
                    'instagram', 'tiktok', 'linkedin', 'whatsapp', 'viber', 'pinterest',
                    'yandexzen', 'github', 'discord', 'rutube', 'yappy', 'pikabu', 'yandex'
                ] );

                foreach ( $author_social_profiles as $author_social_profile ) {
                    $user_meta_social = get_user_meta( $authordata->ID, $author_social_profile, true );

                    if ( $user_meta_social ) {
                        $author_social_profile_links[$author_social_profile] = $user_meta_social;
                    }
                }

                if ( ! empty( $author_social_profile_links ) ) { ?>
                    <div class="author-box__social">
                        <?php if ( $author_social_title_show ) { ?>
                            <div class="author-box__social-title"><?php echo apply_filters( THEME_SLUG . '_author_social_title', __( 'Author profiles', THEME_TEXTDOMAIN ) ) ?></div>
                        <?php } ?>

                        <div class="social-links">
                            <div class="social-buttons social-buttons--square social-buttons--circle">
                                <?php $wpshop_social->social_profiles( $author_social_profile_links, $is_show_social_js ) ?>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
    </div>

    <?php if ( $is_show_rating ) { ?>
        <div class="author-box__rating">
            <div class="author-box__rating-title"><?php echo apply_filters( 'bono_single_rating_title', __( 'Rate author', THEME_TEXTDOMAIN ) ) ?></div>
            <?php $post_id = $post ? $post->ID : 0;
            $wpshop_rating->the_rating( $post_id, apply_filters( THEME_SLUG . '_rating_text_show', false ) ); ?>
        </div>
    <?php } ?>
</div>
<!--/noindex-->
