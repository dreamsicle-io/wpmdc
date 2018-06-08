<?php
/**
 * WPMDC Slider Class.
 *
 * @package    wpmdc
 * @subpackage includes/components
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Slider.
 *
 * @since  0.0.1 
 */
class WPMDC_Slider extends WPMDC_Component {

	/**
	 * Construct.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	function __construct( $args = array() ) {

		$uniqid = $this->get_uniqid();

		$this->arg_types = array(
			'mod'           => array( '', 'discrete' ), 
			'id'            => 'string', 
			'name'          => 'string', 
			'value'         => 'float', 
			'min'           => 'float', 
			'max'           => 'float', 
			'step'          => 'float', 
			'markers'       => 'boolean', 
			'label'         => 'string', 
			'disabled'      => 'boolean', 
			'class'         => 'string', 
		);

		$this->default_args = array(
			'mod'      => '', 
			'id'       => $uniqid, 
			'name'     => $uniqid, 
			'value'    => 0, 
			'min'      => 0, 
			'max'      => 100, 
			'step'     => 0, 
			'markers'  => false, 
			'label'    => _x( 'Slider', 'slider component default label', 'wpmdc' ), 
			'disabled' => false, 
			'class'    => '', 
		);

		parent::__construct( $args );

	}

	public function render() {

		if ( self::has_errors( $this->errors ) ) { 
			self::render_errors( $this->errors ); 
			return; 
		}

		$tabindex = $this->args['disabled'] ? '-1' : '0';

		$class = self::parse_classes( array(
			'wpmdc-slider'                      => true, 
			'mdc-slider'                        => true, 
			'mdc-slider--' . $this->args['mod'] => ! empty( $this->args['mod'] ), 
			'mdc-slider--display-markers'       => $this->args['markers'], 
			'mdc-slider--disabled'              => $this->args['disabled'], 
			esc_attr( $this->args['class'] )    => ! empty( $this->args['class'] ), 
		) );

		$container_attrs = self::parse_attrs( array( 
			'tabindex="' . esc_attr( $tabindex ) . '"'            => true, 
			'disabled'                                            => $this->args['disabled'],
			'aria-disabled="true"'                                => $this->args['disabled'],
			'data-step="' . esc_attr( $this->args['step'] ) . '"' => ( $this->args['step'] > 0 ), 
		) ); ?>

		<div 
		role="slider"
		id="<?php echo esc_attr( $this->args['id'] ); ?>"
		class="<?php echo esc_attr( $class ); ?>" 
		aria-valuemin="<?php echo esc_attr( $this->args['min'] ); ?>" 
		aria-valuemax="<?php echo esc_attr( $this->args['max'] ); ?>" 
		aria-valuenow="<?php echo esc_attr( $this->args['value'] ); ?>"
		aria-label="<?php echo esc_attr( $this->args['label'] ); ?>"
		<?php echo $container_attrs; ?>>

			<div class="mdc-slider__track-container">
				
				<div class="mdc-slider__track"></div>

				<?php if ( $this->args['markers'] ) { ?>

					<div class="mdc-slider__track-marker-container"></div>

				<?php } ?>

			</div>

			<div class="mdc-slider__thumb-container">

				<?php if ( $this->args['mod'] === 'discrete' ) { ?>

					<div class="mdc-slider__pin">
						<span class="mdc-slider__pin-value-marker"></span>
					</div>

				<?php } ?>

				<svg class="mdc-slider__thumb" width="21" height="21">
					<circle cx="10.5" cy="10.5" r="7.875"></circle>
				</svg>

				<div class="mdc-slider__focus-ring"></div>

			</div>

		</div>

	<?php }

}
