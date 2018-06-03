<?php
/**
 * WPMDC Button Class.
 *
 * @package    wpmdc
 * @subpackage includes/components
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Button.
 *
 * @since  0.0.1 
 */
class WPMDC_Button extends WPMDC_Component {

	/**
	 * Construct.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	function __construct( $args = array() ) {

		$this->arg_types = array(
			'mod'      => array( '', 'outlined', 'raised', 'unelevated' ), 
			'type'     => array( 'button', 'submit', 'reset' ), 
			'href'     => 'string', 
			'dense'    => 'boolean', 
			'icon'     => 'string', 
			'text'     => 'string', 
			'disabled' => 'boolean', 
			'data'     => 'array', 
		);

		$this->default_args = array(
			'mod'      => '', 
			'type'     => 'button', 
			'href'     => '', 
			'dense'    => false, 
			'icon'     => '', 
			'text'     => _x( 'Button', 'button component default button text', 'wpmdc' ), 
			'disabled' => false, 
			'data'     => array(), 
		);

		parent::__construct( $args );

	}

	public function render_internal_elements() {

		if ( ! empty( $this->args['icon'] ) ) { ?>

			<i class="material-icons mdc-button__icon" aria-hidden="true"><?php 

				echo esc_html( $this->args['icon'] );

			?></i>

		<?php } 

		if ( ! empty( $this->args['text'] ) ) { ?>

			<span><?php 

				echo esc_html( $this->args['text'] );

			?></span>

		<?php }

	}

	public function render() {

		if ( self::has_errors( $this->errors ) ) { 
			self::render_errors( $this->errors ); 
			return; 
		}

		$class = self::parse_classes( array(
			'wpmdc-button'                                  => true, 
			'mdc-button'                                    => true, 
			'mdc-ripple-surface'                            => true, 
			'mdc-button--' . esc_attr( $this->args['mod'] ) => ! empty( $this->args['mod'] ), 
			'mdc-button--dense'                             => $this->args['dense'], 
		) ); 

		$data_attrs = self::parse_data_attrs( $this->args['data'] );

		if ( ! empty( $this->args['href'] ) ) { ?>

			<a 
			href="<?php echo esc_url( $this->args['href'] ); ?>"
			class="<?php echo esc_attr( $class ); ?>"
			<?php echo $data_attrs; ?>><?php 

				$this->render_internal_elements(); 

			?></a>

		<?php } else {

			$button_attrs = self::parse_attrs( array( 
				'disabled'             => $this->args['disabled'],
				'aria-disabled="true"' => $this->args['disabled'],
			) ); ?> 

			<button 
			type="<?php echo esc_attr( $this->args['type'] ); ?>" 
			class="<?php echo esc_attr( $class ); ?>"
			<?php echo $button_attrs; ?>
			<?php echo $data_attrs; ?>><?php 

				$this->render_internal_elements(); 

			?></button>

		<?php }

	}

}
