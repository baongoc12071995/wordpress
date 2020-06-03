<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Suzaku
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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'suzaku' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php if ( is_active_sidebar( 'primary' ) || has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
			<button class="panel-toggle" aria-expanded="false"><span class="screen-reader-text"><?php esc_html_e( 'Show', 'suzaku' ); ?></span></button>
			<div class="panel closed">
				<div class="search-wrapper">
					<i class="genericon genericon-search"></i>
					<?php get_search_form(); ?>
				</div><!-- .search-wrapper -->
				
				<?php if ( has_nav_menu( 'social' ) ) : ?>
					<nav id="social-menu" class="social-navigation" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'social', 'container' => false, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>' ) ); ?>
					</nav><!-- #social-menu -->
				<?php
				endif;
				
				if ( has_nav_menu( 'primary' ) ) :
				?>
					<nav id="primary-menu" class="site-navigation" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) ); ?>
					</nav><!-- #primary-menu -->
				<?php
				endif;
				
				if ( is_active_sidebar( 'primary' ) ) {
					get_sidebar();
				}
				?>
			</div><!-- .panel -->
		<?php
		endif;
		
		if ( is_front_page() && is_home() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php
		endif;

		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
		<?php endif; ?>
	</header><!-- #masthead -->

	<div class="window"></div>
	<div id="content" class="site-content">
