<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travellator
 * @since Travellator 1.0
 */

get_header(); ?>
	<?php  if(get_theme_mod( 'travellator_display_optional_pages_setting', 1) == 1) { ?>
        <section id="home-optional-pages">
            <div class="container">
                <div class="row">
                     <?php 
					 	$selected_pages = array(
						get_theme_mod( 'travellator_optional_first_page_setting'),
						get_theme_mod( 'travellator_optional_second_page_setting'),
						get_theme_mod( 'travellator_optional_third_page_setting') );
				
					$args = array(
							'post_type' => 'page',
							'post__in' => $selected_pages,
							'order'   => 'ASC',
							); 
				
					$the_pages = new WP_Query( $args );
				
					if ($the_pages->have_posts()) :          
						while ($the_pages->have_posts()) : $the_pages->the_post();
							get_template_part('template-parts/content', 'optional-pages');                    
						endwhile;
						wp_reset_postdata();
					endif; 
					 ?>
                </div>
            </div>
        </section>
	<?php  } ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>
		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		<?php 
			the_posts_pagination( array(
				'mid_size' => 2,
				'prev_text' => __( '<span class="fa fa-chevron-left"></span>', 'travellator' ),
				'next_text' => __( '<span class="fa fa-chevron-right"></span>', 'travellator' ),
			) ); 	
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php  get_sidebar(); ?>
<?php get_footer(); ?>

