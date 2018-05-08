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
			'mod'           => array( '', 'outlined', 'raised', 'unelevated' ), 
			'type'          => array( 'button', 'reset' ), 
			'dense'         => 'boolean', 
			'icon'          => 'string', 
			'text'          => 'string', 
			'disabled'      => 'boolean', 
		);

		$this->default_args = array(
			'mod'           => '', 
			'type'          => 'button', 
			'dense'         => false, 
			'icon'          => '', 
			'text'          => _x( 'Button', 'button component default text', 'wpmdc' ), 
			'disabled'      => false, 
		);

		parent::__construct( $args );

	}

	public function render() {

		if ( self::has_errors( $this->errors ) ) { 
			self::render_errors( $this->errors ); 
			return; 
		}

		$class = self::parse_classes( array(
			'wpmdc-button'                      => true, 
			'mdc-button'                        => true, 
			'mdc-ripple-surface'                => true, 
			'mdc-button--' . $this->args['mod'] => ! empty( $this->args['mod'] ), 
			'mdc-button--dense'                 => $this->args['dense'], 
		) ); ?>

		<button 
		type="<?php echo esc_attr( $this->args['type'] ); ?>" 
		class="<?php echo esc_attr( $class ); ?>"
		<?php 
		echo $this->args['disabled'] ? ' disabled' : ''; 
		echo $this->args['disabled'] ? ' aria-disabled="disabled"' : ''; 
		?>>

			<?php if ( ! empty( $this->args['icon'] ) ) { ?>

				<i class="material-icons mdc-button__icon" aria-hidden="true"><?php 

					echo esc_html( $this->args['icon'] );

				?></i>

			<?php } ?>

			<?php if ( ! empty( $this->args['text'] ) ) {

				echo esc_html( $this->args['text'] );

			} ?>

		</a>

	<?php }

}
