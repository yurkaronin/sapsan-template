<?php
/**
 * The sidebar containing the main widget area
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bono
 * @version 1.7.7
 */

?>

<?php if ( ! wp_is_mobile() ): ?>
    <?php get_template_part( 'template-parts/sidebar/desktop' ) ?>

<?php else: ?>
    <?php get_template_part( 'template-parts/sidebar/mobile' ) ?>

<?php endif ?>
