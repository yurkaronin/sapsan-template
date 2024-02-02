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

defined( 'WPINC' ) || die;

/**
 * @var array|null $child_files_status
 */

?>
<div>
    <h3><?php echo __( 'Child Theme Templates Status', THEME_TEXTDOMAIN ) ?></h3>
    <?php if ( null === $child_files_status ): ?>
        <p><?php echo __( 'There is no child theme', THEME_TEXTDOMAIN ) ?></p>
    <?php else: ?>
        <ul>
            <?php foreach ( $child_files_status as $row ): ?>
                <?php $is_ok = ! ( $row->child_file && $row->child_version != $row->base_version ) ?>
                <li>
                    <span class="dashicons dashicons-<?php echo $is_ok ? 'yes' : 'no' ?>" style="color: <?php echo $is_ok ? 'green' : 'red' ?>"></span>
                    <?php echo $row->base_file ?>
                    <?php if ( ! $is_ok ): ?>
                        [<?php echo $row->base_version ?>]
                    <?php endif ?>
                    <?php if ( $row->child_file ): ?>
                        -> <?php echo $row->child_file ?>
                    <?php endif ?>
                    <?php if ( ! $is_ok ): ?>
                        [<?php echo $row->child_version ?>]
                    <?php endif ?>
                </li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
</div>
