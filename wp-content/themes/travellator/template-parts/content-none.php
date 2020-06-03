<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travellator
 * @since Travellator 1.0
 */

?>

<div class="container">
	<div class="row">
		<div class="col-md-12">    
            <section class="no-results not-found">
                <div class="page-content">
                    <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

                        <p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'travellator' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

                    <?php elseif ( is_search() ) : ?>
                        <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'travellator' ); ?></p>
                        <p> <?php get_search_form(); ?></p>
                    <?php else : ?>

                        <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'travellator' ); ?></p>
                        <p><?php get_search_form(); ?></p>

                    <?php endif; ?>
                </div><!-- .page-content -->
            </section><!-- .no-results -->
        </div>
    </div>
</div>