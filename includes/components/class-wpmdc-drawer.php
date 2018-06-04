<?php 
/**
 * WPMDC Drawer Class.
 *
 * @package    wpmdc
 * @subpackage includes/components/templates
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Drawer.
 *
 * @since  0.0.1 
 */
class WPMDC_Drawer {

	public static function open_drawer( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo' => true, 
			'id'   => uniqid( strtolower( get_called_class() ) . '_' ), 
			'mod'  => 'permanent', 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
			'id'   => 'string', 
			'mod'  => array( 'permanent', 'persistent', 'temporary' ), 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'wpmdc-drawer'                            => true, 
			'mdc-drawer'                              => true, 
			'mdc-drawer--' . esc_attr( $args['mod'] ) => ! empty( $args['mod'] ), 
		) );
		
		$output = '<aside id="' . esc_attr( $args['id'] ) . '" class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_drawer( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );
		
		$output = '</aside>';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function open_surface( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'mdc-drawer__drawer' => true, 
		) );
		
		$output = '<div class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_surface( $args = array() ) {
		
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

	public static function open_content( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'mdc-drawer__content' => true, 
		) );
		
		$output = '<div class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_content( $args = array() ) {
		
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

	public static function open_header( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'mdc-drawer__header' => true, 
		) );
		
		$output = '<header class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_header( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );
		
		$output = '</header>';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function open_header_content( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'mdc-drawer__header-content' => true, 
		) );
		
		$output = '<div class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_header_content( $args = array() ) {
		
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