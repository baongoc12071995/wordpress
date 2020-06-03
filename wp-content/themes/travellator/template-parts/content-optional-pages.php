<?php

/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travellator
 * @since Travellator 1.3
 */

?>
<div class="col-md-4">	
    <div class="featured-container">
        <div class="about-entry">
    <?php if(has_post_thumbnail()){ ?>
            <div class="circle-img">
            <?php the_post_thumbnail('medium'); ?>
            </div>
    <?php } ?> 
    <?php   the_title( '<h2>', '</h2>' ); ?>
            <p><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink();?>" class="btn btn-lg read_more"><?php _e( 'Read More', 'travellator' ); ?></a>
        </div>
    </div>
</div>