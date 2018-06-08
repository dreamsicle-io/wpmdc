<?php
/**
 * WPMDC Checkbox Class.
 *
 * @package    wpmdc
 * @subpackage includes/components
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Checkbox.
 *
 * @since  0.0.1 
 */
class WPMDC_Checkbox extends WPMDC_Component {

	/**
	 * Construct.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	function __construct( $args = array() ) {

		$uniqid = $this->get_uniqid();

		$this->arg_types = array(
			'indeterminate' => 'boolean', 
			'id'            => 'string', 
			'name'          => 'string', 
			'label'         => 'string', 
			'value'         => 'string', 
			'checked'       => 'boolean', 
			'required'      => 'boolean', 
			'disabled'      => 'boolean', 
			'class'         => 'string', 
		);

		$this->default_args = array(
			'indeterminate' => false, 
			'id'            => $uniqid, 
			'name'          => $uniqid, 
			'value'         => '1', 
			'label'         => _x( 'Checkbox', 'checkbox component default label', 'wpmdc' ), 
			'checked'       => false, 
			'required'      => false, 
			'disabled'      => false, 
			'class'         => '', 
		);

		parent::__construct( $args );

	}

	public function render() {

		if ( self::has_errors( $this->errors ) ) { 
			self::render_errors( $this->errors ); 
			return; 
		}

		$class = self::parse_classes( array(
			'wpmdc-checkbox'                      => true, 
			'mdc-checkbox'                        => true, 
			'wpmdc-checkbox--start-indeterminate' => $this->args['indeterminate'], 
			'mdc-checkbox--disabled'              => $this->args['disabled'], 
			esc_attr( $this->args['class'] )      => ! empty( $this->args['class'] ), 
		) );

		$input_attrs = self::parse_attrs( array( 
			'checked'              => $this->args['checked'],
			'aria-checked="true"'  => $this->args['checked'],
			'required'             => $this->args['required'],
			'aria-required="true"' => $this->args['required'],
			'disabled'             => $this->args['disabled'],
			'aria-disabled="true"' => $this->args['disabled'],
		) ); ?>

		<div class="mdc-form-field">

			<div 
			id="<?php echo esc_attr( $this->args['id'] ); ?>"
			class="<?php echo esc_attr( $class ); ?>">

				<input 
				type="checkbox"
				class="mdc-checkbox__native-control" 
				name="<?php echo esc_attr( $this->args['name'] ); ?>"
				id="<?php echo esc_attr( $this->args['id'] ); ?>_input"
				value="<?php echo esc_attr( $this->args['value'] ); ?>"
				<?php echo $input_attrs; ?> />
				
				<div class="mdc-checkbox__background">
					
					<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
						
						<path 
						class="mdc-checkbox__checkmark-path"
						fill="none"
						stroke="white"
						d="M1.73,12.91 8.1,19.28 22.79,4.59"/>

					</svg>
					
					<div class="mdc-checkbox__mixedmark"></div>
				
				</div>
			
			</div>

			<?php if ( ! empty( $this->args['label'] ) ) { ?>

				<label for="<?php echo esc_attr( $this->args['id'] ); ?>_input"><?php 

					echo wp_kses_post( $this->args['label'] );

				?></label>

			<?php } ?>

		</div>

	<?php }

}
