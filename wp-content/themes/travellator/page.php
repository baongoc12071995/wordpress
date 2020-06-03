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
 * @package Travellator
 * @since Travellator 1.0
 */

get_header(); ?>

	
    <div class="page-header-container no-featured" >
    <?php the_post_thumbnail( 'single-post-thumbnail', array( 'class' => 'single-post-thumbnail' ) ); ?>
    	<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->
    </div>

    <div class="breadcrumb-container">
    	<div class="container">
        	<div class="row">
                <div class="col-md-12">
                	<?php travellator_breadcrumb(); ?>
                </div>
            </div>
        </div>
    </div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
            	<div class="row">
                	<div class="col-md-12">
						<?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'template-parts/content', 'page' ); ?>

                            <?php

                                // If comments are open or we have at least one comment, load up the comment template.

                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();

                                endif;
                            ?>

                        <?php endwhile; // End of the loop. ?>

                    </div>
                </div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->



<?php get_sidebar(); ?>

<?php get_footer(); ?>

