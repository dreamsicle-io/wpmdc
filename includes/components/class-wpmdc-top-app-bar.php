<?php 
/**
 * WPMDC Top App Bar Class.
 *
 * @package    wpmdc
 * @subpackage includes/components/templates
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Top App Bar.
 *
 * @since  0.0.1 
 */
class WPMDC_Top_App_Bar {

	public static function open_app_bar( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo' => true, 
			'id'   => uniqid( strtolower( get_called_class() ) . '_' ), 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
			'id'   => 'string', 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'wpmdc-top-app-bar' => true, 
			'mdc-top-app-bar'   => true, 
		) );
		
		$output = '<header role="toolbar" id="' . esc_attr( $args['id'] ) . '" class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_app_bar( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );
		
		$output = '</header>';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}



	public static function open_row( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo'  => true, 
			'align' => '', 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'  => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'mdc-top-app-bar__row' => true, 
		) );
		
		$output = '<div class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_row( $args = array() ) {
		
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

	public static function open_section( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo'        => true, 
			'align'       => '', 
			'menu_anchor' => false, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'        => 'boolean', 
			'align'       => array( '', 'start', 'end' ), 
			'menu_anchor' => 'boolean',  
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'mdc-top-app-bar__section'                                      => true, 
			'mdc-top-app-bar__section--align-' . esc_attr( $args['align'] ) => ! empty( $args['align'] ), 
			'mdc-menu-anchor'                                               => $args['menu_anchor']
		) );
		
		$output = '<div class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_section( $args = array() ) {
		
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

	public static function title( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
			'text' => '', 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
			'text' => 'string', 
		) );

		WPMDC_Component::render_errors( $errors );

		if ( empty( $args['text'] ) ) {
			return;
		}
		
		$output = '<h4 class="mdc-toolbar__title">' . esc_html( $args['text'] ) . '</h4>';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function navigation_icon( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo'   => true, 
			'drawer' => '', 
			'icon'   => 'menu', 
			'label'  => _x( 'Toggle Drawer', 'top app bar component default navigation icon label', 'wpmdc' ), 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'   => 'boolean', 
			'drawer' => 'string', 
			'label'  => 'string', 
			'icon'   => 'string', 
		) );

		$class = WPMDC_Component::parse_classes( array(
			'mdc-top-app-bar__navigation-icon' => true, 
			'material-icons'                   => true, 
		) );

		$attrs = WPMDC_Component::parse_attrs( array(
			'data-for-drawer="' . esc_attr( $args['drawer'] ) . '"' => ! empty( $args['drawer'] ), 
			'aria-label="' . esc_attr( $args['label'] ) . '"'       => ! empty( $args['label'] ), 
			'title="' . esc_attr( $args['label'] ) . '"'            => ! empty( $args['label'] ), 
		) );

		WPMDC_Component::render_errors( $errors );

		ob_start(); ?>

		<button 
		type="button"
		class="<?php echo esc_attr( $class ); ?>"
		<?php echo $attrs; ?>><?php 

			echo esc_html( $args['icon'] );

		?></button>
		
		<?php 
		$output = ob_get_clean();

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}
	}

	public static function action_item( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo'   => true, 
			'href'   => '', 
			'menu'   => '', 
			'icon'   => 'more_vert', 
			'label'  => _x( 'Toggle Menu', 'top app bar component default action item label', 'wpmdc' ), 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'   => 'boolean', 
			'href'   => 'string', 
			'menu'   => 'string', 
			'label'  => 'string', 
			'icon'   => 'string', 
		) );

		$class = WPMDC_Component::parse_classes( array(
			'mdc-top-app-bar__action-item' => true, 
			'material-icons'               => true, 
		) );

		$attrs = WPMDC_Component::parse_attrs( array(
			'aria-label="' . esc_attr( $args['label'] ) . '"'   => ! empty( $args['label'] ), 
			'title="' . esc_attr( $args['label'] ) . '"'        => ! empty( $args['label'] ), 
		) );

		WPMDC_Component::render_errors( $errors );

		ob_start(); 

		if ( ! empty( $args['href'] ) ) { ?>

			<a 
			href="<?php echo esc_url( $args['href'] ); ?>"
			class="<?php echo esc_attr( $class ); ?>"
			<?php echo $attrs; ?>><?php 

				echo esc_html( $args['icon'] );

			?></a>

		<?php } else {

			$button_attrs = WPMDC_Component::parse_attrs( array(
				'data-for-menu="' . esc_attr( $args['menu'] ) . '"' => ! empty( $args['menu'] ), 
			) ); ?> 

			<button 
			type="button"
			class="<?php echo esc_attr( $class ); ?>"
			<?php echo $attrs; ?>
			<?php echo $button_attrs; ?>><?php 

				echo esc_html( $args['icon'] );

			?></button>

		<?php }

		$output = ob_get_clean();

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}
	}

}
