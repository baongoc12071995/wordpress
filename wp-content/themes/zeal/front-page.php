<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zeal
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php $front = get_option('show_on_front'); ?>
        
        <?php if ( $front != 'posts' ) : ?>
            <?php do_action('zeal_homepage'); ?>
        <?php else : ?>
        <div class="container">

            <div class="row homepage-background">
            <?php zeal_jumbotron(); ?>
            </div>
        </div>
            
        <?php endif; ?>
        
        <?php if( get_theme_mod('zeal_homepage_content_bool', 'on' ) == 'on' ) : ?>
        
            <div class="container">

                <div class="row homepage-portfolio">

                    <section class="homepage-portfolio">

                        <?php if ( $front == 'posts' ) : ?>

                            <div class="col-sm-12">

                                <h2 class="wow fadeInDown feature-content-title">
                                    <?php echo esc_html( get_theme_mod( 'zeal_portfolio_section_name', __( 'Blog', 'zeal' ) ) ); ?>
                                </h2>

                                <hr>

                            </div>

                        <?php endif; ?>

                        <?php /* Start the Loop */ ?>
                        <?php while (have_posts()) : the_post(); ?>

                            <?php
                                if ( $front == 'posts' ) :
                                    get_template_part( 'template-parts/content-blog-3cols', get_post_format() );
                                  else:
                                    get_template_part('template-parts/content-page-home', get_post_format() );
                                endif;
                            ?>

                        <?php endwhile; ?>

                    </section>

                </div>

            </div>
        <?php endif; ?>
    </main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>      