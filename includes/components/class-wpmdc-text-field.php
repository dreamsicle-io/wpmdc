<?php
/**
 * WPMDC Text Field Class.
 *
 * @package    wpmdc
 * @subpackage includes/components
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Text Field.
 *
 * @since  0.0.1 
 */
class WPMDC_Text_Field extends WPMDC_Component {

	/**
	 * Construct.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	function __construct( $args = array() ) {

		$uniqid = $this->get_uniqid();

		$this->arg_types = array(
			'mod'           => array( '', 'outlined', 'box', 'fullwidth' ), 
			'dense'         => 'boolean', 
			'icon'          => 'string', 
			'icon_position' => array( 'leading', 'trailing' ), 
			'type'          => array( 'textarea', 'text', 'number', 'url', 'password', 'email', 'search', 'tel', 'date', 'datetime-local', 'month', 'week', 'time', 'color' ), 
			'name'          => 'string', 
			'id'            => 'string', 
			'value'         => 'string', 
			'label'         => 'string', 
			'helper_text'   => 'string', 
			'required'      => 'boolean', 
			'disabled'      => 'boolean', 
		);

		$this->default_args = array(
			'mod'           => '', 
			'dense'         => false, 
			'icon'          => '', 
			'icon_position' => 'leading',
			'type'          => 'text', 
			'name'          => $uniqid, 
			'id'            => $uniqid, 
			'value'         => '', 
			'label'         => _x( 'Text Field', 'text field component default label', 'wpmdc' ), 
			'helper_text'   => '', 
			'required'      => false, 
			'disabled'      => false, 
		);

		parent::__construct( $args );

	}

	public function render() {

		if ( self::has_errors( $this->errors ) ) { 
			self::render_errors( $this->errors ); 
			return; 
		}

		$has_icon = ( ! empty( $this->args['icon'] ) && in_array( $this->args['mod'], array( 'outlined', 'box', 'fullwidth' ) ) );
		// asterisk must only applied to placeholder, MDC handles this on floating labels.
		$asterisk = $this->args['required'] ? ' *' : ''; 

		$container_class = self::parse_classes( array(
			'wpmdc-text-field'                      => true, 
			'mdc-text-field'                        => true, 
			'mdc-text-field--textarea'              => ( $this->args['type'] === 'textarea' ), 
			'mdc-text-field--' . $this->args['mod'] => ! empty( $this->args['mod'] ), 
			'mdc-text-field--dense'                 => $this->args['dense'], 
			'mdc-text-field--disabled'              => $this->args['disabled'], 
			'mdc-text-field--with-leading-icon'     => $has_icon && ( ( $this->args['type'] !== 'textarea' ) && ( $this->args['icon_position'] === 'leading' ) ),
			'mdc-text-field--with-trailing-icon'    => $has_icon && ( ( $this->args['type'] !== 'textarea' ) && ( $this->args['icon_position'] === 'trailing' ) ),
			'mdc-text-field--upgraded'              => ! empty( $args['value'] ), 
		) );

		$label_class = self::parse_classes( array(
			'mdc-floating-label'              => true, 
			'mdc-floating-label--float-above' => ! empty( $args['value'] ), 
		) ); 

		$input_attrs = self::parse_attrs( array( 
			'placeholder="' . esc_attr( $this->args['label'] . $asterisk ) . '"'   => ( ( $this->args['mod'] === 'fullwidth' ) && ( $this->args['type'] !== 'textarea' ) && ! empty( $this->args['label'] ) ),
			'required'                                                             => $this->args['required'],
			'aria-required="true"'                                                 => $this->args['required'],
			'disabled'                                                             => $this->args['disabled'],
			'aria-disabled="true"'                                                 => $this->args['disabled'],
			'aria-controls="' . esc_attr( $this->args['id'] ) . '_helper_text"'    => ! empty( $this->args['helper_text'] ), 
			'aria-describedby="' . esc_attr( $this->args['id'] ) . '_helper_text"' => ! empty( $this->args['helper_text'] ), 
		) ); ?>

		<div 
		id="<?php echo esc_attr( $this->args['id'] ); ?>"
		class="<?php echo esc_attr( $container_class ); ?>">

			<?php if ( $has_icon && ( $this->args['icon_position'] === 'leading' ) && ( $this->args['type'] !== 'textarea' ) ) { ?>

				<i class="material-icons mdc-text-field__icon"><?php 

					echo esc_html( $this->args['icon'] );

				?></i>

			<?php } ?>

			<?php if ( $this->args['type'] === 'textarea' ) {

				$rows = $this->args['dense'] ? 4 : 8;
				$columns = $this->args['dense'] ? 24 : 40; ?>

				<textarea 
				id="<?php echo esc_attr( $this->args['id'] . '_input' ); ?>" 
				name="<?php echo esc_attr( $this->args['name'] ); ?>" 
				class="mdc-text-field__input" 
				rows="<?php echo esc_attr( $rows ); ?>" 
				cols="<?php echo esc_attr( $columns ); ?>"
				<?php echo $input_attrs; ?>><?php 

					echo esc_textarea( $this->args['value'] ); 

				?></textarea>

			<?php } else { ?>

				<input 
				type="<?php echo esc_attr( $this->args['type'] ); ?>" 
				name="<?php echo esc_attr( $this->args['name'] ); ?>" 
				id="<?php echo esc_attr( $this->args['id'] . '_input' ); ?>" 
				value="<?php echo esc_attr( $this->args['value'] ); ?>" 
				class="mdc-text-field__input"
				<?php echo $input_attrs; ?> />

			<?php } ?>

			<?php if ( ( $this->args['mod'] !== 'fullwidth' ) || ( $this->args['type'] === 'textarea' ) ) { ?>

				<label 
				for="<?php echo esc_attr( $this->args['id'] . '_input' ); ?>"
				class="<?php echo esc_attr( $label_class ); ?>"><?php 

					echo esc_html( $this->args['label'] );

				?></label>

			<?php } ?>

			<?php if ( $has_icon && ( $this->args['icon_position'] === 'trailing' ) && ( $this->args['type'] !== 'textarea' ) ) { ?>

				<i class="material-icons mdc-text-field__icon"><?php 

					echo esc_html( $this->args['icon'] );

				?></i>

			<?php } ?>

			<?php 
			if ( ( $this->args['mod'] !== 'fullwidth' ) && ( $this->args['type'] !== 'textarea' ) ) { 

				if ( $this->args['mod'] === 'outlined' ) { ?>

					<div class="mdc-notched-outline">

						<svg><path class="mdc-notched-outline__path" /></svg>

					</div>

					<div class="mdc-notched-outline__idle"></div>

				<?php } else { ?>

					<div class="mdc-line-ripple"></div>

				<?php }

			} ?>

		</div>

		<?php if ( ! empty( $this->args['helper_text'] ) ) { ?>

			<p 
			id="<?php esc_attr( $this->args['id'] . '_helper_text' ); ?>" 
			class="mdc-text-field-helper-text" 
			aria-hidden="true"><?php 
			
				echo wp_kses_post( $this->args['helper_text'] );

			?></p>

		<?php } 

	}

}
