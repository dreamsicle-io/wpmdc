<?php 
/**
 * WPMDC Image List Class.
 *
 * @package    wpmdc
 * @subpackage includes/components/templates
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Image List.
 *
 * @since  0.0.1 
 */
class WPMDC_Image_List {

	public static function open_list( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo'      => true, 
			'id'        => uniqid( strtolower( get_called_class() ) . '_' ), 
			'container' => 'ul', 
			'mod'       => '', 
			'columns'   => 5, 
			'class'     => '', 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'      => 'boolean', 
			'id'        => 'string', 
			'container' => array( 'ul', 'div', 'nav' ), 
			'mod'       => array( '', 'masonry' ), 
			'columns'   => array( 1, 2, 3, 4, 5, 6 ), 
			'class'     => 'string', 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'wpmdc-image-list'                                          => true, 
			'wpmdc-image-list--columns-' . esc_attr( $args['columns'] ) => ( $args['columns'] > 0 ), 
			'mdc-image-list'                                            => true, 
			'mdc-image-list--with-text-protection'                      => ( $args['mod'] !== 'masonry' ), 
			'mdc-image-list--' . esc_attr( $args['mod'] )               => ! empty( $args['mod'] ), 
			esc_attr( $args['class'] )                                  => ! empty( $args['class'] ), 
		) );

		$attrs = WPMDC_Component::parse_attrs( array(
			'id="' . esc_attr( $args['id'] ) . '"' => ! empty( $args['id'] ), 
			'class="' . esc_attr( $class ) . '"'   => ! empty( $class ), 
		) );

		$output = '<' . esc_attr( $args['container'] ) . ' ' . $attrs . '>';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_list( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo'      => true, 
			'container' => 'ul', 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'      => 'boolean', 
			'container' => array( 'ul', 'div', 'nav' ), 
		) );

		WPMDC_Component::render_errors( $errors );
		
		$output = '</' . esc_attr( $args['container'] ) . '>';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

}