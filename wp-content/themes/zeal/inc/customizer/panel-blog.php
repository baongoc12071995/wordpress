<?php
// ---------------------------------------------
// Blog Panel
// ---------------------------------------------
$wp_customize->add_panel( 'blog_panel', array (
    'title'                 => __( 'Blog', 'zeal' ),
    'description'           => __( 'Customize the blog template', 'zeal' ),
    'priority'              => 10
) );

// ---------------------------------------------
// Blog Layout Section
// ---------------------------------------------
$wp_customize->add_section( 'blog_layout', array(
    'title'                 => __( 'Layout', 'zeal'),
    'description'           => __( 'Customize the layout of your blog template', 'zeal' ),
    'panel'                 => 'blog_panel'
) );

    // ---------------------------------------------
    // Portfolio Section - Settings & Controls
    // ---------------------------------------------
    
    // Hero Banner Heading Text
    $wp_customize->add_setting( 'zeal_portfolio_section_name', array (
        'default'               => __( 'Blog', 'zeal' ),
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'zeal_sanitize_text',
    ) );
    $wp_customize->add_control( 'zeal_portfolio_section_name', array(
        'type'                  => 'text',
        'section'               => 'blog_layout',
        'label'                 => __( 'Blog Section Heading', 'zeal' ),
    ) );
    
    // Title size
    $wp_customize->add_setting( 'zeal_blog_title_size', array (
        'default'               => 24,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_integer',
    ) );
    $wp_customize->add_control( 'zeal_blog_title_size', array(
        'type'                  => 'number',
        'section'               => 'blog_layout',
        'label'                 => __( 'Post Title font size', 'zeal' ),
        'input_attrs'           => array(
            'min' => 10,
            'max' => 72,
            'step' => 2,
    ) ) );
    
    // 
    $wp_customize->add_setting( 'zeal_blog_link_size', array (
        'default'               => 10,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_integer',
    ) );
    $wp_customize->add_control( 'zeal_blog_link_size', array(
        'type'                  => 'number',
        'section'               => 'blog_layout',
        'label'                 => __( 'Post Link font size', 'zeal' ),
        'input_attrs'           => array(
            'min' => 6,
            'max' => 72,
            'step' => 2,
    ) ) );
    
    $wp_customize->add_setting( 'zeal_blog_link_text', array (
        'default'               => __( 'Read More', 'zeal' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_text',
    ) );
    $wp_customize->add_control( 'zeal_blog_link_text', array(
        'type'                  => 'text',
        'section'               => 'blog_layout',
        'label'                 => __( 'Link text', 'zeal' ),
    ) );