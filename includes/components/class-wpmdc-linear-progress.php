<?php
/**
 * WPMDC Linear Progress Class.
 *
 * @package    wpmdc
 * @subpackage includes/components/templates
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Linear Progress.
 *
 * @since  0.0.1 
 */
class WPMDC_Linear_Progress extends WPMDC_Component {

	/**
	 * Construct.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	function __construct( $args = array() ) {

		$uniqid = $this->get_uniqid();

		$this->arg_types = array(
			'id'            => 'string', 
			'indeterminate' => 'boolean', 
			'reversed'      => 'boolean', 
			'closed'        => 'boolean', 
			'progress'      => 'float', 
			'buffer'        => 'float', 
		);

		$this->default_args = array(
			'id'            => $uniqid, 
			'indeterminate' => false, 
			'reversed'      => false, 
			'closed'        => false, 
			'progress'      => 0, 
			'buffer'        => 1, 
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
			'wpmdc-linear-progress'              => true, 
			'mdc-linear-progress'                => true, 
			'mdc-linear-progress--indeterminate' => $this->args['indeterminate'], 
			'mdc-linear-progress--reversed'      => $this->args['reversed'], 
			'mdc-linear-progress--closed'        => $this->args['closed'], 
		) );

		$attrs = self::parse_attrs( array(
			'data-progress="' . esc_attr( $this->args['progress'] ) . '"' => ! $this->args['indeterminate'],
			'data-buffer="' . esc_attr( $this->args['buffer'] ) . '"' => ! $this->args['indeterminate'],
		) ); ?>

		<div 
		role="progressbar" 
		id="<?php echo esc_attr( $this->args['id'] ); ?>"
		class="<?php echo esc_attr( $class ); ?>"
		<?php echo $attrs; ?>>

			<div class="mdc-linear-progress__buffering-dots"></div>

			<div class="mdc-linear-progress__buffer"></div>

			<div class="mdc-linear-progress__bar mdc-linear-progress__primary-bar">

				<span class="mdc-linear-progress__bar-inner"></span>

			</div>

			<div class="mdc-linear-progress__bar mdc-linear-progress__secondary-bar">

				<span class="mdc-linear-progress__bar-inner"></span>

			</div>

		</div>

	<?php }

}
