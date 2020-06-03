<?php

/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Travellator
 * @since Travellator 1.0
 */

get_header(); ?>
	
	<?php while ( have_posts() ) : the_post(); ?>
        <div class="blog-post-container no-featured">
			<?php the_post_thumbnail( 'single-post-thumbnail', array( 'class' => 'single-post-thumbnail' ) ); ?>
            
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
           			<?php $tags_list = get_the_tag_list( '', esc_html__( ', ', 'travellator' ) ); ?>
                    <div class="entry-meta">
                        <?php travellator_posted_on(); ?> 
                        
                         <?php 
                            if( comments_open() ) {?>
                                <span class="meta-info-comment"><a href="<?php comments_link(); ?>"><i class="fa fa-comments"></i> <?php esc_attr_e( 'Leave a Comment' ,'travellator' ); ?>"></a></span>
                        <?php } 
                            else {?>
                                <span class="meta-info-comment"><i class="fa fa-comments"></i> <?php esc_attr_e( 'Comment is Closed' ,'travellator' ); ?></span>
                        <?php } ?>
            
                    </div><!-- .entry-meta -->
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
							<?php get_template_part( 'template-parts/content', 'single' ); ?>
                    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;
                            ?>
                        </div>
                    </div>
                </div>
            </main><!-- #main -->
        </div><!-- #primary -->
    <?php endwhile; // End of the loop. ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

