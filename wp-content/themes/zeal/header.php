<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zeal
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
    
<div id="zeal-search" class="noshow">

    <span class="fa fa-close"></span>

    <div class="row animated slideInDown">

        <span class="fa fa-search"></span>

        <?php get_search_form( ); ?>

    </div>

</div>
    
<div id="page" class="site">
    
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'zeal' ); ?></a>

    <header id="masthead" class="site-header" role="banner">
           
        <div class="container">
            
            <div class="row">
            
                <div class="col-sm-12">
                
                    <nav class="main-nav main-navigation">

                        <div id="site-branding">
                            
                            <div>
                            
                                <h1 class="header-title <?php echo get_theme_mod( 'zeal_logo_or_title', 'title' ) == 'title' ? esc_attr( '' ) : esc_attr( 'zeal-hidden' ); ?>">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html( bloginfo( 'name' ) ); ?></a>
                                </h1>
                                
                                <p class="header-description <?php echo get_theme_mod( 'zeal_tagline_toggle', 'show' ) == 'show' && get_theme_mod( 'zeal_logo_or_title', 'title' ) == 'title' ? esc_attr( '' ) : esc_attr( 'zeal-hidden' ); ?>">
                                    <?php esc_html( bloginfo( 'description' ) ); ?>
                                </p>
                                <span class="<?php echo get_theme_mod( 'zeal_logo_or_title', 'title' ) == 'logo' ? esc_attr( '' ) : esc_attr( 'zeal-hidden' ); ?>">
                                    <?php the_custom_logo(); ?>
                                </span>
                                
                            </div>
                            
                        </div>
                        
                        <div class="container">
                                
                                <?php if ( has_nav_menu( 'primary' ) ) : ?>

                                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>

                                <?php else : ?>

                                    <div class="menu-testing-menu-container">

                                        <ul id="primary-menu" class="menu">

                                            <li class="menu-item menu-item-type-custom menu-item-object-custom">
                                                
                                                <?php if( current_user_can( 'publish_posts' ) ) : ?>
                                                <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>">
                                                   <?php echo __( 'ADD A PRIMARY MENU?', 'zeal' ); ?>
                                                </a>
                                                <?php else : ?>
                                                <a><?php echo __( 'Primary Menu', 'zeal' ); ?></a>
                                                <?php endif; ?>
                                            </li>

                                        </ul>

                                    </div>

                                <?php endif; ?>

                        </div>

                    </nav>
                    
                </div>
                
            </div>
            
        </div>
        
    </header><!-- #masthead -->

    <div id="content" class="site-content">
