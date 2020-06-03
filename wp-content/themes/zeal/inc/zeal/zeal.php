<?php

$zeal_theme = new Zeal_Theme();

class Zeal_Theme {
    
    public function __construct() {
        $this->zeal_add_hooks();
        
    }
    
    public function zeal_add_hooks(){
        
        add_action( 'wp_enqueue_scripts', array( $this, 'zeal_scripts' ) );
        add_action('wp_head', array( $this, 'zeal_customization_css' ) );
        add_action( 'widgets_init', array( $this, 'zeal_widgets_init' ) );
        add_filter('wp_nav_menu_items', array( $this, 'zeal_customize_nav' ) );
    }
    
    public function zeal_customize_nav ( $items ) {
        
        if( get_theme_mod( 'zeal_search_bool', 'on' ) == 'on' ) :
            $items .= '<li class="menu-item"><a class="zeal-search" href="#search" role="button" data-toggle="modal"><span class="fa fa-search"></span></a></li>';
        endif;
        
        return $items;
        
    }
    
    function zeal_scripts() {

        $fonts = zeal_fonts();

        wp_enqueue_style( 'zeal-style', get_stylesheet_uri() );

        // Fonts
        if( array_key_exists ( get_theme_mod('zeal_font_primary', 'Oswald, sans-serif'), $fonts ) ) :
            wp_enqueue_style('athena-font-primary', '//fonts.googleapis.com/css?family=' . $fonts[get_theme_mod('zeal_font_primary', 'Oswald, sans-serif')], array(), ZEAL_VERSION );
        endif;

        if( array_key_exists ( get_theme_mod('zeal_font_secondary', 'Titillium Web, sans-serif'), $fonts ) ) :
            wp_enqueue_style('athena-theme-secondary', '//fonts.googleapis.com/css?family=' . $fonts[get_theme_mod('zeal_font_secondary', 'Titillium Web, sans-serif')], array(), ZEAL_VERSION );
        endif;

        // Enqueue stylesheets
        
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css', array(), ZEAL_VERSION);
        wp_enqueue_style('fontawesome', get_template_directory_uri() . '/inc/css/font-awesome.min.css', array(), ZEAL_VERSION);
        wp_enqueue_style('slicknav', get_template_directory_uri() . '/inc/css/slicknav.min.css', array(), ZEAL_VERSION);
        wp_enqueue_style('animatecss', get_template_directory_uri() . '/inc/css/animate.css', array(), ZEAL_VERSION);
        wp_enqueue_style('zeal-main-style', get_template_directory_uri() . '/inc/css/style.css', array(), ZEAL_VERSION);
        wp_enqueue_style('zeal-template', get_template_directory_uri() . '/inc/css/temps/' . get_theme_mod( 'zeal_theme_color', 'teal' ) . '.min.css', array(), ZEAL_VERSION);

        wp_enqueue_script('slicknav', get_template_directory_uri() . '/inc/js/jquery.slicknav.min.js', array('jquery'), ZEAL_VERSION, true);
        wp_enqueue_script('wow', get_template_directory_uri() . '/inc/js/wow.min.js', array('jquery'), ZEAL_VERSION, true);
        wp_enqueue_script('zeal-parallax', get_template_directory_uri() . '/inc/js/parallax.min.js', array('jquery'), ZEAL_VERSION, true);
        wp_enqueue_script('zeal-custom', get_template_directory_uri() . '/inc/js/custom.js', array('jquery'), ZEAL_VERSION, true);
        
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }    

    }
    
    function zeal_widgets_init() {

        register_sidebar( array(
            'name'          => esc_html__( 'Homepage A', 'zeal' ),
            'id'            => 'sidebar-front',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="col-sm-12">',
            'after_widget'  => '</div></aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer A', 'zeal' ),
            'id'            => 'sidebar-footer-a',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="col-sm-12">',
            'after_widget'  => '</div></aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer B', 'zeal' ),
            'id'            => 'sidebar-footer',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="col-sm-4">',
            'after_widget'  => '</div></aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );

    }
    
    function zeal_customization_css() { ?>


    <style type="text/css">
        <?php if( get_theme_mod('zeal_site_background', 'image' ) == 'image' ) :  ?>

        body{
            background: url(<?php echo esc_url( get_theme_mod('zeal_bg_image', get_template_directory_uri() . '/inc/images/textures/binding_dark.png' ) ); ?>);
        }
        
        
        <?php else : ?>

        body{
            background: <?php echo esc_attr( get_theme_mod( 'zeal_bg_color', '#414141' ) ); ?>;
        }

        <?php endif; ?>
        
        div#site-branding img.custom-logo{
            height: <?php echo esc_attr( get_theme_mod( 'zeal_logo_size', '65' ) ); ?>px;
        }
        
        .hero-overlay h2,
        #slider-overlay h2{
            font-size: <?php echo esc_attr( get_theme_mod( 'zeal_hero_heading_size', 50 ) ); ?>px;
            color: <?php echo esc_attr( get_theme_mod( 'zeal_jumbo_text_color', '#ffffff' ) ); ?>
        }

        .hero-overlay p.site-tagline,
        #slider-overlay p.site-tagline{
            font-size: <?php echo esc_attr( get_theme_mod( 'zeal_hero_tagline_size', 10 ) ); ?>px;
            color: <?php echo esc_attr( get_theme_mod( 'zeal_jumbo_text_color', '#ffffff' ) ); ?>
        }

        .camera_target_content {
            background-color: <?php echo get_theme_mod( 'zeal_hero_tint_toggle', 'on' ) == 'on' ? esc_attr( get_theme_mod( 'zeal_hero_tint', 'rgba(10, 10, 10, 0.25)' ) ) : esc_attr( 'none' ); ?>
        }

        div.big-hero-buttons button{
            font-size: <?php echo esc_attr( get_theme_mod( 'zeal_jumbo_button_size', 10 ) ); ?>px;
            color: <?php echo esc_attr( get_theme_mod( 'zeal_jumbo_text_color', '#ffffff' ) ); ?>
        }

        .blog-post-overlay h2.post-title{
            font-size: <?php echo esc_attr( get_theme_mod('zeal_blog_title_size', 24 ) ); ?>px;
        }

        .blog-post-overlay .blog-post-read-more {
            font-size: <?php echo esc_attr( get_theme_mod('zeal_blog_link_size', 10 ) ); ?>px;
        }

    <?php if ( get_theme_mod( 'zeal_cta_a_image' ) ) : ?>

            .homepage-a{
                background-image: url(<?php echo esc_url( get_theme_mod( 'zeal_cta_a_image' ) ) ?>);
                background-position: 50%;
                background-size: cover;
            }
            .homepage-a section.homepage-cta-banner div.cta-banner-content h2.widget-title,
            .homepage-a section.homepage-cta-banner div.cta-banner-content div.textwidget,
            .homepage-a section.homepage-cta-banner div.cta-banner-content,
            .homepage-a section.homepage-cta-banner ul#zeal-testimonials .testimonial-content{
                color: #fff;
            }
            .homepage-a section.homepage-cta-banner div.cta-banner-content {
                background: rgba(10,10,10, 0.6);
            }
    <?php else : ?>
            .homepage-a ul#zeal-testimonials .testimonial-content .fa.fa-quote-left,
            .homepage-a ul#zeal-testimonials .testimonial-author{
                color: #fff;
            }
        <?php endif; ?>


    <?php if ( get_theme_mod( 'zeal_footer_a_image', get_template_directory_uri() . '/inc/images/zeal-footer.jpg' ) ) : ?>

            .footer-a{
                background-image: url(<?php echo esc_url( get_theme_mod( 'zeal_footer_a_image', get_template_directory_uri() . '/inc/images/zeal-footer.jpg' ) ) ?>);
                background-position: 50%;
                background-size: cover;
            }
            .footer-a section.homepage-cta-banner div.cta-banner-content h2.widget-title,
            .footer-a section.homepage-cta-banner div.cta-banner-content div.textwidget,
            footer.site-footer > div.container > div.footer-a div.textwidget,
            .footer-a section.homepage-cta-banner div.cta-banner-content{
                color: #fff;
            }
            .footer-a section.homepage-cta-banner div.cta-banner-content {
                background: rgba(10,10,10, 0.6);
            }

    <?php endif; ?>


            .event-blog .event-post .event-details a,
            button, input[type=button], input[type=submit],
            div#site-branding h1 a,
            .hero-overlay h2,
            #slider-overlay h2,
            .hero-overlay p,
            #slider-overlay p,
            section.featured-homepage-post div.click-through-arrow h4,
            div.featured-post-content h2,
            section.homepage-cta-banner div.cta-banner-content h2.widget-title,
            div.homepage-portfolio section.homepage-portfolio > div > h2,
            h2.feature-content-title,
            div.single-post-right > header > h1,
            nav.post-navigation .nav-links a,
            h3#reply-title,
            div#respond p.comment-form-comment label,
            p.no-comments,
            .widget h2.widget-title,
            div.archive-page h1,
            div.archive-page article h2,
            .single-page .single-page-wrapper h1,
            .team-member-wrapper .job-title-meta,
            div.team-member-wrapper h2.about-heading,
            div.team-member-wrapper .sc_team_posts .skills-title,
            div.team-member-wrapper .sc_team_skills span.skill-title,
            div.team-member-wrapper .sc_team_skills .progress,
            div.team-member-wrapper .sc-team-member-posts a,
            .event-blog .event-post .event-details a,
            .event-blog .event-details .location,
            .event-blog .event-details .date,
            ul#zeal-testimonials .testimonial-author,
            .zeal-pricing-table .title,
            .zeal-pricing-table .subtitle{
                font-family: <?php echo esc_attr( get_theme_mod( 'zeal_font_primary', 'Oswald, sans-serif' ) ); ?>;
            }

            body,
            section.homepage-cta-banner div.cta-banner-content,
            div.archive-page h1 span,
            .event-blog .event-post .event-details .secondary-button{
                font-family: <?php echo esc_attr( get_theme_mod( 'zeal_font_secondary', 'Titillium Web, sans-serif' ) ); ?>;
            }

            nav.main-nav a{
                font-size: <?php echo esc_attr( get_theme_mod( 'zeal_menu_font_size', 10 ) ); ?>px;
            }

            body {
                font-size: <?php echo esc_attr( get_theme_mod( 'zeal_body_font_size', 14 ) ); ?>px;
            }

            section.front-page-hero,
            div.col-md-12.hero-banner{
                height: <?php echo esc_attr( get_theme_mod( 'zeal_slider_height', 450 ) ); ?>px;
            }
        
    </style>

    <?php }
    
}



