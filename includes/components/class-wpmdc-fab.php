<?php
/**
 * WPMDC Fab Class.
 *
 * @package    wpmdc
 * @subpackage includes/components
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Fab.
 *
 * @since  0.0.1 
 */
class WPMDC_Fab extends WPMDC_Component {

	/**
	 * Construct.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	function __construct( $args = array() ) {

		$this->arg_types = array(
			'mod'      => array( '', 'mini' ), 
			'type'     => array( 'button', 'submit', 'reset' ), 
			'href'     => 'string', 
			'icon'     => 'string', 
			'label'    => 'string', 
			'disabled' => 'boolean', 
			'exited'   => 'boolean', 
		);

		$this->default_args = array(
			'mod'      => '', 
			'type'     => 'button', 
			'href'     => '', 
			'icon'     => 'favorite_border', 
			'label'    => _x( 'Fab', 'fab component default button text', 'wpmdc' ), 
			'disabled' => false, 
			'exited'   => false, 
		);

		parent::__construct( $args );

	}

	public function render_internal_elements() {

		if ( ! empty( $this->args['icon'] ) ) { ?>

			<i class="material-icons mdc-fab__icon" aria-hidden="true"><?php 

				echo esc_html( $this->args['icon'] );

			?></i>

		<?php } 

	}

	public function render() {

		if ( self::has_errors( $this->errors ) ) { 
			self::render_errors( $this->errors ); 
			return; 
		}

		$class = self::parse_classes( array(
			'wpmdc-fab'                                  => true, 
			'mdc-fab'                                    => true, 
			'mdc-ripple-surface'                         => true, 
			'mdc-fab--' . esc_attr( $this->args['mod'] ) => ! empty( $this->args['mod'] ), 
			'mdc-fab--exited'                            => $this->args['exited'], 
		) );

		$attrs = self::parse_attrs( array(
			'aria-label="' . esc_attr( $this->args['label'] ) . '"' => ! empty( $this->args['label'] ),  
			'title="' . esc_attr( $this->args['label'] ) . '"'      => ! empty( $this->args['label'] ),  
		) ); 

		if ( ! empty( $this->args['href'] ) ) { ?>

			<a 
			href="<?php echo esc_url( $this->args['href'] ); ?>"
			class="<?php echo esc_attr( $class ); ?>"
			<?php echo $attrs; ?>><?php 

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
			<?php echo $attrs . ' ' . $button_attrs; ?>><?php 

				$this->render_internal_elements(); 

			?></button>

		<?php }

	}

}
