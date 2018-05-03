<?php 
/**
 * WPMDC Widgets Class.
 *
 * @package wpmdc
 * @subpackage includes
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC.
 *
 * @since  0.0.1 
 */
class WPMDC_Widgets {

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

		// Hooks
		add_action( 'widgets_init', array( $this, 'manage_widget_areas' ), 10 );
		add_action( 'widgets_init', array( $this, 'manage_widgets' ), 10 );

	}

	/**
	 * Manage Widget Areas.
	 *
	 * @since   0.0.1
	 * @return  void
	 */
	public function manage_widget_areas() {

		register_sidebar( array(
			'name'          => esc_html__( 'Drawer', 'wpmdc' ),
			'id'            => 'drawer',
			'description'   => esc_html__( 'Widgets added here will appear in the drawer.', 'wpmdc' ),
			'before_widget' => '<div id="%1$s" class="widget mdc-list-group %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title mdc-list-group__subheader">',
			'after_title'   => '</h3>',
		) );

	}

	/**
	 * Manage Widgets.
	 *
	 * @since   0.0.1
	 * @return  void
	 */
	public function manage_widgets() {

		unregister_widget( 'WP_Nav_Menu_Widget' );
		unregister_widget( 'WP_Widget_Archives' );
		unregister_widget( 'WP_Widget_Categories' );
		unregister_widget( 'WP_Widget_Pages' );
		unregister_widget( 'WP_Widget_Recent_Posts' );
		unregister_widget( 'WP_Widget_Recent_Comments' );

		register_widget( 'WPMDC_Widget_Nav_Menu' );
		register_widget( 'WPMDC_Widget_Archives' );
		register_widget( 'WPMDC_Widget_Categories' );
		register_widget( 'WPMDC_Widget_Pages' );
		register_widget( 'WPMDC_Widget_Posts' );
		register_widget( 'WPMDC_Widget_Comments' );

	}

}