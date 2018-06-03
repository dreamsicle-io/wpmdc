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

		$uniqid = $this->get_uniqid();

		$this->arg_types = array(
			'id' => 'string', 
		);

		$this->default_args = array(
			'id' => $uniqid, 
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

		$container_class = self::parse_classes( array(
			'wpmdc-component-class' => true, 
			'mdc-component-class'   => true, 
		) ); ?>

		<div 
		id="<?php echo esc_attr( $this->args['id'] ); ?>"
		class="<?php echo esc_attr( $container_class ); ?>">

		</div>

	<?php }

}
