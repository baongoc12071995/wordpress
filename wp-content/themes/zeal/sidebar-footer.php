<?php
/**
 * The footer widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zeal
 */

if ( ! is_active_sidebar( 'sidebar-footer' ) ) {
    return;
}
?>


<div id="secondary" class="widget-area row" role="complementary">
    <?php dynamic_sidebar( 'sidebar-footer' ); ?>
</div><!-- #secondary -->