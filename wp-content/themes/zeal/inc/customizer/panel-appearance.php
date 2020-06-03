<?php

// ---------------------------------------------
// Appearance Panel
// ---------------------------------------------
$wp_customize->add_panel('appearance', array(
    'title' => __('Appearance', 'zeal'),
    'description' => __('Customize your site colors, fonts and other appearance settings', 'zeal'),
    'priority' => 10
));

    // ---------------------------------------------
    // Colors Section
    // ---------------------------------------------
    $wp_customize->add_section('template_width', array(
        'title' => __('Template Width', 'zeal'),
        'panel' => 'appearance',
    ));
    
    // ---------------------------------------------
    // Colors Section
    // ---------------------------------------------
    $wp_customize->add_section('color', array(
        'title' => __('Skin Color', 'zeal'),
        'panel' => 'appearance',
    ));

    $wp_customize->add_setting('zeal_theme_color', array(
        'default' => 'teal',
        'transport' => 'refresh',
        'sanitize_callback' => 'zeal_sanitize_text'
    ));

    $wp_customize->add_control('zeal_theme_color', array(
        'type' => 'radio',
        'section' => 'color',
        'label' => __('Theme Skin Color', 'zeal'),
        'description' => __('Select the theme main color', 'zeal'),
        'choices' => array(
            'green'     => __('Green', 'zeal'),
            'teal'      => __('Teal', 'zeal'),
            'blue'      => __('Blue', 'zeal'),
            'blue2'      => __('Blue', 'zeal'),
            'red'       => __('Red', 'zeal'),            
            'pink'      => __('Pink', 'zeal'),
        )
    ));
    
    // ---------------------------------------------
    // Background Section
    // ---------------------------------------------
    $wp_customize->add_section('background_color', array(
        'title' => __('Background', 'zeal'),
        'panel' => 'appearance',
    ));
    
    
    $wp_customize->add_setting( 'zeal_site_background', array (
        'default'               => 'image',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_text',
    ) );
    
    $wp_customize->add_control( 'zeal_site_background', array(
        'type'                  => 'radio',
        'section'               => 'background_color',
        'label'                 => __( 'Background color or image ?', 'zeal' ),
        'description'           => __( 'Specify whether you would like a to use an image or a color for the background', 'zeal' ),
        'choices'               => array(
            'color'             => __( 'Color', 'zeal' ),
            'image'             => __( 'Image', 'zeal' ),
    ) ) );
    
    $wp_customize->add_setting( 'zeal_bg_color', array (
        'default'               => '#0D0D0D',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_text',
    ) );
    $wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'zeal_bg_color', array(
		'label'      => __( 'Site Background Color', 'zeal' ),
		'section'    => 'background_color',
		'settings'   => 'zeal_bg_color',
	) ) 
    );
    
    $wp_customize->add_setting( 'zeal_bg_image', array (
        'default'               => get_template_directory_uri() . '/inc/images/textures/binding_dark.png',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_bg_image', array (
        'mime_type'             => 'image',
        'settings'              => 'zeal_bg_image',
        'section'               => 'background_color',
        'label'                 => __( 'Site Background Image', 'zeal' ),
        'description'           => __( 'Select the image file that you want to use as the site background', 'zeal' ),        
    ) ) );
    
    // ---------------------------------------------
    // Fonts Section
    // ---------------------------------------------
    $wp_customize->add_section('zeal_fonts_section', array(
        'title' => __('Fonts', 'zeal'),
        'panel' => 'appearance',
    ));
    
        $wp_customize->add_setting('zeal_font_primary', array(
            'default' => 'Oswald, sans-serif',
            'transport' => 'refresh',
            'sanitize_callback' => 'zeal_sanitize_text'
        ));

        $wp_customize->add_control('zeal_font_primary', array(
            'type' => 'select',
            'section' => 'zeal_fonts_section',
            'label' => __('Primary Font', 'zeal'),
            'description' => __('Select the primary font of the theme', 'zeal'),
            'choices' => zeal_fonts()
        ));
    
        $wp_customize->add_setting('zeal_font_secondary', array(
            'default' => 'Titillium Web, sans-serif',
            'transport' => 'refresh',
            'sanitize_callback' => 'zeal_sanitize_text'
        ));

        $wp_customize->add_control('zeal_font_secondary', array(
            'type' => 'select',
            'section' => 'zeal_fonts_section',
            'label' => __('Secondary Font', 'zeal'),
            'description' => __('Select the secondary font of the theme', 'zeal'),
            'choices' => zeal_fonts()
        ));
        
        $wp_customize->add_setting( 'zeal_menu_font_size', array (
            'default'               => 10,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'zeal_sanitize_integer',
        ) );
        $wp_customize->add_control( 'zeal_menu_font_size', array(
            'type'                  => 'number',
            'section'               => 'zeal_fonts_section',
            'label'                 => __( 'Font size of the menu', 'zeal' ),
            'input_attrs'           => array(
                'min' => 8,
                'max' => 72,
                'step' => 2,
        ) ) );
        
        $wp_customize->add_setting( 'zeal_body_font_size', array (
            'default'               => 14,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'zeal_sanitize_integer',
        ) );
        $wp_customize->add_control( 'zeal_body_font_size', array(
            'type'                  => 'number',
            'section'               => 'zeal_fonts_section',
            'label'                 => __( 'Font size of the site body', 'zeal' ),
            'input_attrs'           => array(
                'min' => 8,
                'max' => 72,
                'step' => 2,
        ) ) );