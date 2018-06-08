<?php
/**
 * WPMDC Icon Toggle Class.
 *
 * @package    wpmdc
 * @subpackage includes/components
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Icon Toggle.
 *
 * @since  0.0.1 
 */
class WPMDC_Icon_Toggle extends WPMDC_Component {

	/**
	 * Construct.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	function __construct( $args = array() ) {

		$this->arg_types = array(
			'option_name'   => 'string', 
			'id'            => 'string', 
			'label'         => 'string', 
			'on'            => 'boolean', 
			'disabled'      => 'boolean', 
			'data_on'       => 'array', 
			'data_off'      => 'array', 
			'class'         => 'string', 
		);

		$this->default_args = array(
			'option_name' => '', 
			'id'          => $this->get_uniqid(), 
			'label'       => _x( 'Icon Toggle', 'icon toggle component default label', 'wpmdc' ), 
			'on'          => false, 
			'disabled'    => false, 
			'data_on'     => array(
				'content'  => 'favorite', 
				'label'    => _x( 'On', 'icon toggle component default "on" label', 'wpmdc' ), 
			), 
			'data_off'      => array(
				'content'  => 'favorite_border', 
				'label'    => _x( 'Off', 'icon toggle component default "off" label', 'wpmdc' ), 
			), 
			'class'       => '', 
		);

		parent::__construct( $args );

		if ( ! isset( $this->args['data_on']['content'] )
		|| ! isset( $this->args['data_on']['label'] ) ) {

			$this->errors[] = self::get_data_error( 'data_on', array( 'content', 'label' ) );

		}

		if ( ! isset( $this->args['data_off']['content'] )
		|| ! isset( $this->args['data_off']['label'] ) ) {

			$this->errors[] = self::get_data_error( 'data_off', array( 'content', 'label' ) );

		}

	}

	public static function get_data_error( $key = '', $expected = array() ) {

		return new WP_Error( "wpmdc_component_data_error_{$key}", sprintf( 
			/* translators: 1: argument key, 2: CSV of expected values. */
			__( 'The key "%1$s" expects an array with the keys ["%2$s"].', 'wpmdc' ), 
			$key, 
			implode( '", "', $expected )
		) );

	}

	public function render() {

		if ( self::has_errors( $this->errors ) ) { 
			self::render_errors( $this->errors ); 
			return; 
		}

		$tabindex = $this->args['disabled'] ? '-1' : '0';
		$pressed = $this->args['on'] ? 'true' : 'false';

		$class = self::parse_classes( array(
			'wpmdc-icon-toggle'              => true, 
			'mdc-icon-toggle'                => true, 
			'material-icons'                 => true, 
			'mdc-icon-toggle--disabled'      => $this->args['disabled'], 
			esc_attr( $this->args['class'] ) => ! empty( $this->args['class'] ), 
		) );

		$attrs = self::parse_attrs( array( 
			'aria-pressed="' . esc_attr( $pressed ) . '"' => true,
			'disabled'                                    => $this->args['disabled'],
			'aria-disabled="true"'                        => $this->args['disabled'],
			'tabindex="' . esc_attr( $tabindex ) . '"'    => true,
		) ); ?>

		<i 
		role="button" 
		id="<?php echo esc_attr( $this->args['id'] ); ?>"
		class="<?php echo esc_attr( $class ); ?>"
		aria-label="<?php echo esc_attr( $this->args['label'] ); ?>" 
		data-toggle-on='<?php echo json_encode( $this->args['data_on'] ); ?>'
		data-toggle-off='<?php echo json_encode( $this->args['data_off'] ); ?>'
		<?php echo $attrs; ?>><?php
			
			if ( $this->args['on'] ) {

				echo esc_html( $this->args['data_on']['content'] );

			} else {

				echo esc_html( $this->args['data_off']['content'] );

			}

		?></i>

	<?php }

}