function zeal_jumbotron() { ?>
    
    <?php if( get_theme_mod( 'zeal_slider_bool', 'on' ) == 'on' ) : ?>
    <section class="front-page-hero">

        <?php if( get_theme_mod( 'zeal_slide_type', 'static') == '#' ) : ?>
        <?php else : ?>


            <div data-stellar-background-ratio="0.5" class="zeal-parallax col-md-12 hero-banner <?php echo get_theme_mod( 'zeal_hero_background_style', 'image' ) == 'color' ? esc_attr( 'zeal-bg-img-none' ) : esc_attr( '' ); ?>"
                style="background-color: <?php echo esc_attr( get_theme_mod( 'zeal_hero_bg_color', '#0D0D0D' ) ); ?>;
                    background-image: url(<?php echo esc_url( get_theme_mod( 'zeal_hero_image', get_template_directory_uri() . '/inc/images/zeal-demo.jpg' ) ); ?>)">

                <div class="hero-overlay" style="background-color: <?php echo get_theme_mod( 'zeal_hero_tint_toggle', 'on' ) == 'on' ? esc_attr( get_theme_mod( 'zeal_hero_tint', 'rgba(10, 10, 10, 0.25)' ) ) : esc_attr( 'none' ); ?>">

                    <?php zeal_jumbotron_text(); ?>

                </div>

            </div>              
        <?php endif; ?>

    </section>
    <?php endif; ?>

<?php }


