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
 * @package Zeal
 */

get_header(); ?>

    <div id="primary" class="content-area">
    
        <main id="main" class="site-main" role="main">
            
            <div class="container">
        
                <div class="row homepage-portfolio">

                    <section class="homepage-portfolio">

                        <div class="col-sm-12">

                            <h2 class="wow fadeInDown feature-content-title">

                                <?php echo esc_html( get_theme_mod( 'zeal_portfolio_section_name', __( 'Blog', 'zeal' ) ) ); ?>

                            </h2>

                            <hr>
                            
                        </div>

                        <?php /* Start the Loop */ ?>
                        <?php while (have_posts()) : the_post(); 
 
                            get_template_part( 'template-parts/content-blog-3cols', get_post_format() );
                        
                        endwhile; ?>

                    </section>
                    
                    <div class="zeal-pagination">
                        <?php echo paginate_links(); ?>
                    </div>
                    
                </div>
            
            </div>

        </main><!-- #main -->
        
    </div><!-- #primary -->

<?php get_footer(); ?>
