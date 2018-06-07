<?php 
/**
 * WPMDC Typography Class.
 *
 * @package    wpmdc
 * @subpackage includes/components/templates
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Typography.
 *
 * @since  0.0.1 
 */
class WPMDC_Typography extends WPMDC_Component {

	/**
	 * Construct.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	function __construct( $args = array() ) {

		$uniqid = $this->get_uniqid();

		$this->arg_types = array(
			'mod'       => array( 'body1', 'body2', 'headline1', 'headline2', 'headline3', 'headline4', 'headline5', 'headline6', 'button', 'overline', 'subtitle1', 'subtitle2', 'caption' ), 
			'container' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'span' ), 
			'text'      => 'string', 
		);

		$this->default_args = array(
			'container' => 'span', 
			'mod'       => 'body1', 
			'text'      => _x( 'Lorem ipsum dolor sit amet.', 'typography component body 1 default text', 'wpmdc' ), 
		);

		parent::__construct( $args );

	}

	/**
	 * Render.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	public function render() {

		if ( self::has_errors( $this->errors ) ) { 
			self::render_errors( $this->errors ); 
			return; 
		}

		$class = self::parse_classes( array(
			'mdc-typography--' . esc_attr( $this->args['mod'] ) => ! empty( $this->args['mod'] ), 
		) ); 

		if ( empty( $this->args['text'] ) ) {
			return '';
		}

		echo '<' . $this->args['container'] . ' class="' . esc_attr( $class ) . '">';
		echo esc_html( $this->args['text'] );
		echo '</' . $this->args['container'] . '>';

	}

	public static function body1( $args = array() ) {
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$typography_args = $args;
		unset( $typography_args['echo'] );
		$typography_args['container'] = 'p';
		$typography_args['mod'] = 'body1';

		if ( $args['echo'] ) {

			wpmdc_component( new WPMDC_Typography( $typography_args ) );

		} else {

			return wpmdc_get_component( new WPMDC_Typography( $typography_args ) );
			
		}
	}

	public static function body2( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$typography_args = $args;
		unset( $typography_args['echo'] );
		$typography_args['container'] = 'p';
		$typography_args['mod'] = 'body2';

		if ( $args['echo'] ) {

			wpmdc_component( new WPMDC_Typography( $typography_args ) );

		} else {

			return wpmdc_get_component( new WPMDC_Typography( $typography_args ) );
			
		}

	}

	public static function headline1( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$typography_args = $args;
		unset( $typography_args['echo'] );
		$typography_args['container'] = 'h1';
		$typography_args['mod'] = 'headline1';

		if ( $args['echo'] ) {

			wpmdc_component( new WPMDC_Typography( $typography_args ) );

		} else {

			return wpmdc_get_component( new WPMDC_Typography( $typography_args ) );
			
		}

	}

	public static function headline2( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$typography_args = $args;
		unset( $typography_args['echo'] );
		$typography_args['container'] = 'h2';
		$typography_args['mod'] = 'headline2';

		if ( $args['echo'] ) {

			wpmdc_component( new WPMDC_Typography( $typography_args ) );

		} else {

			return wpmdc_get_component( new WPMDC_Typography( $typography_args ) );
			
		}

	}

	public static function headline3( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$typography_args = $args;
		unset( $typography_args['echo'] );
		$typography_args['container'] = 'h3';
		$typography_args['mod'] = 'headline3';

		if ( $args['echo'] ) {

			wpmdc_component( new WPMDC_Typography( $typography_args ) );

		} else {

			return wpmdc_get_component( new WPMDC_Typography( $typography_args ) );
			
		}

	}

	public static function headline4( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$typography_args = $args;
		unset( $typography_args['echo'] );
		$typography_args['container'] = 'h4';
		$typography_args['mod'] = 'headline4';

		if ( $args['echo'] ) {

			wpmdc_component( new WPMDC_Typography( $typography_args ) );

		} else {

			return wpmdc_get_component( new WPMDC_Typography( $typography_args ) );
			
		}

	}

	public static function headline5( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$typography_args = $args;
		unset( $typography_args['echo'] );
		$typography_args['container'] = 'h5';
		$typography_args['mod'] = 'headline5';

		if ( $args['echo'] ) {

			wpmdc_component( new WPMDC_Typography( $typography_args ) );

		} else {

			return wpmdc_get_component( new WPMDC_Typography( $typography_args ) );
			
		}

	}

	public static function headline6( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$typography_args = $args;
		unset( $typography_args['echo'] );
		$typography_args['container'] = 'h6';
		$typography_args['mod'] = 'headline6';

		if ( $args['echo'] ) {

			wpmdc_component( new WPMDC_Typography( $typography_args ) );

		} else {

			return wpmdc_get_component( new WPMDC_Typography( $typography_args ) );
			
		}

	}

	public static function button( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$typography_args = $args;
		unset( $typography_args['echo'] );
		$typography_args['container'] = 'span';
		$typography_args['mod'] = 'button';

		if ( $args['echo'] ) {

			wpmdc_component( new WPMDC_Typography( $typography_args ) );

		} else {

			return wpmdc_get_component( new WPMDC_Typography( $typography_args ) );
			
		}

	}

	public static function overline( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$typography_args = $args;
		unset( $typography_args['echo'] );
		$typography_args['container'] = 'p';
		$typography_args['mod'] = 'overline';

		if ( $args['echo'] ) {

			wpmdc_component( new WPMDC_Typography( $typography_args ) );

		} else {

			return wpmdc_get_component( new WPMDC_Typography( $typography_args ) );
			
		}

	}

	public static function subtitle1( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$typography_args = $args;
		unset( $typography_args['echo'] );
		$typography_args['container'] = 'p';
		$typography_args['mod'] = 'subtitle1';

		if ( $args['echo'] ) {

			wpmdc_component( new WPMDC_Typography( $typography_args ) );

		} else {

			return wpmdc_get_component( new WPMDC_Typography( $typography_args ) );
			
		}

	}

	public static function subtitle2( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$typography_args = $args;
		unset( $typography_args['echo'] );
		$typography_args['container'] = 'p';
		$typography_args['mod'] = 'subtitle2';

		if ( $args['echo'] ) {

			wpmdc_component( new WPMDC_Typography( $typography_args ) );

		} else {

			return wpmdc_get_component( new WPMDC_Typography( $typography_args ) );
			
		}

	}

	public static function caption( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$typography_args = $args;
		unset( $typography_args['echo'] );
		$typography_args['container'] = 'p';
		$typography_args['mod'] = 'caption';

		if ( $args['echo'] ) {

			wpmdc_component( new WPMDC_Typography( $typography_args ) );

		} else {

			return wpmdc_get_component( new WPMDC_Typography( $typography_args ) );
			
		}

	}

}