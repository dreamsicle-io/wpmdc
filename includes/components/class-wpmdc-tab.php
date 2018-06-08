<?php
/**
 * WPMDC Tab Class.
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
class WPMDC_Tab extends WPMDC_Component {

	/**
	 * Construct.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	function __construct( $args = array() ) {

		$this->arg_types = array(
			'mod'       => array( '', 'with-icon-and-text' ), 
			'type'      => array( 'button', 'submit', 'reset' ), 
			'href'      => 'string', 
			'dense'     => 'boolean', 
			'icon'      => 'string', 
			'text'      => 'string', 
			'disabled'  => 'boolean', 
			'active'    => 'boolean', 
			'class'     => 'string', 
		);

		$this->default_args = array(
			'mod'       => '', 
			'type'      => 'button', 
			'href'      => '', 
			'dense'     => false, 
			'icon'      => '', 
			'text'      => _x( 'Tab', 'tab component default button text', 'wpmdc' ), 
			'disabled'  => false, 
			'active'    => false, 
			'class'     => '', 
		);

		parent::__construct( $args );

	}

	public function render_internal_elements() {

		if ( ! empty( $this->args['icon'] ) ) {

			$icon_attrs = self::parse_attrs( array(
				'aria-hidden="true"'                                   => ( $this->args['mod'] === 'with-icon-and-text' ), 
				'aria-label="' . esc_attr( $this->args['text'] ) . '"' => ( ( $this->args['mod'] !== 'with-icon-and-text' ) && ! empty( $this->args['text'] ) ), 
			) ); ?>

			<i class="material-icons mdc-tab__icon" <?php echo $icon_attrs; ?>><?php 

				echo esc_html( $this->args['icon'] );

			?></i>

		<?php } 

		if ( ! empty( $this->args['icon'] ) && ( $this->args['mod'] === 'with-icon-and-text' ) ) {

			if ( ! empty( $this->args['text'] ) ) { ?>

				<span class="mdc-tab__icon-text"><?php 

					echo esc_html( $this->args['text'] );

				?></span>

			<?php }

		} elseif ( empty( $this->args['icon'] ) ) {

			if ( ! empty( $this->args['text'] ) ) { ?>

				<span><?php 

					echo esc_html( $this->args['text'] );

				?></span>

			<?php }

		}

	}

	public function render() {

		if ( self::has_errors( $this->errors ) ) { 
			self::render_errors( $this->errors ); 
			return; 
		}

		$class = self::parse_classes( array(
			'wpmdc-tab'                      => true, 
			'mdc-tab'                        => true, 
			'mdc-tab--active'                => $this->args['active'], 
			'mdc-tab--' . $this->args['mod'] => ! empty( $this->args['mod'] ), 
			esc_attr( $this->args['class'] ) => ! empty( $this->args['class'] ), 
		) ); 

		$attrs = self::parse_attrs( array( 
			'title="' . esc_attr( $this->args['text'] ) . '"' => ( ! empty( $this->args['icon'] ) && ( $this->args['mod'] !== 'with-icon-and-text' ) && ! empty( $this->args['text'] ) ), 
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
			<?php echo $attrs; ?>
			<?php echo $button_attrs; ?>><?php 

				$this->render_internal_elements(); 

			?></button>

		<?php }

	}

	public static function open_bar( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'mod'      => '', 
			'echo'     => true, 
			'scroller' => false, 
			'class'    => '', 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'mod'      => array( '', 'icon-tab-bar', 'icons-with-text' ),
			'echo'     => 'boolean', 
			'scroller' => 'boolean', 
			'class'    => 'string', 
		) );

		WPMDC_Component::render_errors( $errors );
		
		$class = WPMDC_Component::parse_classes( array( 
			'wpmdc-tab-bar'                            => true, 
			'mdc-tab-bar'                              => true, 
			'mdc-tab-bar--' . esc_attr( $args['mod'] ) => ! empty( $args['mod'] ), 
			'mdc-tab-bar-scroller__scroll-frame__tabs' => $args['scroller'],
			esc_attr( $args['class'] )                 => ! empty( $args['class'] ), 
		) );
		
		$output = '<div class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_bar() {

		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );
		
		$output  = '<span class="mdc-tab-bar__indicator"></span>';
		$output .= '</div>';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function open_scroller( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		$class = WPMDC_Component::parse_classes( array( 
			'wpmdc-tab-bar-scroller' => true, 
			'mdc-tab-bar-scroller'   => true, 
		) );

		WPMDC_Component::render_errors( $errors );

		ob_start(); ?>

		<div class="<?php echo esc_attr( $class ); ?>">
			
			<div class="mdc-tab-bar-scroller__indicator mdc-tab-bar-scroller__indicator--back">
				
				<button 
				type="button"
				class="mdc-tab-bar-scroller__indicator__inner material-icons" 
				aria-label="<?php esc_html_e( 'Back', 'wpmdc' ); ?>">navigate_before</button>

			</div>

			<div class="mdc-tab-bar-scroller__scroll-frame">
		
		<?php 
		$output = ob_get_clean();

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_scroller() {

		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		ob_start(); ?>

			</div><!-- .mdc-tab-bar-scroller__scroll-frame -->

			<div class="mdc-tab-bar-scroller__indicator mdc-tab-bar-scroller__indicator--forward">
				
				<button 
				type="button"
				class="mdc-tab-bar-scroller__indicator__inner material-icons" 
				aria-label="<?php esc_html_e( 'Next', 'wpmdc' ); ?>">navigate_next</button>
			
			</div>
		
		</div><!-- .mdc-tab-bar-scroller -->
		
		<?php 
		$output = ob_get_clean();

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		} 

	}

}
