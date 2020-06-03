<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travellator
 * @since Travellator 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'travellator' ),
                'after'  => '</div>',
            ) );
        ?>

        <?php the_post_navigation(); ?>

	</div><!-- .entry-content -->
    
</article><!-- #post-## -->



