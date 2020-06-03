<?php
/**
 * Template Name: Full Width
 * The template file for pages without right sidebar.
 * @package Artwork
 * @since Artwork 1.0
 */
get_header(); ?>
<div class="main-container">
    <?php if (have_posts()) : ?>
        <?php /* The loop */ ?>
        <?php while (have_posts()) : the_post(); ?>
            <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if (has_post_thumbnail() && !post_password_required()) : ?>
                    <div class="entry-thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>
                <div class="entry-content">
                    <?php the_content(); ?>                    
                </div><!-- .entry-content -->
            </article><!-- #post -->
        <?php endwhile; ?>
    <?php endif; ?>

</div>

<?php get_footer();