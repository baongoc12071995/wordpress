<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Suzaku
 */

get_header(); ?>

<main id="primary" class="site-main" role="main">
	<div class="content-wrapper">
	
	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', get_post_format() );

		the_post_navigation( array(
			'prev_text' => sprintf( '<span class="screen-reader-text">%1$s</span>&laquo; %%title', esc_html__( 'Previous post', 'suzaku' ) ),
			'next_text' => sprintf( '<span class="screen-reader-text">%1$s</span>%%title &raquo;', esc_html__( 'Next post', 'suzaku' ) )
		) );

	endwhile; // End of the loop.
	?>
	
	</div><!-- .content-wrapper -->
</main><!-- #primary -->

<?php
	
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) :
	comments_template();
endif;
		
get_footer();
