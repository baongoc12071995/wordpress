<?php
/**
 * Zeal Theme Customizer.
 *
 * @package Zeal
 */

function zeal_enqueue_customizer_styles() {
    wp_enqueue_script( 'zeal-customizer-js', get_template_directory_uri() . '/inc/js/customizer.js', array( 'jquery', 'customize-controls' ), ZEAL_VERSION, true );
    wp_enqueue_style('zeal-customizer-css', get_template_directory_uri() . '/inc/css/customizer.css', array(), ZEAL_VERSION);
}
add_action( 'customize_controls_enqueue_scripts', 'zeal_enqueue_customizer_styles' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function zeal_customize_register( $wp_customize ) {
    
    
        // Resets
        $wp_customize->remove_section( 'static_front_page' );
        $wp_customize->remove_section( 'title_tagline' );

        // General Panel
        require_once('customizer/panel-general.php');
        
        // Jumbotron
        require_once('customizer/panel-jumbotron.php');

        // Homepage Panel
        require_once('customizer/panel-homepage.php');

        // Single Post Panel
        require_once('customizer/panel-post.php');
        
        // Blog Panel
        require_once('customizer/panel-blog.php');
        
        // Appearance Panel
        require_once('customizer/panel-appearance.php');
        
        // Footer Panel
        require_once('customizer/panel-footer.php');

        // Typography Panel
        // require_once('customizer/panel-typography.php');
    
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
        
}

add_action( 'customize_register', 'zeal_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

function zeal_customize_preview_js() {
	wp_enqueue_script( 'zeal_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), ZEAL_VERSION, true );
}
add_action( 'customize_preview_init', 'zeal_customize_preview_js' );

function zeal_all_posts_array() {
    
    $posts = get_posts( array(
        'post_type'        => 'post',
        'posts_per_page'   => -1,
        'post_status'      => 'publish',
        'orderby'          => 'title',
        'order'             => 'ASC',
    ));

    $posts_array = array();

    foreach ( $posts as $post ) :
        
        if ( ! empty( $post->ID ) ) :
            $posts_array[ $post->ID ] = $post->post_title;
        endif;
        
    endforeach;
    
    return $posts_array;
    
}

function zeal_fonts() {

    $font_family_array = array(

        'Lobster Two, cursive' => 'Lobster+Two',
        'Impact, Charcoal, sans-serif' => 'Impact',
        'MS Sans Serif, Geneva, sans-serif' => 'MS Sans Serif',
        'MS Serif, New York, serif' => 'MS Serif',
        'Open Sans, sans-serif' => 'Open Sans',
        'Palatino Linotype, Book Antiqua, Palatino, serif' => 'Palatino Linotype',
        'Source Sans Pro, sans-serif' => 'Source Sans Pro',
        'Lobster Two, cursive' => 'Lobster+Two',
        'Montserrat, sans-serif' => 'Montserrat:400,700',
        'Shadows Into Light, cursive' => 'Shadows+Into+Light',
        'Orbitron, sans-serif' => 'Orbitron',
        'Oswald, sans-serif' => 'Oswald:300',
        'Titillium Web, sans-serif' => 'Titillium+Web:400,200,300,600,700,200italic,300italic,400italic,600italic,700italic'
    );
    
    return $font_family_array;
}


function zeal_sanitize( $input ) {
    return $input;
}

function zeal_sanitize_text( $input ) {
    return sanitize_text_field( $input );
}

function zeal_sanitize_url( $input ) {
    return esc_url_raw( $input );
}

function zeal_sanitize_integer( $input ) {
    return intval( $input );
}


function zeal_sanitize_filter_color( $input ) {
    return hex2rgba( $input, 0.25 );  
}

function zeal_sanitize_comments_toggle( $input ) {
    
    $valid_keys = array(
        'on'        => __( 'Allow Comments', 'zeal' ),
        'off'       => __( 'No Comments', 'zeal' ),
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function zeal_sanitize_background_toggle( $input ) {
    $valid_keys = array(
        'image' => __( 'Use a background image', 'zeal' ),
        'color' => __( 'Use a solid color background', 'zeal' ),
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
}

function zeal_sanitize_post_column_ratio( $input ) {
    $valid_keys = array(
        'three-nine'    => __( '3:9', 'zeal' ),
        'four-eight'    => __( '4:8', 'zeal' ),
        'six-six'       => __( '6:6', 'zeal' ),
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
}

function zeal_sanitize_tint_toggle( $input ) {
    
    $valid_keys = array(
        'on'            => __( 'Apply Filter', 'zeal' ),
        'off'           => __( 'No Filter', 'zeal' ),
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function zeal_sanitize_logo_or_title_switch( $input ) {
    
    $valid_keys = array(
        'title'         => __( 'Use Site Title', 'zeal' ),
        'logo'          => __( 'Use Logo', 'zeal' ),
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function zeal_sanitize_show_hide( $input ) {
    
    $valid_keys = array(
        'show'          => __( 'Show', 'zeal' ),
        'hide'          => __( 'Hide', 'zeal' ),
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function zeal_sanitize_cta_area_toggle( $input ) {
    
    $valid_keys = array(
        'on'            => __( 'Visible', 'zeal' ),
        'off'           => __( 'Hidden', 'zeal' ),
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}
