<?php
/**
 * Customizer Control: editor.
 *
 * Creates a TinyMCE textarea.
 *
 * @package     Lesse_Kirki
 * @subpackage  Controls
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Lesse_Kirki_Controls_Editor_Control' ) ) {

	/**
	 * A TinyMCE control.
	 */
	class Lesse_Kirki_Controls_Editor_Control extends Lesse_Kirki_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'lessekirki-editor';

		/**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_script( 'lessekirki-editor' );
		}

		/**
		 * An Underscore (JS) template for this control's content (but not its container).
		 *
		 * Class variables for this control class are available in the `data` JS object;
		 * export custom variables by overriding {@see Lesse_Kirki_Customize_Control::to_json()}.
		 *
		 * The actual editor is added from the Lesse_Kirki_Field_Editor class.
		 * All this template contains is a button that triggers the global editor on/off
		 * and a hidden textarea element that is used to mirror save the options.
		 *
		 * @see WP_Customize_Control::print_template()
		 *
		 * @access protected
		 */
		protected function content_template() {
			?>
			<# if ( data.tooltip ) { #>
				<a href="#" class="tooltip hint--left" data-hint="{{ data.tooltip }}"><span class='dashicons dashicons-info'></span></a>
			<# } #>
			<label>
				<# if ( data.label ) { #>
					<span class="customize-control-title">{{{ data.label }}}</span>
				<# } #>
				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>
				<div class="customize-control-content">
					<a href="#" class="button button-primary toggle-editor"></a>
					<textarea class="hidden" {{{ data.link }}}>{{ data.value }}</textarea>
				</div>
			</label>
			<?php
		}
	}
}