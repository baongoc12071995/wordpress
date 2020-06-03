<?php
/**
 * Override field methods
 *
 * @package     Lesse_Kirki
 * @subpackage  Controls
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       2.2.7
 */

if ( ! class_exists( 'Lesse_Kirki_Field_Spacing' ) ) {

	/**
	 * Field overrides.
	 */
	class Lesse_Kirki_Field_Spacing extends Lesse_Kirki_Field_Number {

		/**
		 * Sets the control type.
		 *
		 * @access protected
		 */
		protected function set_type() {

			$this->type = 'lessekirki-spacing';

		}

		/**
		 * Sets the $sanitize_callback.
		 *
		 * @access protected
		 */
		protected function set_sanitize_callback() {

			// If a custom sanitize_callback has been defined,
			// then we don't need to proceed any further.
			if ( ! empty( $this->sanitize_callback ) ) {
				return;
			}
			$this->sanitize_callback = array( $this, 'sanitize' );

		}

		/**
		 * Sanitizes the value.
		 *
		 * @access public
		 * @param array $value The value.
		 * @return array
		 */
		public function sanitize( $value ) {

			// Sanitize each sub-value separately.
			foreach ( $value as $key => $sub_value ) {
				$value[ $key ] = Lesse_Kirki_Sanitize_Values::css_dimension( $sub_value );
			}
			return $value;

		}

		/**
		 * Sets the $js_vars.
		 * Currentlly postMessage does not work with spacing fields
		 * so we have to force using the `refresh` mode.
		 *
		 * @access protected
		 */
		protected function set_js_vars() {
			$this->js_vars   = array();
			$this->transport = 'refresh';
		}
	}
}
