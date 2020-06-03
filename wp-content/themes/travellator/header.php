<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travellator
 * @since Travellator 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'travellator' ); ?></a>

	<div id="branding-wrapper">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-12">
                    <header id="masthead" class="site-header" role="banner">
                        <div class="site-branding">
							
                            <?php 
								if ( function_exists( 'the_custom_logo' ) ) {
									the_custom_logo();
								}
							?>
                            	
                             	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            	<p class="site-description"><?php bloginfo( 'description' ); ?></p>
                        </div><!-- .site-branding -->

                        <nav id="site-navigation" class="toogle-navigation">
                           <i class="fa fa-bars"></i>
                        </nav><!-- #site-navigation -->
                    </header><!-- #masthead -->
                </div>
            </div>
        </div>
    </div>
   
	 <?php if(is_home() || is_front_page()){ ?>
		<?php get_template_part( 'template-parts/slider' ) ?>
    <?php } ?>	

	<div id="content" class="site-content">

