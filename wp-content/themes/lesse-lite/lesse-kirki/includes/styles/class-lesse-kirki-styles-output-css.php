<?php
/**
 * Generates the styles for the frontend.
 * Handles the 'output' argument of fields
 *
 * @package     Lesse_Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Lesse_Kirki_Styles_Output_CSS' ) ) {

	/**
	 * Handles CSS output.
	 */
	final class Lesse_Kirki_Styles_Output_CSS {

		/**
		 * The instance of this class (singleton pattern).
		 *
		 * @static
		 * @access public
		 * @var null|object
		 */
		public static $instance = null;

		/**
		 * Settings.
		 *
		 * @static
		 * @access public
		 * @var null|string|array
		 */
		public static $settings    = null;

		/**
		 * Output.
		 *
		 * @static
		 * @access public
		 * @var array
		 */
		public static $output      = array();

		/**
		 * Callback.
		 *
		 * @static
		 * @access public
		 * @var null|string|array
		 */
		public static $callback    = null;

		/**
		 * Option Name.
		 *
		 * @static
		 * @access public
		 * @var null|string
		 */
		public static $option_name = null;

		/**
		 * Field Type.
		 *
		 * @static
		 * @access public
		 * @var string
		 */
		public static $field_type  = null;

		/**
		 * Google Fonts
		 *
		 * @static
		 * @access public
		 * @var array
		 */
		public static $google_fonts = null;

		/**
		 * Standard Fonts
		 *
		 * @static
		 * @access public
		 * @var array
		 */
		public static $backup_fonts = null;

		/**
		 * CSS
		 *
		 * @static
		 * @access public
		 * @var string
		 */
		public static $css;

		/**
		 * Value
		 *
		 * @static
		 * @access public
		 * @var mixed
		 */
		public static $value = null;

		/**
		 * The class constructor.
		 */
		private function __construct() {
			if ( is_null( self::$google_fonts ) ) {
				self::$google_fonts = Lesse_Kirki_Fonts::get_google_fonts();
			}
			if ( is_null( self::$backup_fonts ) ) {
				self::$backup_fonts = Lesse_Kirki_Fonts::get_backup_fonts();
			}
		}

		/**
		 * Get a single instance of this class
		 *
		 * @return object
		 */
		public static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new Lesse_Kirki_Styles_Output_CSS();
			}
			return self::$instance;
		}

		/**
		 * Get the CSS for a field.
		 *
		 * @static
		 * @access public
		 * @param array $field The field.
		 * @return array
		 */
		public static function css( $field ) {

			// Set class vars.
			self::$settings   = $field['settings'];
			self::$callback   = $field['sanitize_callback'];
			self::$field_type = $field['type'];
			self::$output     = $field['output'];
			if ( ! is_array( self::$output ) ) {
				self::$output = array(
					array(
						'element'           => self::$output,
						'sanitize_callback' => null,
					),
				);
			}

			// Get the value of this field.
			self::$value = Lesse_Kirki_Values::get_sanitized_field_value( $field );

			// Find the class that will handle the outpout for this field.
			$classname = 'Lesse_Kirki_Output';
			$field_output_classes = apply_filters( 'lessekirki/' . $field['lessekirki_config'] . '/output/control-classnames', array(
				'lessekirki-spacing'    => 'Lesse_Kirki_Output_Field_Spacing',
				'lessekirki-typography' => 'Lesse_Kirki_Output_Field_Typography',
				'lessekirki-multicolor' => 'Lesse_Kirki_Output_Field_Multicolor',
			) );
			if ( array_key_exists( self::$field_type, $field_output_classes ) ) {
				$classname = $field_output_classes[ self::$field_type ];
			}
			$obj = new $classname( $field['lessekirki_config'], self::$output, self::$value );
			return $obj->get_styles();

		}

		/**
		 * Gets the array of generated styles and creates the minimized, inline CSS.
		 *
		 * @static
		 * @access public
		 * @param array $css The CSS definitions array.
		 * @return string    The generated CSS.
		 */
		public static function styles_parse( $css = array() ) {

			// Pass our styles from the lessekirki/styles_array filter.
			$css = apply_filters( 'lessekirki/styles_array', $css );

			// Process the array of CSS properties and produce the final CSS.
			$final_css = '';
			if ( ! is_array( $css ) || empty( $css ) ) {
				return '';
			}
			foreach ( $css as $media_query => $styles ) {
				$final_css .= ( 'global' != $media_query ) ? $media_query . '{' : '';
				foreach ( $styles as $style => $style_array ) {
					$final_css .= $style . '{';
						foreach ( $style_array as $property => $value ) {
							$value = ( is_string( $value ) ) ? $value : '';
							$final_css .= $property . ':' . $value . ';';
						}
					$final_css .= '}';
				}
				$final_css .= ( 'global' != $media_query ) ? '}' : '';
			}
			return $final_css;
		}

		/**
		 * Add prefixes if necessary.
		 *
		 * @param  array $css The CSS definitions array.
		 * @return array
		 */
		public static function add_prefixes( $css ) {

			if ( is_array( $css ) ) {
				foreach ( $css as $media_query => $elements ) {
					foreach ( $elements as $element => $style_array ) {
						foreach ( $style_array as $property => $value ) {

							// Add -webkit-* and -mod-*.
							if ( is_string( $property ) && in_array( $property, array(
								'border-radius',
								'box-shadow',
								'box-sizing',
								'text-shadow',
								'transform',
								'background-size',
								'transition',
								'transition-property',
							) ) ) {
								$css[ $media_query ][ $element ][ '-webkit-' . $property ] = $value;
								$css[ $media_query ][ $element ][ '-moz-' . $property ]    = $value;
							}

							// Add -ms-* and -o-*.
							if ( is_string( $property ) && in_array( $property, array(
								'transform',
								'background-size',
								'transition',
								'transition-property',
							) ) ) {
								$css[ $media_query ][ $element ][ '-ms-' . $property ] = $value;
								$css[ $media_query ][ $element ][ '-o-' . $property ]  = $value;
							}
						}
					}
				}
			}

			return $css;

		}
	}
}
