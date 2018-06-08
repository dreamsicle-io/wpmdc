<?php 
/**
 * WPMDC Layout Grid Class.
 *
 * @package    wpmdc
 * @subpackage includes/components/templates
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Layout Grid.
 *
 * @since  0.0.1 
 */
class WPMDC_Layout_Grid {

	public static function open_grid( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo'  => true, 
			'fixed' => false, 
			'align' => '', 
			'class' => '', 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'  => 'boolean', 
			'fixed' => 'boolean', 
			'align' => array( '', 'left', 'right' ), 
			'class' => 'string', 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'wpmdc-layout-grid'                                    => true, 
			'mdc-layout-grid'                                      => true, 
			'mdc-layout-grid--fixed-column-width'                  => $args['fixed'], 
			'mdc-layout-grid--align-' . esc_attr( $args['align'] ) => ! empty( $args['align'] ), 
			esc_attr( $args['class'] )                             => ! empty( $args['class'] ), 
		) );
		
		$output = '<div class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_grid( $args = array() ) {
		
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

	public static function open_inner( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$output = '<div class="mdc-layout-grid__inner">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_inner( $args = array() ) {
		
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

	public static function open_cell( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo'    => true, 
			'desktop' => 4, 
			'tablet'  => 4, 
			'phone'   => 4, 
			'order'   => -1, 
			'align'   => '', 
			'class'   => '', 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'    => 'boolean', 
			'desktop' => array( 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ), 
			'tablet'  => array( 0, 1, 2, 3, 4, 5, 6, 7, 8 ), 
			'phone'   => array( 0, 1, 2, 3, 4 ), 
			'order'   => 'integer', 
			'align'   => array( '', 'top', 'middle', 'bottom' ),  
			'class'   => 'string', 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array(
			'mdc-layout-grid__cell'                                        => true, 
			'mdc-layout-grid__cell--span-' . $args['desktop'] . '-desktop' => ( $args['desktop'] > 0 ), 
			'mdc-layout-grid__cell--span-' . $args['tablet'] . '-tablet'   => ( $args['tablet'] > 0 ), 
			'mdc-layout-grid__cell--span-' . $args['phone'] . '-phone'     => ( $args['phone'] > 0 ), 
			'mdc-layout-grid__cell--order-' . $args['order']               => ( $args['order'] >= 0 ), 
			'mdc-layout-grid__cell--align-' . $args['align']               => ! empty( $args['align'] ), 
			esc_attr( $args['class'] )                                     => ! empty( $args['class'] ), 
		) );

		$output = '<div class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_cell() {

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