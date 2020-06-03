<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Travellator
 * @since Travellator 1.0
 */

get_header(); ?>
	<div class="page-header-container no-featured">
    	<header class="entry-header">
            <h1 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'travellator' ); ?></h1>
        </header><!-- .page-header -->
    </div>

    <div class="breadcrumb-container">
    	<div class="container">
			<?php travellator_breadcrumb(); ?>
        </div>
    </div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
                <section class="error-404 not-found">
                    <div class="page-content">
                        <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'travellator' ); ?></p>
 
                        <?php get_search_form(); ?>

                        <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

                        <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
    
                    </div><!-- .page-content -->
                </section><!-- .error-404 -->
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php  get_sidebar(); ?>
<?php get_footer(); ?>