function zeal_homepage_posts() { ?>
    
    <!-- Featured post #1 -->
    <?php if( get_theme_mod( 'zeal_the_featured_post_bool', 'on' ) == 'on' ) : ?>
    <section class="featured-homepage-post">

        <?php $featured_post = get_theme_mod( 'zeal_the_featured_post', null ) == null ? null : get_post( get_theme_mod( 'zeal_the_featured_post', null ) ); ?>

        <?php
            if ( ! is_null( $featured_post ) && has_post_thumbnail( $featured_post->ID ) ) :
                $image = get_the_post_thumbnail_url( $featured_post->ID );
            else :
                $image = get_template_directory_uri() . '/inc/images/jesse1.jpg';
            endif;
        ?>

        <a href="<?php echo is_null( $featured_post ) ? esc_attr( '#' ) : esc_url( get_permalink( $featured_post->ID ) ); ?>">
            <div class="col-sm-6 featured-post-image" style="background-image: url(<?php echo esc_url( $image ); ?>);">
            </div>
        </a>

        <div class="col-sm-6 featured-post-content">

            <h2 class="wow fadeInUp"><?php echo is_null( $featured_post ) ? esc_html__( 'Select a Featured Post to Have it Displayed Here', 'zeal' ) : ( $featured_post->post_title ); ?></h2>

            <div class="wow fadeInUp">
                <?php echo is_null( $featured_post ) ? esc_html__( 'You may use the built in WordPress Customizer to modify which post appears here.', 'zeal' ) : apply_filters( 'the_content', $featured_post->post_content ); ?>
            </div>

            <div class="featured-post-overlay">
            </div>    

            <a href="<?php echo is_null( $featured_post ) ? esc_url( '#' ) : esc_url( get_permalink( $featured_post->ID ) ); ?>">
                <div class="click-through-arrow">

                    <h4 class="wow fadeIn"><?php echo esc_html( get_theme_mod( 'zeal_the_featured_post_button', __( 'Read More ...', 'zeal' ) ) ); ?></h4>

                </div>
            </a>

        </div>

    </section>
    <?php endif; ?>
    <!-- End Featured post #1 -->

    <!-- Featured post #2 -->
    <?php if( get_theme_mod( 'zeal_the_featured_post2_bool', 'on' ) == 'on' ) : ?>
    <section class="featured-homepage-post">

        <?php $featured_post = get_theme_mod( 'zeal_the_featured_post2', null ) == null ? null : get_post( get_theme_mod( 'zeal_the_featured_post2', null ) ); ?>

        <?php
            if ( ! is_null( $featured_post ) && has_post_thumbnail( $featured_post->ID ) ) :
                $image = get_the_post_thumbnail_url( $featured_post->ID );
            else :
                $image = get_template_directory_uri() . '/inc/images/jesse2.jpg';
            endif;
        ?>

        <div class="col-sm-6 featured-post-content">

            <h2 class="wow fadeInUp"><?php echo is_null( $featured_post ) ? esc_html__( 'Select a Featured Post to Have it Displayed Here', 'zeal' ) : ( $featured_post->post_title ); ?></h2>

            <div class="wow fadeInUp">
                <?php echo is_null( $featured_post ) ? esc_html__( 'You may use the built in WordPress Customizer to modify which post appears here.', 'zeal' ) : ( apply_filters( 'the_content', $featured_post->post_content ) ); ?>
            </div>

            <div class="featured-post-overlay">
            </div>    

            <a href="<?php echo is_null( $featured_post ) ? esc_url( '#' ) : esc_url( get_permalink( $featured_post->ID ) ); ?>">
                <div class="click-through-arrow">

                    <h4 class="wow fadeIn"><?php echo esc_html( get_theme_mod('zeal_the_featured_post2_button', __( 'Read More ...', 'zeal' ) ) ); ?></h4>

                </div>
            </a>

        </div>

        <a href="<?php echo is_null( $featured_post ) ? esc_url( '#' ) : esc_url( get_permalink( $featured_post->ID ) ); ?>">
            <div class="col-sm-6 featured-post-image" style="background-image: url(<?php echo esc_url( $image ); ?>);">
            </div>
        </a>

    </section>
    <?php endif; ?>
    <!-- End Featured post #2 -->


<?php }

