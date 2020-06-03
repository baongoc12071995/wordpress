<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Zeal
 */
get_header();
?>

<div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

        <div class="container single-page">

            <div class="row">
                <div class="col-sm-12 single-page-wrapper 404-page">

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <span class="fa fa-exclamation-triangle"></span>
                        <?php echo esc_html( get_theme_mod( 'zeal_404_content', __( 'Sorry, the page youre looking for is not available', 'zeal' ) ) ); ?>
                        
                    </article><!-- #post-## -->

                </div>

            </div>

        </div>

    </main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
