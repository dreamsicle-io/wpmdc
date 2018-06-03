<?php
/**
 * WPMDC List Item Class.
 *
 * @package    wpmdc
 * @subpackage includes/components
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC List Item.
 *
 * @since  0.0.1 
 */
class WPMDC_List_Item extends WPMDC_Component {

	/**
	 * Construct.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	function __construct( $args = array() ) {

		$this->arg_types = array(
			'href'           => 'string', 
			'graphic'        => 'string', 
			'meta'           => 'string', 
			'primary_text'   => 'string', 
			'secondary_text' => 'string', 
			'disabled'       => 'boolean', 
			'two_line'       => 'boolean', 
			'avatar_list'    => 'boolean', 
			'data'           => 'array', 
		);

		$this->default_args = array(
			'href'           => '', 
			'graphic'        => 'label', 
			'meta'           => '', 
			'primary_text'   => _x( 'List Item', 'list item component default primary text', 'wpmdc' ), 
			'secondary_text' => _x( 'List Item Secondary Text', 'list item component default secondary text', 'wpmdc' ), 
			'disabled'       => false, 
			'two_line'       => false, 
			'avatar_list'    => false, 
			'data'           => array(), 
		);

		parent::__construct( $args );

	}

	public function render_internal_elements() {

		if ( $this->args['avatar_list'] && ! empty( $this->args['graphic'] ) ) { ?>

			<i 
			class="mdc-list-item__graphic material-icons" 
			aria-hidden="true"><?php 

				echo esc_html( $this->args['graphic'] );

			?></i>

		<?php } ?>

		<span class="mdc-list-item__text"><?php 

			if ( ! empty( $this->args['primary_text'] ) ) { ?>

				<span><?php 

					echo esc_html( $this->args['primary_text'] );

				?></span>

			<?php }

			if ( $this->args['two_line'] && ! empty( $this->args['secondary_text'] ) ) { ?>

				<span class="mdc-list-item__secondary-text"><?php 

					echo esc_html( $this->args['secondary_text'] );

				?></span>

			<?php }

		?></span>

		<?php if ( ! empty( $this->args['meta'] ) ) { ?>

			<i 
			class="mdc-list-item__meta material-icons" 
			aria-hidden="true"><?php 

				echo esc_html( $this->args['meta'] );

			?></i>

		<?php }

	}

	public function render() {

		if ( self::has_errors( $this->errors ) ) { 
			self::render_errors( $this->errors ); 
			return; 
		}

		$class = self::parse_classes( array(
			'wpmdc-list-item'    => true, 
			'mdc-list-item'      => true, 
			'mdc-ripple-surface' => true, 
		) ); 

		$data_attrs = self::parse_data_attrs( $this->args['data'] );

		if ( ! empty( $this->args['href'] ) ) { ?>

			<a 
			href="<?php echo esc_url( $this->args['href'] ); ?>"
			class="<?php echo esc_attr( $class ); ?>"
			<?php echo $data_attrs; ?>><?php 

				$this->render_internal_elements(); 

			?></a>

		<?php } else { ?> 

			<li 
			class="<?php echo esc_attr( $class ); ?>"
			<?php echo $data_attrs; ?>><?php 

				$this->render_internal_elements(); 

			?></li>

		<?php }

	}

	public static function open_list( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo'        => true, 
			'two_line'    => false, 
			'avatar_list' => false, 
			'dense'       => false, 
			'container'   => 'ul', 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'        => 'boolean', 
			'two_line'    => 'boolean', 
			'avatar_list' => 'boolean', 
			'dense'       => 'boolean', 
			'container'   => array( 'ul', 'div', 'nav' ), 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'wpmdc-list'            => true, 
			'mdc-list'              => true, 
			'mdc-list--two-line'    => $args['two_line'], 
			'mdc-list--avatar-list' => $args['avatar_list'], 
			'mdc-list--dense'       => $args['dense'], 
		) );
		
		$output = '<' . esc_attr( $args['container'] ) . ' class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_list( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo'      => true, 
			'container' => 'ul', 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'      => 'boolean', 
			'container' => array( 'ul', 'div', 'nav' ), 
		) );

		WPMDC_Component::render_errors( $errors );
		
		$output = '</' . esc_attr( $args['container'] ) . '>';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

}
