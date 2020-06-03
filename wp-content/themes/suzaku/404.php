<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Suzaku
 */

get_header(); ?>

<main id="primary" class="site-main" role="main">
	<div class="content-wrapper">
	
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'suzaku' ); ?></h1>
		</header><!-- .page-header -->
		
		<div class="page-content">
			<p><?php printf( wp_kses( __( 'It looks like nothing was found at this location. Try <a href="%1$s">returning home</a> or performing a search.', 'suzaku' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( home_url( '/' ) ) )
			?></p>
		
			<?php get_search_form(); ?>
		
		</div><!-- .page-content -->
		
	</div><!-- .content-wrapper -->
</main><!-- #primary -->

<?php get_footer();
