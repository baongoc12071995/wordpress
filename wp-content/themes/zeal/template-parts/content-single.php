<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zeal
 */

?>
<?php

    if ( has_post_thumbnail( get_the_ID() ) ) :
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
    else:
        $image = get_template_directory_uri() . '/inc/images/blog-post-default-bg.jpg';
    endif;
    
    switch ( get_theme_mod( 'zeal_post_column_ratio', 'four-eight' ) ) :
                    
        case 'three-nine':
            $col_1_width = 3;
            $col_2_width = 9;
            break;
        case 'four-eight':
            $col_1_width = 4;
            $col_2_width = 8;
            break;
        case 'six-six':
            $col_1_width = 6;
            $col_2_width = 6;
            break;
        default:
            $col_1_width = 4;
            $col_2_width = 8;
            
    endswitch; 
    
?>

<div class="col-sm-12 single-post-wrapper">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <div class="row">
        
            <div class="col-sm-<?php echo esc_attr( $col_1_width ); ?> single-post-left">
                
                <a href="<?php echo has_post_thumbnail( get_the_ID() ) ? esc_url( $image[0] ) : esc_url( $image ); ?>" data-lightbox="<?php esc_attr( the_title() ); ?>">
                    
                    <?php
                        if( has_post_thumbnail( get_the_ID() ) ) : 
                            
                            the_post_thumbnail();
                        
                        else : ?>
                    
                        
                    <?php endif; ?>
                    
                </a>
                
                <div class="single-post-meta">
                    
                    <?php if( get_theme_mod( 'zeal_single_author', 'on' ) == 'on' ) : ?>
                    
                    <span class="meta-heading"><?php _e( "AUTHOR :", 'zeal'); ?></span>
                    <span class="meta-value"><?php esc_html( the_author_posts_link() ); ?></span>
                    
                    <br>
                    <?php endif; ?>
                    
                    <?php if( get_theme_mod( 'zeal_single_date', 'on' ) == 'on' ) : ?>
                    <span class="meta-heading"><?php _e( "DATE POSTED :", 'zeal'); ?></span>
                    <span class="meta-value"><?php echo esc_html( get_the_date() ); ?></span>
                    
                    <br>
                    <?php endif; ?>
                    
                    
                    <?php if( get_theme_mod( 'zeal_single_categories', 'on' ) == 'on' ) : ?>
                    <span class="meta-heading"><?php _e( "CATEGORIES :", 'zeal'); ?></span>
                    <span class="meta-value">
                        <?php $categories = get_the_category(); ?>
                        <?php foreach ( $categories as $cat ) : ?>
                            <a href="<?php echo esc_url( get_category_link( $cat ) ); ?>">
                                <span class="meta-taxonomy"><?php echo esc_html( $cat->name ); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </span>
                    <?php endif; ?>
                    
                    <?php if( get_theme_mod( 'zeal_single_tags', 'on' ) == 'on' ) : ?>
                        <?php if ( has_tag() ) : ?>
                            <br>
                            <span class="meta-heading"><?php _e( "TAGS :", 'zeal'); ?></span>
                            <span class="meta-value">
                                <?php $tags = get_the_tags(); ?>
                                <?php foreach ( $tags as $tag ) : ?>
                                    <a href="<?php echo esc_url( get_tag_link( $tag ) ); ?>">
                                        <span class="meta-taxonomy"><?php echo esc_html( $tag->name ); ?></span>
                                    </a>
                                <?php endforeach; ?>
                            </span>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                </div>
                
            </div>
            
            <div class="col-sm-<?php echo esc_attr( $col_2_width ); ?> single-post-right">
                
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php the_content(); ?>
                    <?php
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zeal' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div><!-- .entry-content -->
            
            </div>
            
        </div>
            
    </article><!-- #post-## -->

</div>