function zeal_homepage_widgets(){ ?>
<!-- Homepage A -->
    <?php if ( get_theme_mod( 'zeal_cta_a_toggle', 'on' ) == 'on' ) : ?>

        <div data-stellar-background-ratio="0.5" class="zeal-parallax row homepage-a homepage-cta-background">

            <section class="homepage-cta-banner wow fadeInUp">

                <div class="col-sm-12 homepage-cta-banner">

                    <div class="cta-banner-content">

                        <?php if ( ! is_active_sidebar( 'sidebar-front' ) ) : ?>

                            <h2 class="widget-title">
                                <?php _e( 'Homepage A Widget', 'zeal' ); ?>
                            </h2>
                            <div class="textwidget">
                                <?php _e( 'You can enable/disable this widget from Customizer - Frontpage - Homepage Widget A. You can also set the background image to your preference. This is a widget placeholder, and you can add any widget to it from Customizer - Widgets.', 'zeal' ); ?>
                            </div>

                        <?php else : ?>

                            <?php get_sidebar( 'front' ); ?>

                        <?php endif; ?>

                    </div>

                </div>

            </section>

        </div> <!-- CTA BACKGROUND ROW -->

    <?php endif; ?>


<?php }

/**
 * Render the homepage layout.
 */
function zeal_render_homepage() { ?>

    <div class="container">

        <div class="row homepage-background">
            
            <?php zeal_jumbotron(); ?>
            <?php zeal_homepage_posts(); ?>
        
        </div> <!-- FEATURED POST BACKGROUND ROW -->
        
        <?php zeal_homepage_widgets(); ?>
        
            
    </div> <!-- CONTAINER -->

<?php }
add_action( 'zeal_homepage', 'zeal_render_homepage' );

