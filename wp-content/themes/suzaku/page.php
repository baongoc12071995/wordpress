<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Suzaku
 */

get_header(); ?>

<main id="primary" class="site-main" role="main">
	<div class="content-wrapper">
	
		<?php
		while ( have_posts() ) : the_post();
		
			get_template_part( 'template-parts/content', 'page' );
		
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
