<?php
/**
 * Suzaku functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Suzaku
 */

if ( ! function_exists( 'suzaku_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function suzaku_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Suzaku, use a find and replace
	 * to change 'suzaku' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'suzaku', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'suzaku' ),
		'social'  => esc_html__( 'Social Media Menu', 'suzaku' )
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
	 * Custom background support
	 */
	add_theme_support( 'custom-background', apply_filters( 'suzaku_custom_background_args', array(
		'default-image'      => get_template_directory_uri() . '/inc/oranges.jpg',
		'default-attachment' => 'fixed',
		'default-position-x' => 'center'
	) ) );
	
	/*
	 * Add editor styling
	 */
	add_editor_style( array( get_template_directory_uri() . '/inc/css/editor-style.css', suzaku_fonts_url() ) );
}
endif;
add_action( 'after_setup_theme', 'suzaku_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function suzaku_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'suzaku_content_width', 640 );
}
add_action( 'after_setup_theme', 'suzaku_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function suzaku_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'suzaku' ),
		'id'            => 'primary',
		'description'   => esc_html__( 'Add widgets here.', 'suzaku' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'suzaku_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function suzaku_scripts() {
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/inc/genericons/genericons/genericons.css' );
	wp_enqueue_style( 'suzaku-google-fonts', suzaku_fonts_url() );
	wp_enqueue_style( 'suzaku-style', get_stylesheet_uri(), array( 'genericons', 'suzaku-google-fonts' ) );

	wp_enqueue_script( 'suzaku-functions', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), null, true );

	wp_enqueue_script( 'suzaku-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'suzaku_scripts' );

/**
 * Allow users to dequeue Google fonts
 */
function suzaku_fonts_url() {
	$fonts = array();
	$fonts_url = '';
	
	/* translators: If there are characters in your language that are not supported by Fjalla One, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Fjalla One font: on or off', 'suzaku' ) ) {
		$fonts[] = 'Fjalla One:400,400italic,700,700italic';
	}
	
	/* translators: If there are characters in your language that are not supported by Lora, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lora font: on or off', 'suzaku' ) ) {
		$fonts[] = 'Lora:400,400italic,700,700italic';
	}
	
	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'suzaku' ) ) {
		$fonts[] = 'Inconsolata:400';
	}
	
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
		), '//fonts.googleapis.com/css' );
	}
	
	return $fonts_url;
}

/**
 * Override custom background with featured image on single post views
 */
function suzaku_featured_image_background() {
	global $post;
	
	if ( is_single() && has_post_thumbnail( $post->ID ) ) {
		$post_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
		
		if ( get_background_image() ) {
			$style = 'body.single.custom-background { background-image: url(%s); background-size: cover; }';
		} else {
			$style = 'body.single { background-image: url(%s); background-size: cover; }';
		}
		
		wp_add_inline_style( 'suzaku-style', sprintf( $style, $post_image ) );
	}
}
add_action( 'wp_enqueue_scripts', 'suzaku_featured_image_background', 60 );

/**
 * Set up Customizer options
 */
function suzaku_theme_customizer( $wp_customize ) {
	$wp_customize->add_section( 'footer_text', array(
    'title'       => esc_html__( 'Footer Text', 'suzaku' ),
    'description' => esc_html__( 'Text entered in this form will appear in place of the default footer text. A limited amount of HTML may be used.', 'suzaku' ),
    'priority'    => 35
  ) );
  
  $wp_customize->add_setting( 'footer_text', array(
    'default'           => '',
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'suzaku_sanitize_footer'
  ) );
  
  $wp_customize->add_control( 'footer_text', array(
    'label'    => esc_html__( 'Footer Text', 'suzaku' ),
    'section'  => 'footer_text',
    'settings' => 'footer_text',
    'type'     => 'text'
  ) );
}
add_action( 'customize_register', 'suzaku_theme_customizer' );

/**
 * Sanitize footer text from Customizer
 */
function suzaku_sanitize_footer( $value ) {
	if ( $value ) {
		return wp_kses( $value,
			array( 'a' => array( 'href' => array() ),
				'strong' => array(),
				'em'     => array(),
				'span'   => array( 'class' => array() )
			)
		);
	} else {
		return false;
	}
}

if ( ! function_exists( 'suzaku_read_more' ) ) :
/**
 * Since we're using excerpts, let's make them more interesting
 */
function suzaku_read_more( $more ) {
	return sprintf( '&hellip;<a class="read-more" href="%1$s" rel="bookmark">%2$s</a>',
		esc_url( get_permalink() ),
		esc_html__( 'Continue Reading &rarr;', 'suzaku' )
	);
}
endif;
add_filter( 'excerpt_more', 'suzaku_read_more' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
