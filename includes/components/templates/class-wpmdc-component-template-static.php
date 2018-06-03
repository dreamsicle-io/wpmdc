<?php 
/**
 * WPMDC Component Template Static Class.
 *
 * @package    wpmdc
 * @subpackage includes/components/templates
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Component Template Static.
 *
 * @since  0.0.1 
 */
class WPMDC_Component_Template_Static {

	public static function open( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo'  => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'  => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'wpmdc-component-static-class' => true, 
			'mdc-component-static-class'   => true, 
		) );
		
		$output = '<div class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );
		
		$output = '</div>';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

}