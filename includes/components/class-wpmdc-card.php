<?php 
/**
 * WPMDC Card Class.
 *
 * @package    wpmdc
 * @subpackage includes/components/templates
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Card.
 *
 * @since  0.0.1 
 */
class WPMDC_Card {

	public static function open_card( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo'      => true, 
			'container' => 'div', 
			'mod'       => '', 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'      => 'boolean', 
			'container' => array( 'article', 'div' ), 
			'mod'       => array( '', 'outlined' ), 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'wpmdc-card'                            => true, 
			'mdc-card'                              => true, 
			'mdc-card--' . esc_attr( $args['mod'] ) => ! empty( $args['mod'] ), 
		) );
		
		$output = '<' . esc_attr( $args['container'] ) . ' class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_card( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo'      => true, 
			'container' => 'div', 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'      => 'boolean', 
			'container' => array( 'article', 'div' ), 
		) );

		WPMDC_Component::render_errors( $errors );
		
		$output = '</' . esc_attr( $args['container'] ) . '>';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function open_media( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo' => true, 
			'mod'  => '16-9', 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
			'mod'  => array( 'square', '16-9' ), 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'mdc-card__media'                              => true, 
			'mdc-card__media--' . esc_attr( $args['mod'] ) => ! empty( $args['mod'] ), 
		) );
		
		$output  = '<header class="' . esc_attr( $class ) . '">';
		$output .= '<div class="mdc-card__media-content">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_media( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );
		
		$output  = '</div>';
		$output .= '</header>';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function open_actions( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'mdc-card__actions'=> true, 
		) );
		
		$output = '<div class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_actions( $args = array() ) {
		
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