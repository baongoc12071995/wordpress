<?php

// ---------------------------------------------
// Homepage Panel
// ---------------------------------------------
$wp_customize->add_panel( 'homepage', array (
    'title'                 => __( 'Frontpage', 'zeal' ),
    'description'           => __( 'Customize the appearance of your homepage', 'zeal' ),
    'priority'              => 10
) );
    
    
    // ---------------------------------------------
    // Featured Post Section
    // ---------------------------------------------
    $wp_customize->add_section( 'featured_post', array(
        'title'                 => __( 'Featured Post #1', 'zeal'),
        'description'           => __( 'Customize the featured post that appears beneath the banner on your homepage', 'zeal' ),
        'panel'                 => 'homepage'
    ) );

    // ---------------------------------------------
    // Featured Post Section - Settings & Controls
    // ---------------------------------------------
    
    $wp_customize->add_setting( 'zeal_the_featured_post_bool', array (
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_cta_area_toggle',
    ) );
    $wp_customize->add_control( 'zeal_the_featured_post_bool', array(
        'type'                  => 'radio',
        'section'               => 'featured_post',
        'label'                 => __( 'Show Featured Post #1 ?', 'zeal' ),
        'choices'               => array(
            'on'            => __( 'Visible', 'zeal' ),
            'off'           => __( 'Hidden', 'zeal' ),
    ) ) );
    
    // Featured Post - Select the Post
    $wp_customize->add_setting( 'zeal_the_featured_post', array (
        'default'               => null,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_integer',
    ) );
    $wp_customize->add_control( 'zeal_the_featured_post', array(
        'type'                  => 'select',
        'section'               => 'featured_post',
        'label'                 => __( 'Select the Featured Post', 'zeal' ),
        'choices'               => zeal_all_posts_array(),
    ) );
    
    $wp_customize->add_setting( 'zeal_the_featured_post_button', array (
        'default'               => __( 'Read More ...', 'zeal' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_text',
    ) );
    $wp_customize->add_control( 'zeal_the_featured_post_button', array(
        'type'                  => 'text',
        'section'               => 'featured_post',
        'label'                 => __( 'Button Text', 'zeal' ),
    ) );
    
    // ---------------------------------------------
    // Featured Post 2 Section
    // ---------------------------------------------
    $wp_customize->add_section( 'featured_post2', array(
        'title'                 => __( 'Featured Post #2', 'zeal'),
        'description'           => __( 'Customize the featured post that appears on your homepage', 'zeal' ),
        'panel'                 => 'homepage'
    ) );
    
    // ---------------------------------------------
    // Featured Post Section - Settings & Controls
    // ---------------------------------------------
    
    $wp_customize->add_setting( 'zeal_the_featured_post2_bool', array (
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_cta_area_toggle',
    ) );
    $wp_customize->add_control( 'zeal_the_featured_post2_bool', array(
        'type'                  => 'radio',
        'section'               => 'featured_post2',
        'label'                 => __( 'Show Featured Post #2 ?', 'zeal' ),
        'choices'               => array(
            'on'            => __( 'Visible', 'zeal' ),
            'off'           => __( 'Hidden', 'zeal' ),
    ) ) );
    
    // Featured Post - Select the Post
    $wp_customize->add_setting( 'zeal_the_featured_post2', array (
        'default'               => null,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_integer',
    ) );
    $wp_customize->add_control( 'zeal_the_featured_post2', array(
        'type'                  => 'select',
        'section'               => 'featured_post2',
        'label'                 => __( 'Select the Featured Post', 'zeal' ),
        'choices'               => zeal_all_posts_array(),
    ) );
    
    $wp_customize->add_setting( 'zeal_the_featured_post2_button', array (
        'default'               => __( 'Read More ...', 'zeal' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_text',
    ) );
    $wp_customize->add_control( 'zeal_the_featured_post2_button', array(
        'type'                  => 'text',
        'section'               => 'featured_post2',
        'label'                 => __( 'Button Text', 'zeal' ),
    ) );
    

    // ---------------------------------------------
    // Homepage Widget A
    // ---------------------------------------------
    $wp_customize->add_section( 'cta_area_a', array(
        'title'                 => __( 'Homepage A', 'zeal'),
        'panel'                 => 'homepage'
    ) );
    
    // Toggle Visibility of CTA / Widget Area
    $wp_customize->add_setting( 'zeal_cta_a_toggle', array (
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_cta_area_toggle',
    ) );
    $wp_customize->add_control( 'zeal_cta_a_toggle', array(
        'type'                  => 'radio',
        'section'               => 'cta_area_a',
        'label'                 => __( 'Show Front Page CTA / Widget Area?', 'zeal' ),
        'choices'               => array(
            'on'            => __( 'Visible', 'zeal' ),
            'off'           => __( 'Hidden', 'zeal' ),
    ) ) );
    
    $wp_customize->add_setting( 'zeal_cta_a_image', array (
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zeal_cta_a_image', array (
        'label' =>              __( 'Background Image', 'zeal' ),
        'section'               => 'cta_area_a',
        'mime_type'             => 'image',
        'settings'              => 'zeal_cta_a_image',
        'description'           => __( 'You can set an image as a background, or leave blank for default background color', 'zeal' ),
    ) ) );
    
    
    // ---------------------------------------------
    // Portfolio Section
    // ---------------------------------------------
    $wp_customize->add_section( 'portfolio', array(
        'title'                 => __( 'Blog', 'zeal'),
        'description'           => __( 'Customize the portfolio section on your homepage', 'zeal' ),
        'panel'                 => 'homepage'
    ) );
    
// ---------------------------------------------
// Static frontpage
// ---------------------------------------------
$wp_customize->add_section( 'static_front_page', array (
    'title' => __( 'Homepage Content', 'zeal' ),
    'panel' => 'homepage',
) );

    // Toggle Visibility of CTA / Widget Area
    $wp_customize->add_setting( 'zeal_homepage_content_bool', array (
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_cta_area_toggle',
    ) );
    $wp_customize->add_control( 'zeal_homepage_content_bool', array(
        'type'                  => 'radio',
        'section'               => 'static_front_page',
        'label'                 => __( 'Show the frontpage content ?', 'zeal' ),
        'choices'               => array(
            'on'            => __( 'Visible', 'zeal' ),
            'off'           => __( 'Hidden', 'zeal' ),
    ) ) );