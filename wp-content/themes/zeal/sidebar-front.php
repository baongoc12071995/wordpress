<?php
/**
 * The front page widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zeal
 */

if ( ! is_active_sidebar( 'sidebar-front' ) ) {
    return;
}
?>


<div id="secondary" class="widget-area row" role="complementary">
    <?php dynamic_sidebar( 'sidebar-front' ); ?>
</div><!-- #secondary -->