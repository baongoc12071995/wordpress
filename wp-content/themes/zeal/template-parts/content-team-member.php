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

<div class="col-sm-12 single-post-wrapper team-member-wrapper">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <div class="row">
        
            <div class="col-sm-<?php echo $col_1_width; ?> single-post-left">
                
                <a href="<?php echo has_post_thumbnail( get_the_ID() ) ? $image[0] : $image; ?>" data-lightbox="<?php the_title(); ?>">
                    
                    <?php
                        if( has_post_thumbnail( get_the_ID() ) ) : 
                            
                            the_post_thumbnail();
                        
                        else : ?>
                    
                            <img src="<?php echo has_post_thumbnail( get_the_ID() ) ? $image[0] : $image; ?>" alt="<?php _e( 'Featured Image', 'zeal' ); ?>" />
                        
                    <?php endif; ?>
                    
                </a>
                
                <div id="single-team-member-social">
                    
                    <?php 
                    
                    if ( get_post_meta( get_the_ID(), 'team_member_facebook', true) != '')
                        echo '<a target="_BLANK" href="' . get_post_meta( get_the_ID(), 'team_member_facebook', true) . '"><span class="fa fa-facebook"></span></a>';
                    
                    if ( get_post_meta( get_the_ID(), 'team_member_twitter', true) != '')
                        echo '<a target="_BLANK" href="' . get_post_meta( get_the_ID(), 'team_member_twitter', true) . '"><span class="fa fa-twitter"></span></a>';
                    
                    if ( get_post_meta( get_the_ID(), 'team_member_linkedin', true) != '')
                        echo '<a target="_BLANK" href="' . get_post_meta( get_the_ID(), 'team_member_linkedin', true) . '"><span class="fa fa-linkedin"></span></a>';
                    
                    if ( get_post_meta( get_the_ID(), 'team_member_gplus', true) != '')
                        echo '<a target="_BLANK" href="' . get_post_meta( get_the_ID(), 'team_member_gplus', true) . '"><span class="fa fa-google-plus"></span></a>';
                    
                    if ( get_post_meta( get_the_ID(), 'team_member_instagram', true) != '')
                        echo '<a target="_BLANK" href="' . get_post_meta( get_the_ID(), 'team_member_instagram', true) . '"><span class="fa fa-instagram"></span></a>';
                    
                    if ( get_post_meta( get_the_ID(), 'team_member_pinterest', true) != '')
                        echo '<a target="_BLANK" href="' . get_post_meta( get_the_ID(), 'team_member_pinterest', true) . '"><span class="fa fa-pinterest-p"></span></a>';
                    
                    if ( get_post_meta( get_the_ID(), 'team_member_phone', true) != '')
                        echo '<a href="tel:' . get_post_meta( get_the_ID(), 'team_member_phone', true) . '"><span class="fa fa-phone"></span></a>';
                    
                    if ( get_post_meta( get_the_ID(), 'team_member_email', true) != '')
                        echo '<a href="mailto:' . get_post_meta( get_the_ID(), 'team_member_email', true) . '"><span class="fa fa-envelope"></span></a>';
              
                    ?>
                    
                </div>
                
            </div>
            
            <div class="col-sm-<?php echo $col_2_width; ?> single-post-right">
                
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    <hr>
                    <div class="job-title-meta">
                        <?php echo get_post_meta( get_the_ID(), 'team_member_title', true); ?> 
                        <span>//</span> 
                        <?php echo get_post_meta( get_the_ID(), 'team_member_phone', true); ?>
                    </div>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    
                    <h2 class="about-heading">About</h2>
                    
                    <?php the_content(); ?>
                    
                    <?php if( null !== get_post_meta( get_the_ID(), 'team_member_skill_bool', true ) && get_post_meta( get_the_ID(), 'team_member_skill_bool', true ) == 'on' ) : ?>
                        <div class="sc_team_skills">
                            
                            <h3 class="skills-title"><?php echo get_post_meta( get_the_ID(), 'team_member_skill_title', true ) ?></h3>
                            
                            <?php if ( get_post_meta( get_the_ID(), 'team_member_skill1', true ) ) : ?>
                                <span class="skill-title"><?php echo get_post_meta( get_the_ID(), 'team_member_skill1', true ); ?></span>
                            <?php endif; ?>

                            <?php if ( get_post_meta( get_the_ID(), 'team_member_skill_value1', true ) ) : ?>
                                <div class="progress" style="width: <?php echo get_post_meta( get_the_ID(), 'team_member_skill_value1', true ); ?>0%">
                                    <span><?php echo get_post_meta( get_the_ID(), 'team_member_skill_value1', true ); ?>0%</span>
                                </div>
                            <?php endif; ?>

                            <?php if ( get_post_meta( get_the_ID(), 'team_member_skill2', true ) ) : ?>
                            <span class="skill-title"><?php echo get_post_meta( get_the_ID(), 'team_member_skill2', true ); ?></span>
                            <?php endif; ?>

                            <?php if ( get_post_meta( get_the_ID(), 'team_member_skill_value2', true ) ) : ?>
                                <div class="progress" style="width: <?php echo get_post_meta( get_the_ID(), 'team_member_skill_value2', true ); ?>0%">
                                    <span><?php echo get_post_meta( get_the_ID(), 'team_member_skill_value2', true ); ?>0%</span>
                                </div>
                            <?php endif; ?>

                            <?php if ( get_post_meta( get_the_ID(), 'team_member_skill3', true ) ) : ?>
                                <span class="skill-title"><?php echo get_post_meta( get_the_ID(), 'team_member_skill3', true ); ?></span>
                            <?php endif; ?>

                            <?php if ( get_post_meta( get_the_ID(), 'team_member_skill_value3', true ) ) : ?>
                                <div class="progress" style="width: <?php echo get_post_meta( get_the_ID(), 'team_member_skill_value3', true ); ?>0%">
                                    <span><?php echo get_post_meta( get_the_ID(), 'team_member_skill_value3', true ); ?>0%</span>
                                </div>
                            <?php endif; ?>

                            <?php if ( get_post_meta( get_the_ID(), 'team_member_skill4', true ) ) : ?>
                                <span class="skill-title"><?php echo get_post_meta( get_the_ID(), 'team_member_skill4', true ); ?></span>
                            <?php endif; ?>

                            <?php if ( get_post_meta( get_the_ID(), 'team_member_skill_value4', true ) ) : ?>
                                <div class="progress" style="width: <?php echo get_post_meta( get_the_ID(), 'team_member_skill_value4', true ); ?>0%">
                                    <span><?php echo get_post_meta( get_the_ID(), 'team_member_skill_value4', true ); ?>0%</span>
                                </div>
                            <?php endif; ?>
                            
                        </div>  
                    <?php endif; ?>
                    
                    <?php if (null !== get_post_meta(get_the_ID(), 'team_member_tags_bool', true) && get_post_meta(get_the_ID(), 'team_member_tags_bool', true) == 'on') : ?>
                        <div class="inner">    
                            <div class="sc-tags">
                                <h3 class="skills-title"><?php echo get_post_meta(get_the_ID(), 'team_member_tags_title', true) ?></h3>
                                <?php $tags = explode(',', get_post_meta(get_the_ID(), 'team_member_tags', true)); ?>
                                <?php if ($tags) : ?>

                                    <?php foreach ($tags as $tag) : ?>

                                        <span class="sc-single-tag"><?php echo $tag; ?></span>

                                    <?php endforeach; ?>

                                <?php endif; ?>

                            </div>  
                        </div>
                    <?php endif; ?>      
                    
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