/**
 * Render the footer.
 */
function zeal_render_footer() { ?>

    <div class="container">
        
        <!-- Footer A -->
        <?php if ( get_theme_mod( 'zeal_footer_a_toggle', 'on' ) == 'on' ) : ?>
        
            <div data-stellar-background-ratio="0.5" class="zeal-parallax row footer-a">

                <section class="homepage-cta-banner wow fadeInUp">

                    <div class="col-sm-12 homepage-cta-banner">

                        <div class="cta-banner-content">

                            <?php if ( ! is_active_sidebar( 'sidebar-footer-a' ) ) : ?>

                                <h2 class="widget-title">
                                    <?php _e( 'Footer A Widget', 'zeal' ); ?>
                                </h2>
                                <div class="textwidget">
                                    <?php _e( 'You can enable/disable this widget from Customizer - Footer - Footer A. You can also set the background image to your preference. This is a widget placeholder, and you can add any widget to it from Customizer - Widgets.', 'zeal' ); ?>
                                </div>

                            <?php else : ?>

                                <?php get_sidebar( 'footer_a' ); ?>

                            <?php endif; ?>

                        </div>

                    </div>

                </section>

            </div> <!-- CTA BACKGROUND ROW -->
            
        <?php endif; ?>
        
        <!-- Footer B -->
        
        <div class="row footer-b">

            <div class="col-md-12 wow fadeIn">
                <?php if ( get_theme_mod( 'zeal_footer_b_toggle', 'on' ) == 'on' ) : ?>
                <?php get_sidebar( 'footer' ); ?>
                 <?php endif; ?>
                <div class="">
                    
                    <p class="footer" style="display: block !important">
                        <?php _e( 'Designed by Smartcat', 'zeal' ); ?> <img src="<?php echo esc_url( get_template_directory_uri() . "/inc/images/smartcat-30x33.png" ); ?>" alt="Smartcat">
                    </p>
                    
                    <p class="footer">
                        <?php echo esc_html( get_theme_mod( 'zeal_copyright_text', __( 'Copyright Your Company Name ', 'zeal' ) ) ); ?>
                    </p>
                    
                </div>

            </div>

        </div>
       
        
        <div class="scroll-top alignright">
            <span class="fa fa-chevron-up"></span>
        </div>

    </div>

<?php }
add_action( 'zeal_footer', 'zeal_render_footer' );

