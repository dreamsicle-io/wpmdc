<?php 

class WPMDC_Layout_Grid {

	public static function open_grid( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo'  => true, 
			'fixed' => false, 
			'align' => '', 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'  => 'boolean', 
			'fixed' => 'boolean', 
			'align' => array( 'left', 'right' ), 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'mdc-layout-grid'                          => true, 
			'mdc-layout-grid--fixed-column-width'      => $args['fixed'], 
			'mdc-layout-grid--align-' . $args['align'] => ! empty( $args['align'] ), 
		) );
		
		$output = '<div class="' . $class . '">';

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
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'    => 'boolean', 
			'desktop' => array( 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ), 
			'tablet'  => array( 0, 1, 2, 3, 4, 5, 6, 7, 8 ), 
			'phone'   => array( 0, 1, 2, 3, 4 ), 
			'order'   => 'integer', 
			'align'   => array( '', 'top', 'middle', 'bottom' ),  
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array(
			'mdc-layout-grid__cell'                                        => true, 
			'mdc-layout-grid__cell--span-' . $args['desktop'] . '-desktop' => ( $args['desktop'] > 0 ), 
			'mdc-layout-grid__cell--span-' . $args['tablet'] . '-tablet'   => ( $args['tablet'] > 0 ), 
			'mdc-layout-grid__cell--span-' . $args['phone'] . '-phone'     => ( $args['phone'] > 0 ), 
			'mdc-layout-grid__cell--order-' . $args['order']               => ( $args['order'] >= 0 ), 
			'mdc-layout-grid__cell--align-' . $args['align']               => ! empty( $args['align'] ), 
		) );

		$output = '<div class="' . $class . '">';

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