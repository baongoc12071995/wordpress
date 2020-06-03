<?php

// ---------------------------------------------
// Footer Panel
// ---------------------------------------------
$wp_customize->add_panel( 'footer_panel', array (
    'title'                 => __( 'Footer', 'zeal' ),
    'description'           => __( 'Customize the theme Footer', 'zeal' ),
    'priority'              => 10
) );


    $wp_customize->add_section( 'footer_a', array(
        'title'                 => __( 'Footer A', 'zeal'),
        'panel'                 => 'footer_panel'
    ) );
    
    $wp_customize->add_setting( 'zeal_footer_a_toggle', array (
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_cta_area_toggle',
    ) );
    $wp_customize->add_control( 'zeal_footer_a_toggle', array(
        'type'                  => 'radio',
        'section'               => 'footer_a',
        'label'                 => __( 'Show Footer A Widget Area?', 'zeal' ),
        'choices'               => array(
            'on'            => __( 'Visible', 'zeal' ),
            'off'           => __( 'Hidden', 'zeal' ),
    ) ) );
    
    $wp_customize->add_setting( 'zeal_footer_a_image', array (
        'default'               => get_template_directory_uri() . '/inc/images/zeal-footer.jpg',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zeal_footer_a_image', array (
        'label' =>              __( 'Background Image', 'zeal' ),
        'section'               => 'footer_a',
        'mime_type'             => 'image',
        'settings'              => 'zeal_footer_a_image',
        'description'           => __( 'You can set an image as a background, or leave blank for default background color', 'zeal' ),
    ) ) );
    
    
    // -------------
    // Footer B Section
    // -------------
    
    $wp_customize->add_section( 'footer_b', array(
        'title'                 => __( 'Footer B', 'zeal'),
        'panel'                 => 'footer_panel'
    ) );
    
    $wp_customize->add_setting( 'zeal_footer_b_toggle', array (
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_cta_area_toggle',
    ) );
    $wp_customize->add_control( 'zeal_footer_b_toggle', array(
        'type'                  => 'radio',
        'section'               => 'footer_b',
        'label'                 => __( 'Show Footer B Widget Area?', 'zeal' ),
        'choices'               => array(
            'on'            => __( 'Visible', 'zeal' ),
            'off'           => __( 'Hidden', 'zeal' ),
    ) ) );
    
// ---------------------------------------------
// Footer Panel
// ---------------------------------------------
$wp_customize->add_panel( 'zeal_branding_panel', array (
    'title'                 => __( 'Footer copyright', 'zeal' ),
    'description'           => __( 'Customize the branding in the footer', 'zeal' ),
    'priority'              => 10
) );

    $wp_customize->add_section( 'zeal_smartcat_branding_section', array(
        'title'                 => __( 'Footer Branding', 'zeal'),
        'panel'                 => 'zeal_branding_panel'
    ) );
    
    // Hero Banner Heading Text
    $wp_customize->add_setting( 'zeal_copyright_text', array (
        'default'               => __( 'Copyright Your Company Name','zeal' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_text',
    ) );
    $wp_customize->add_control( 'zeal_copyright_text', array(
        'type'                  => 'text',
        'section'               => 'zeal_smartcat_branding_section',
        'label'                 => __( 'Copyright Text', 'zeal' ),
    ) );