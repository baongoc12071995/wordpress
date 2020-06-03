<?php
/**
 * Travellator functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Travellator
 * @since Travellator 1.0
 */

if ( ! function_exists( 'travellator_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function travellator_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Travellator, use a find and replace
	 * to change 'travellator' to the name of your theme in all the template files.
	 */

	load_theme_textdomain( 'travellator', get_template_directory() . '/languages' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'html5', array( 'gallery', 'caption' ) );
	add_theme_support( 'title-tag' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_editor_style();
	add_image_size( 'travellator-widget-post-thumb',  80, 80, true );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */

	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'travellator' ),
		'footer' => esc_html__( 'Footer Menu', 'travellator' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'travellator_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}

endif; // travellator_setup
add_action( 'after_setup_theme', 'travellator_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

function travellator_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'travellator_content_width', 640 );
}

add_action( 'after_setup_theme', 'travellator_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function travellator_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'travellator' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer One', 'travellator' ),
		'id' => 'footer-one-widget',
		'before_widget' => '<div id="footer-one" class="widget footer-widget">',
		'after_widget' => "</div>",
		'before_title' => '<h1>',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Two', 'travellator' ),
		'id' => 'footer-two-widget',
		'before_widget' => '<div id="footer-two" class="widget footer-widget">',
		'after_widget' => "</div>",
		'before_title' => '<h1>',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Three', 'travellator' ),
		'id' => 'footer-three-widget',
		'before_widget' => '<div id="footer-three" class="widget footer-widget">',
		'after_widget' => "</div>",
		'before_title' => '<h1>',
		'after_title' => '</h1>',
	) );
}

add_action( 'widgets_init', 'travellator_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function travellator_scripts() {
	wp_enqueue_script( 'travellator-responsive-js', get_template_directory_uri() . '/js/responsive.js', array( 'jquery' ) );
	wp_enqueue_script( 'prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.min.js', array('jquery'));
	wp_enqueue_script( 'travellator-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'travellator-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'travellator-ie-responsive', get_template_directory_uri() . "/js/ie-responsive.js");

	wp_enqueue_style( 'travellator-responsive', get_template_directory_uri() .'/assets/css/responsive.css', array(), false ,'screen' );
	wp_enqueue_style( 'google-fonts', travellator_fonts_url(), array(), null );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css' );
	wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() .'/assets/css/prettyPhoto.css' );

	wp_enqueue_style( 'travellator-style', get_stylesheet_uri() );

	wp_enqueue_script( 'travellator-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	$slider_speed = 6000;
	if ( get_theme_mod( 'travellator_slider_speed_setting' ) ) {
		$slider_speed = get_theme_mod( 'travellator_slider_speed_setting' ) ;
	}
	wp_localize_script( "travellator-custom-js", "slider_speed", array('vars' => $slider_speed) );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'travellator_scripts' );

add_filter('wp_get_attachment_link', 'travellator_add_rel_attribute');
function travellator_add_rel_attribute($link) {
	global $post;
	return str_replace('<a href', '<a rel="prettyPhoto[gallery]" href', $link);
}

if ( ! function_exists( 'travellator_fonts_url' ) ) :
function travellator_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'travellator' ) ) {
		$fonts[] = 'Lato:400,100,300,700,900';
	}
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

require get_template_directory() . '/inc/widget.php';


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

