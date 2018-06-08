<?php
/**
 * WPMDC Component Template Class.
 *
 * @package    wpmdc
 * @subpackage includes/components/templates
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Component Template.
 *
 * @since  0.0.1 
 */
class WPMDC_Component_Template extends WPMDC_Component {

	/**
	 * Construct.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	function __construct( $args = array() ) {

		$this->arg_types = array(
			'id'    => 'string', 
			'class' => 'string', 
		);

		$this->default_args = array(
			'id'    => $this->get_uniqid(), 
			'class' => '', 
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
			'wpmdc-component-class'          => true, 
			'mdc-component-class'            => true, 
			esc_attr( $this->args['class'] ) => ! empty( $this->args['class'] ), 
		) ); ?>

		<div 
		id="<?php echo esc_attr( $this->args['id'] ); ?>"
		class="<?php echo esc_attr( $class ); ?>">

		</div>

	<?php }

}
