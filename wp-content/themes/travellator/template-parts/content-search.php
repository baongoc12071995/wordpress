<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travellator
 * @since Travellator 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-post-container no-featured" >
    <?php the_post_thumbnail( 'single-post-thumbnail', array( 'class' => 'single-post-thumbnail' ) ); ?>
    	<div class="container">
        	<div class="row">
                <div class="col-md-12">
                    <div class="post-details">
        				<header class="entry-header">
							<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                    
                            <?php if ( 'post' === get_post_type() ) : ?>
                            <div class="entry-meta">
                                <?php travellator_posted_on(); ?>
                            </div><!-- .entry-meta -->
                            <?php endif; ?>
                        </header><!-- .entry-header -->

                        <div class="entry-summary">
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink('') ?>" class="read_more"><?php _e( 'Read More', 'travellator' ); ?></a>
                        </div><!-- .entry-summary -->
					</div>
				</div>
			</div>
		</div>
</article><!-- #post-## -->