function zeal_custom_css() { ?>

    <style type="text/css">
        
        .hero-overlay h2 {
            font-size: <?php echo esc_attr( get_theme_mod( 'zeal_hero_heading_size', 50 ) ); ?>px;
        }
        
        .hero-overlay p.site-tagline {
            font-size: <?php echo esc_attr( get_theme_mod( 'zeal_hero_tagline_size', 10 ) ); ?>px;
        }
        
    </style>
    
<?php }
add_action('wp_head', 'zeal_custom_css');

function hex2rgba( $color, $opacity = false ) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if ( empty( $color ) )
            return $default; 
 
	//Sanitize $color if "#" is provided 
        if ( $color[0] == '#' ) {
            $color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if ( strlen( $color ) == 6) {
            $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
            $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
            return $default;
        }
 
        // Convert hexadec to rgb
        $rgb =  array_map( 'hexdec', $hex );
 
        // Check if opacity is set(rgba or rgb)
        if( $opacity ){
            if( abs( $opacity ) > 1 )
                $opacity = 1.0;
            $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
            $output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
        
}

function zeal_jumbotron_text () { ?>
    
    <h2 class="wow fadeInDown"><?php echo esc_html( get_theme_mod( 'zeal_hero_heading', __( 'Zeal', 'zeal' ) ) ); ?></h2>
    <p class="site-tagline wow fadeInUp"><?php echo esc_html( get_theme_mod( 'zeal_hero_tagline', __( 'Designed by Smartcat', 'zeal' ) ) ); ?></p>

    <div class="big-hero-buttons wow fadeInUp">
        
        <?php if( get_theme_mod( 'zeal_hero_button_1_text', __( 'View Demo', 'zeal' ) ) ) : ?>
        <a href="<?php if ( get_theme_mod( 'zeal_hero_button_1_url', null ) ) : ?>
                <?php echo esc_url( get_theme_mod( 'zeal_hero_button_1_url', null ) ); ?>
            <?php else : ?>
                <?php echo esc_url( get_permalink( get_theme_mod( 'zeal_hero_button_1_internal', '#' ) ) ); ?>
            <?php endif; ?>">
            <button class="hero-button-1 dark-btn">
                <?php echo esc_html( get_theme_mod( 'zeal_hero_button_1_text', __( 'View Demo', 'zeal' )  ) ); ?>
            </button>
            
        </a>
        <?php endif; ?>

        <?php if( get_theme_mod( 'zeal_hero_button_2_text', __( 'View Portfolio', 'zeal' ) ) ) : ?>
        <a href="<?php if ( get_theme_mod( 'zeal_hero_button_2_url', null ) ) : ?>
            <?php echo esc_url( get_theme_mod( 'zeal_hero_button_2_url', null ) ); ?>
            <?php else : ?>
                <?php echo esc_url( get_permalink( get_theme_mod( 'zeal_hero_button_2_internal', '#' ) ) ); ?>
            <?php endif; ?>">
            <button class="hero-button-2 dark-btn">
                <?php echo esc_html( get_theme_mod( 'zeal_hero_button_2_text', __( 'View Portfolio', 'zeal' )  ) ); ?>
            </button>
        </a>
        <?php endif; ?>

    </div>
    
<?php }
