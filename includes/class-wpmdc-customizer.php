<?php
/**
 * WPMDC Theme Customizer Class.
 *
 * @package wpmdc
 * @subpackage includes
 */

/**
 * WPMDC Customizer.
 *
 * @since  0.0.1 
 */
class WPMDC_Customizer {

	/**
	 * Construct.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	function __construct() {

	}

	/**
	 * Initialize.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	public function init() {

		add_action( 'after_setup_theme', array( $this, 'manage_theme_support' ), 10 );

	}

	/**
	 * Manage Theme Support.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	public function manage_theme_support() {

		add_theme_support( 'customize-selective-refresh-widgets' );

	}

}
