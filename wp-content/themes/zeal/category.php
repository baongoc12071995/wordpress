<?php
/**
 * The Category template file.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zeal
 */

get_header(); ?>

    <section id="primary" class="content-area">
    
        <main id="main" class="site-main" role="main">
            
            <div class="container archive-page">
        
                <div class="row">

                    <?php if ( have_posts() ) : ?>

                            <header class="page-header">
                                <h1 class="page-title"><?php printf( esc_html__( 'Category: %s', 'zeal' ), '<span>' . single_cat_title( null, FALSE ) . '</span>' ); ?></h1>
                            </header><!-- .page-header -->

                            <?php /* Start the Loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>

                                    <?php
                                    /**
                                     * Run the loop for the search to output the results.
                                     */
                                    get_template_part( 'template-parts/content', 'category' );
                                    ?>

                            <?php endwhile; ?>

                    <?php else : ?>

                            <?php get_template_part( 'template-parts/content', 'none' ); ?>

                    <?php endif; ?>

                </div>
            
            </div>

        </main><!-- #main -->
        
    </section><!-- #primary -->

<?php get_footer(); ?>
