<?php
/**
 * WPMDC Icon Button Class.
 *
 * @package    wpmdc
 * @subpackage includes/components
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Icon Button.
 *
 * @since  0.0.1 
 */
class WPMDC_Icon_Button extends WPMDC_Component {

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
			'type'          => array( 'button', 'submit', 'reset' ), 
			'label'         => 'string', 
			'on'            => 'boolean', 
			'disabled'      => 'boolean', 
			'on_content'    => 'string', 
			'on_label'      => 'string', 
			'off_content'   => 'string', 
			'off_label'     => 'string', 
		);

		$this->default_args = array(
			'option_name'   => '', 
			'id'            => $this->get_uniqid(), 
			'type'          => 'button', 
			'label'         => _x( 'Icon Button', 'icon button component default label', 'wpmdc' ), 
			'on'            => false, 
			'disabled'      => false, 
			'on_content'    => 'favorite', 
			'on_label'      => _x( 'On', 'icon button component default "on" label', 'wpmdc' ), 
			'off_content'   => 'favorite_border', 
			'off_label'     => _x( 'Off', 'icon button component default "off" label', 'wpmdc' ), 
		);

		parent::__construct( $args );

	}

	public function render() {

		if ( self::has_errors( $this->errors ) ) { 
			self::render_errors( $this->errors ); 
			return; 
		}

		$tabindex = $this->args['disabled'] ? '-1' : '0';

		$container_class = self::parse_classes( array(
			'wpmdc-icon-button'         => true, 
			'mdc-icon-button'           => true, 
			'material-icons'            => true, 
			'mdc-icon-button--disabled' => $this->args['disabled'], 
		) );

		$attrs = self::parse_attrs( array( 
			'disabled'             => $this->args['disabled'],
			'aria-disabled="true"' => $this->args['disabled'],
		) ); ?>

		<button 
		type="button" 
		id="<?php echo esc_attr( $this->args['id'] ); ?>"
		class="<?php echo esc_attr( $container_class ); ?>"
		aria-label="<?php echo esc_attr( $this->args['label'] ); ?>" 
		aria-pressed="<?php echo $this->args['on'] ? 'true' : 'false'; ?>"
		data-toggle-on-content="<?php echo esc_attr( $this->args['on_content'] ); ?>"
		data-toggle-on-label="<?php echo esc_attr( $this->args['on_label'] ); ?>"
		data-toggle-off-content="<?php echo esc_attr( $this->args['off_content'] ); ?>"
		data-toggle-off-label="<?php echo esc_attr( $this->args['off_content'] ); ?>"
		tabindex="<?php echo esc_attr( $tabindex ); ?>"
		<?php echo $attrs; ?>><?php
			
			if ( $this->args['on'] ) {

				echo esc_html( $this->args['on_content'] );

			} else {

				echo esc_html( $this->args['off_content'] );

			}

		?></button>

	<?php }

}
