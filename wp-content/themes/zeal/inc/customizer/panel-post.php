<?php

// ---------------------------------------------
// Single Post Panel
// ---------------------------------------------
$wp_customize->add_panel( 'single_post', array (
    'title'                 => __( 'Single Post', 'zeal' ),
    'description'           => __( 'Customize the single post template', 'zeal' ),
    'priority'              => 10
) );

// ---------------------------------------------
// Single Post Layout Section
// ---------------------------------------------
$wp_customize->add_section( 'layout', array(
    'title'                 => __( 'Layout', 'zeal'),
    'description'           => __( 'Customize the layout of your post template', 'zeal' ),
    'panel'                 => 'single_post'
) );

// ---------------------------------------------
// Single Post Layout Section - Settings & Controls
// ---------------------------------------------

    // Adjust Column Width Ratio
    $wp_customize->add_setting( 'zeal_post_column_ratio', array (
        'default'               => 'four-eight',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_post_column_ratio',
    ) );
    $wp_customize->add_control( 'zeal_post_column_ratio', array(
        'type'                  => 'radio',
        'section'               => 'layout',
        'label'                 => __( 'Column Width Ratio ( Image:Content )', 'zeal' ),
        'description'           => __( 'Specify the width ratio for the image and content columns. The two column widths must add up to 12.', 'zeal' ),
        'choices'               => array(
            'three-nine'    => __( '3:9', 'zeal' ),
            'four-eight'    => __( '4:8', 'zeal' ),
            'six-six'       => __( '6:6', 'zeal' ),
    ) ) );
    
    // Show author
    $wp_customize->add_setting( 'zeal_single_author', array (
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_comments_toggle',
    ) );
    $wp_customize->add_control( 'zeal_single_author', array(
        'type'                  => 'radio',
        'section'               => 'layout',
        'label'                 => __( 'Turn Author display On / Off', 'zeal' ),
        'choices'               => array(
            'on'        => __( 'Show Author', 'zeal' ),
            'off'       => __( 'Do not show Author', 'zeal' ),
    ) ) );
    
    // Show Date
    $wp_customize->add_setting( 'zeal_single_date', array (
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_comments_toggle',
    ) );
    $wp_customize->add_control( 'zeal_single_date', array(
        'type'                  => 'radio',
        'section'               => 'layout',
        'label'                 => __( 'Turn Date display On / Off', 'zeal' ),
        'choices'               => array(
            'on'        => __( 'Show Post Date', 'zeal' ),
            'off'       => __( 'Do not show Post Date', 'zeal' ),
    ) ) );
    
    // Show Categories
    $wp_customize->add_setting( 'zeal_single_categories', array (
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_comments_toggle',
    ) );
    $wp_customize->add_control( 'zeal_single_categories', array(
        'type'                  => 'radio',
        'section'               => 'layout',
        'label'                 => __( 'Turn Category  display On / Off', 'zeal' ),
        'choices'               => array(
            'on'        => __( 'Show Post Categories', 'zeal' ),
            'off'       => __( 'Do not show Post Categories', 'zeal' ),
    ) ) );
    
    // Show Tags
    $wp_customize->add_setting( 'zeal_single_tags', array (
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'zeal_sanitize_comments_toggle',
    ) );
    $wp_customize->add_control( 'zeal_single_tags', array(
        'type'                  => 'radio',
        'section'               => 'layout',
        'label'                 => __( 'Turn Tags  display On / Off', 'zeal' ),
        'choices'               => array(
            'on'        => __( 'Show Post Tags', 'zeal' ),
            'off'       => __( 'Do not show Post Tags', 'zeal' ),
    ) ) );
