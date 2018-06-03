<?php 
/**
 * WPMDC Menu Class.
 *
 * @package    wpmdc
 * @subpackage includes/components/templates
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Menu.
 *
 * @since  0.0.1 
 */
class WPMDC_Menu {

	public static function open_menu( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo'  => true, 
			'id'    => uniqid( strtolower( get_called_class() ) . '_' ), 
			'anchor' => 'top-start', 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'   => 'boolean', 
			'id'     => 'string', 
			'anchor' => array( 'top-start', 'top-end', 'bottom-start', 'bottom-end' ), 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'wpmdc-menu' => true, 
			'mdc-menu'   => true, 
		) );

		$data_attrs = WPMDC_Component::parse_data_attrs( array(
			'menu-anchor' => $args['anchor'], 
		) );
		
		$output = '<div id="' . esc_attr( $args['id'] ) . '" class="' . esc_attr( $class ) . '" ' . $data_attrs . '>';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_menu( $args = array() ) {
		
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

	public static function open_anchor( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo'  => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'   => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'wpmdc-menu-anchor' => true, 
			'mdc-menu-anchor'   => true, 
		) );

		$output = '<div class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_anchor( $args = array() ) {
		
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