<?php
/**
 * The main Lesse_Kirki object
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

if ( ! class_exists( 'Lesse_Kirki_Toolkit' ) ) {

	/**
	 * Singleton class
	 */
	final class Lesse_Kirki_Toolkit {

		/**
		 * Holds the one, true instance of this object.
		 *
		 * @static
		 * @access protected
		 * @var object
		 */
		protected static $instance = null;

		/**
		 * Access the single instance of this class.
		 *
		 * @static
		 * @access public
		 * @return object Lesse_Kirki_Toolkit.
		 */
		public static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
	}
}
