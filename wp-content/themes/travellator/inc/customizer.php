<?php
/**
 * Travellator Theme Customizer.
 *
 * @package Travellator
 * @since Travellator 1.0
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function travellator_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
}

add_action( 'customize_register', 'travellator_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function travellator_customize_preview_js() {
	wp_enqueue_script( 'travellator_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'travellator_customize_preview_js' );

if (!function_exists( 'travellator_theme_customizer' ) ) :
	function travellator_theme_customizer( $wp_customize ) {
		function travellator_sanitize_text_field( $str ) {
			return sanitize_text_field( $str );
		}

		function travellator_sanitize_textarea( $text ) {
			return esc_textarea( $text );
		}
		
		/* color option */
		$wp_customize->add_setting( 'travellator_link_color_setting', array (
			'default'     => '6dc234',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travellator_link_color', array(
			'label'    => __( 'Link Color Option', 'travellator' ),
			'section'  => 'colors',
			'settings' => 'travellator_link_color_setting',
		) ) );

		$wp_customize->add_panel( 'travellator_home_featured_panel', array(
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __('Home Page Features', 'travellator'),
			'description'    => '',
		) );
		//slider
		$wp_customize->add_section( 'travellator_slider_section' , array(
			'title'       => __( 'Slider', 'travellator' ),
			'priority'    => 20,
			'description' => __( '', 'travellator' ),
			'panel'  => 'travellator_home_featured_panel',
		) );

		$wp_customize->add_setting('travellator_display_slider_setting', array(
			'default'        => 1,
			'sanitize_callback' => 'travellator_sanitize_checkbox',
		));

		$wp_customize->add_control('travellator_display_slider_control', array(
			'settings' => 'travellator_display_slider_setting',
			'label'    => __('Display Slider', 'travellator'),
			'section'  => 'travellator_slider_section',
			'type'     => 'checkbox',
			'priority'	=> 24
		));

				
		$categories = get_categories();
				$cats = array();
				$i = 0;
				foreach($categories as $category){
					if($i==0){
						$default = $category->slug;
						$i++;
					}
					$cats[$category->slug] = $category->name;
				}
	

		//  =============================
		//  Select Box               
		//  =============================
		$wp_customize->add_setting('travellator_category_setting', array(
			'default' => '',
			'sanitize_callback' => 'travellator_sanitize_category',
		));

		$wp_customize->add_control('travellator_category_control', array(
			'settings' => 'travellator_category_setting',
			'type' => 'select',
			'label' => __('Select Category:', 'travellator'),
			'section' => 'travellator_slider_section',
			'choices' => $cats,
			'priority'	=> 24
		));
		
		//  Set Speed
		$wp_customize->add_setting( 'travellator_slider_speed_setting', array (
			'default' => '6000',
			'sanitize_callback' => 'travellator_sanitize_integer',
		) );
		
		$wp_customize->add_control('travellator_slider_speed', array(
			'label'    => __( 'Slider Speed (milliseconds)', 'travellator' ),
			'section'  => 'travellator_slider_section',
			'settings' => 'travellator_slider_speed_setting',
			'priority'	=> 24
		) );
		
		
		// optional_pages
		$wp_customize->add_section( 'travellator_optional_pages_section' , array(
			'title'       => __( 'Optional Pages', 'travellator' ),
			'priority'    => 20,
			'description' => __( '', 'travellator' ),
			'panel'  => 'travellator_home_featured_panel',
		) );
		$wp_customize->add_setting('travellator_display_optional_pages_setting', array(
			'default'        => 1,
			'sanitize_callback' => 'travellator_sanitize_checkbox',
		));

		$wp_customize->add_control('travellator_display_optional_pages', array(
			'settings' => 'travellator_display_optional_pages_setting',
			'label'    => __('Display Optional Pages', 'travellator'),
			'section'  => 'travellator_optional_pages_section',
			'type'     => 'checkbox',
			'priority'	=> 24
		));
		// optional_pages 1
		$wp_customize->add_setting( 'travellator_optional_first_page_setting', array (
				'sanitize_callback' => 'travellator_sanitize_text_field'
		));
		$wp_customize->add_control('travellator_optional_first_page', array(
			   'label'      => __( 'Select first page', 'travellator' ),
			   'section'    => 'travellator_optional_pages_section',
			   'settings'   => 'travellator_optional_first_page_setting',
			   'type'   	=> 'dropdown-pages',
			   'priority'	=> 24
			)
		);
		// optional_pages 2
		$wp_customize->add_setting( 'travellator_optional_second_page_setting', array (
				'sanitize_callback' => 'travellator_sanitize_text_field'
		));
		$wp_customize->add_control('travellator_optional_second_page', array(
			   'label'      => __( 'Select second page', 'travellator' ),
			   'section'    => 'travellator_optional_pages_section',
			   'settings'   => 'travellator_optional_second_page_setting',
			   'type'   	=> 'dropdown-pages',
			   'priority'	=> 24
			)
		);
		
		// optional_pages 3
		$wp_customize->add_setting( 'travellator_optional_third_page_setting', array (
				'sanitize_callback' => 'travellator_sanitize_text_field'
		));
		$wp_customize->add_control('travellator_optional_third_page', array(
			   'label'      => __( 'Select third page', 'travellator' ),
			   'section'    => 'travellator_optional_pages_section',
			   'settings'   => 'travellator_optional_third_page_setting',
			   'type'   	=> 'dropdown-pages',
			   'priority'	=> 24
			)
		);

	}
endif;

add_action('customize_register', 'travellator_theme_customizer');


/**
 * Sanitize integer input
 */
if ( ! function_exists( 'travellator_sanitize_integer' ) ) :
	function travellator_sanitize_integer( $input ) {		
		return absint($input);
	}
endif;

/**
 * Sanitize checkbox
 */

if (!function_exists( 'travellator_sanitize_checkbox' ) ) :
	function travellator_sanitize_checkbox( $input ) {
		if ( $input != 1 ) {
			return 0;
		} else {
			return 1;
		}
	}
endif;

if ( ! function_exists( 'travellator_sanitize_category' ) ){
	function travellator_sanitize_category( $input ) {
		$categories = get_categories();
		$cats = array();
		$i = 0;
		foreach($categories as $category){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cats[$category->slug] = $category->name;
		}
		$valid = $cats;

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';

		}
	}
}

/**
* Apply Color Scheme
*/
if ( ! function_exists( 'travellator_apply_color' ) ) :
  function travellator_apply_color() {
	?>
	<style id="color-settings">
		<?php if (get_theme_mod('travellator_link_color_setting') ) { ?>
			.site-footer a,
			#footer-menu li a:hover,
			#footer-menu li.current-menu-item a,
			.read_more:hover,
			.page-numbers.current,
			.site-footer h1,
			input[type="submit"]:hover,
			.carousel-content-bg a:hover,
			.entry-title a:hover,
			.site-title a:hover,
			.slide-bar ul li a:hover{
					color:<?php echo esc_html(get_theme_mod('travellator_link_color_setting')); ?>
			}
			input[type="submit"],
			.read_more{
					background:<?php echo esc_html(get_theme_mod('travellator_link_color_setting')); ?>;
					border:solid 1px <?php echo esc_html(get_theme_mod('travellator_link_color_setting')); ?>
			}
			.fa-chevron-right,
			.fa-chevron-left{
				background:<?php echo esc_html(get_theme_mod('travellator_link_color_setting')); ?>
			}
		<?php } ?>
		</style>
	<?php	  
  }
endif;
add_action( 'wp_head', 'travellator_apply_color' );