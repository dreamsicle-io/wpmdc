<?php

class WPMDC_Component {

	public $args = array();

	public $arg_types = array();

	public $default_args = array();

	public $errors = array();

	public function __construct( $args = array() ) {

		$args = wp_parse_args( $args, $this->default_args );

		$errors = self::check_arg_types( $args, $this->arg_types );

		$this->errors = $errors;

		$this->args = $args;

	}

	public function get_uniqid() {

		return uniqid( strtolower( get_class( $this ) ) . '_' );

	}

	public static function check_arg_types( $args = array(), $arg_types = array() ) {

		$errors = array();

		if ( is_array( $args ) && ! empty( $args ) ) {

			foreach( $args as $key => $value ) {

				$has_arg_error = false;

				if ( is_array( $arg_types[$key] ) ) {

					$has_arg_error = ! in_array( $value, $arg_types[$key] );

				} else {

					switch ( $arg_types[$key] ) {

						case 'string':
							$has_arg_error = ! is_string( $value );
							break;

						case 'boolean':
							$has_arg_error = ! is_bool( $value );
							break;

						case 'integer':
							$has_arg_error = ! is_int( $value );
							break;

						case 'float':
							$has_arg_error = ( ! is_float( $value ) && ! is_int( $value ) );
							break;

						case 'object':
							$has_arg_error = ! is_object( $value );
							break;

						case 'array':
							$has_arg_error = ! is_array( $value );
							break;

					}
				}

				if ( $has_arg_error ) {
					
					$errors[] = self::get_arg_type_error( $key, $value, $arg_types[$key] );

				} 

			}

		} 

		return $errors;

	}

	public static function get_arg_type_error( $key = '', $value = '', $type = '' ) {

		$error_slug = "wpmdc_component_arg_type_error_{$key}";

		if ( is_array( $type ) ) {

			$error = new WP_Error( $error_slug, sprintf( 
				/* translators: 1: argument value, 2: argument key, 3: CSV of allowed values. */
				__( 'The value "%1$s" for key "%2$s" is not one of ["%3$s"].', 'wpmdc' ), 
				$value, 
				$key, 
				implode( '", "', $type )
			) );

		} else {

			$error = new WP_Error( $error_slug, sprintf( 
				/* translators: 1: argument value, 2: argument key, 3: argument type. */
				__( 'The value "%1$s" for key "%2$s" is not of type "%3$s".', 'wpmdc' ), 
				$value, 
				$key, 
				$type
			) );

		}
		
		return $error;

	}

	public static function has_errors( $errors = array() ) {

		return ( is_array( $errors ) && ! empty( $errors ) );

	}

	public static function render_errors( $errors = array() ) {

		if ( self::has_errors( $errors ) ) {

			foreach ( $errors as $error ) {

				echo esc_html( $error->get_error_message() );

			}

		}

	}

	public static function parse_classes( $classes = array() ) {

		$parsed = array();

		if ( is_array( $classes ) && ! empty( $classes ) ) {

			foreach ( $classes as $class => $is_active ) {

				if ( boolval( $is_active ) ) {

					$parsed[] = $class;

				}

			}

		}

		return implode( ' ', $parsed );

	}

	public static function parse_attrs( $attrs = array() ) {

		$parsed = array();

		if ( is_array( $attrs ) && ! empty( $attrs ) ) {

			foreach ( $attrs as $attr => $is_active ) {

				if ( boolval( $is_active ) ) {

					$parsed[] = $attr;

				}

			}

		}

		return implode( ' ', $parsed );

	}

	public function render() {

		if ( self::has_errors() ) { 

			self::render_errors(); 

			return; 

		}

	}


}