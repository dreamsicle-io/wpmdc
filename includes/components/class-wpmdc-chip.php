<?php
/**
 * WPMDC Chip Class.
 *
 * @package    wpmdc
 * @subpackage includes/components
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Chip.
 *
 * @since  0.0.1 
 */
class WPMDC_Chip extends WPMDC_Component {

	/**
	 * Construct.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	function __construct( $args = array() ) {

		$this->arg_types = array(
			'mod'       => array( '', 'filter' ), 
			'href'      => 'string', 
			'icon'      => 'string', 
			'text'      => 'string', 
			'selected'  => 'boolean',
			'removable' => 'boolean', 
			'disabled'  => 'boolean', 
			'class'     => 'string', 
		);

		$this->default_args = array(
			'mod'       => '', 
			'href'      => '', 
			'icon'      => '', 
			'text'      => _x( 'Chip', 'chip component default button text', 'wpmdc' ), 
			'selected'  => false, 
			'removable' => false, 
			'disabled'  => false, 
			'class'     => '', 
		);

		parent::__construct( $args );

	}

	public function render_leading_icon() {

		if ( ! empty( $this->args['icon'] ) ) {

			$icon_class = self::parse_classes( array(
				'material-icons'                 => true, 
				'mdc-chip__icon'                 => true, 
				'mdc-chip__icon--leading'        => true, 
				'mdc-chip__icon--leading-hidden' => $this->args['selected'], 
			) ); ?> 

			<i 
			class="<?php echo esc_attr( $icon_class ); ?>" 
			aria-hidden="true"><?php 

				echo esc_html( $this->args['icon'] );

			?></i>

		<?php }

		if ( $this->args['mod'] === 'filter' ) { ?>

			<div class="mdc-chip__checkmark" >
				
				<svg 
				class="mdc-chip__checkmark-svg" 
				viewBox="-2 -3 30 30">
					
					<path 
					class="mdc-chip__checkmark-path" 
					fill="none" 
					stroke="black"
					d="M1.73,12.91 8.1,19.28 22.79,4.59"/>

				</svg>

			</div>

		<?php } 

	}

	public function render_trailing_icon() {

		if ( $this->args['removable'] ) { ?>

			<i 
			class="material-icons mdc-chip__icon mdc-chip__icon--trailing" 
			aria-hidden="true"
			aria-role="button"
			tabindex="0">cancel</i>

		<?php }

	}

	public function render_internal_elements() {

		$this->render_leading_icon(); 

		if ( ! empty( $this->args['text'] ) ) { ?>

			<span class="mdc-chip__text"><?php 

				echo esc_html( $this->args['text'] );

			?></span>

		<?php }

		$this->render_trailing_icon(); 

	}

	public function render() {

		if ( self::has_errors( $this->errors ) ) { 
			self::render_errors( $this->errors ); 
			return; 
		}

		$class = self::parse_classes( array(
			'wpmdc-chip'                     => true, 
			'mdc-chip'                       => true, 
			'mdc-chip--selected'             => $this->args['selected'], 
			esc_attr( $this->args['class'] ) => ! empty( $this->args['class'] ), 
		) ); 

		if ( ! empty( $this->args['href'] ) ) { ?>

			<a 
			href="<?php echo esc_url( $this->args['href'] ); ?>"
			class="<?php echo esc_attr( $class ); ?>"><?php 

				$this->render_internal_elements(); 

			?></a>

		<?php } else {

			$button_attrs = self::parse_attrs( array( 
				'disabled'             => $this->args['disabled'],
				'aria-disabled="true"' => $this->args['disabled'],
			) ); ?> 

			<button 
			type="button" 
			class="<?php echo esc_attr( $class ); ?>"
			<?php echo $button_attrs; ?>><?php 

				$this->render_internal_elements(); 

			?></button>

		<?php }

	}

	public static function open_set( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo'  => true, 
			'mod'   => '', 
			'class' => '', 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'  => 'boolean', 
			'mod'   => array( '', 'input', 'choice', 'filter' ), 
			'class' => 'string', 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'wpmdc-chip-set'                            => true, 
			'mdc-chip-set'                              => true, 
			'mdc-chip-set--' . esc_attr( $args['mod'] ) => ! empty( $args['mod'] ), 
			esc_attr( $args['class'] )                  => ! empty( $args['class'] ), 
		) );
		
		$output = '<div class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_set( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );
		
		$output = '</div>';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

}
