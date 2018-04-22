<?php
/**
 * WPMDC Theme Structure Class.
 *
 * @package     wpmdc
 * @subpackage  includes
 */

/**
 * WPMDC Structure.
 *
 * @since  0.0.1 
 */
class WPMDC_Structure {

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
		// Header
		add_action( 'wpmdc_header', array( $this, 'hook_skip_link' ), 10 );
		add_action( 'wpmdc_header', array( $this, 'hook_masthead' ), 20 );
		// Footer
		add_action( 'wpmdc_footer', array( $this, 'hook_colophon' ), 10 );
		// Index
		add_action( 'wpmdc_index', array( $this, 'hook_loop' ), 10 );

	}

	/**
	 * Hook Skip Link.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	public function hook_skip_link() {
		get_template_part( 'template-parts/skip-link' ); 
	}

	/**
	 * Hook Masthead.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	public function hook_masthead() {
		get_template_part( 'template-parts/masthead' ); 
	}

	/**
	 * Hook Loop.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	public function hook_loop() {
		get_template_part( 'template-parts/loop' );
	}

	/**
	 * Hook Colophon.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	public function hook_colophon() {
		get_template_part( 'template-parts/colophon' );
	}

}
