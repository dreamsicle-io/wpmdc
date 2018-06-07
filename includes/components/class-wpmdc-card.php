<?php 
/**
 * WPMDC Card Class.
 *
 * @package    wpmdc
 * @subpackage includes/components/templates
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Card.
 *
 * @since  0.0.1 
 */
class WPMDC_Card extends WPMDC_Component {

	function __construct( $args = array() ) {

		$this->arg_types = array(
			'mod'            => array( '', 'outlined' ), 
			'href'           => 'string', 
			'primary'        => 'string', 
			'secondary'      => 'string', 
			'image'          => 'string', 
			'action_buttons' => 'array', 
			'action_icons'   => 'array', 
		);

		$this->default_args = array(
			'mod'            => '', 
			'href'           => '', 
			'primary'        => '', 
			'secondary'      => '', 
			'image'          => '', 
			'action_buttons' => array(), 
			'action_icons'   => array(), 
		);

		parent::__construct( $args );

	}

	public function render() {

		if ( self::has_errors( $this->errors ) ) { 
			self::render_errors( $this->errors ); 
			return; 
		}

		self::open_card( array( 'mod' => $this->args['mod'] ) );

			if ( ! empty( $this->args['href'] ) ) {

				self::open_primary_action( array( 'href' => $this->args['href'] ) );

			}

				if ( ! empty( $this->args['image'] ) ) {

					self::media( array( 'image' => $this->args['image'] ) );

				}

				if ( ! empty( $this->args['primary'] ) ) { 
					
					self::open_primary();

						echo wp_kses_post( $this->args['primary'] );

					self::close_primary(); 

				}  

				if ( ! empty( $this->args['secondary'] ) ) { 
					
					self::open_secondary();

						echo wp_kses_post( $this->args['secondary'] );

					self::close_secondary(); 

				} 

			if ( ! empty( $this->args['href'] ) ) {

				self::close_primary_action( array( 'href' => true ) );

			}

			if ( ! empty( $this->args['action_buttons'] ) || ! empty( $this->args['action_icons'] ) ) {

				self::open_actions();

					if ( ! empty( $this->args['action_buttons'] ) ) {

						self::open_action_buttons();

							foreach ( $this->args['action_buttons'] as $button_args ) {

								if ( is_array( $button_args ) && ! empty( $button_args ) ) {

									wpmdc_component( new WPMDC_Button( $button_args ) );

								}

							}

						self::close_action_buttons();

					}

					if ( ! empty( $this->args['action_icons'] ) ) {

						self::open_action_icons();

							foreach ( $this->args['action_icons'] as $icon_args ) {

								if ( is_array( $icon_args ) && ! empty( $icon_args ) ) {

									self::action_icon( $icon_args );

								}

							}

						self::close_action_icons();

					}

				self::close_actions();

			}

		self::close_card();

	}

	public static function open_card( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo'      => true, 
			'container' => 'div', 
			'mod'       => '', 
			'id'        => uniqid( strtolower( get_called_class() ) . '_' ), 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'      => 'boolean', 
			'container' => array( 'article', 'div' ), 
			'mod'       => array( '', 'outlined' ), 
			'id'        => 'string', 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'wpmdc-card'                            => true, 
			'mdc-card'                              => true, 
			'mdc-card--' . esc_attr( $args['mod'] ) => ! empty( $args['mod'] ), 
		) );
		
		$output = '<' . esc_attr( $args['container'] ) . ' id="' . esc_attr( $args['id'] ) . '" class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_card( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo'      => true, 
			'container' => 'div', 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'      => 'boolean', 
			'container' => array( 'article', 'div' ), 
		) );

		WPMDC_Component::render_errors( $errors );
		
		$output = '</' . esc_attr( $args['container'] ) . '>';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function open_media( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo'    => true, 
			'mod'     => '16-9', 
			'image'   => '', 
			'content' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'    => 'boolean', 
			'mod'     => array( 'square', '16-9' ), 
			'image'   => 'string', 
			'content' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'mdc-card__media'                              => true, 
			'mdc-card__media--' . esc_attr( $args['mod'] ) => ! empty( $args['mod'] ), 
		) );

		$attrs = WPMDC_Component::parse_attrs( array(
			'style="background-image:url(\'' . esc_url( $args['image'] ) . '\');"' => ! empty( $args['image'] ), 
		) );
		
		$output  = '<header class="' . esc_attr( $class ) . '" ' . $attrs . '>';

		if ( $args['content'] ) {
			$output .= '<div class="mdc-card__media-content">';
		}

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_media( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo'    => true, 
			'content' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'    => 'boolean', 
			'content' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$output = '</header>';
		
		if ( $args['content'] ) {
			$output = '</div>' . $output;
		}

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function media( $open_args = array(), $close_args = array() ) {
		self::open_media( array_merge( $open_args, array( 'content' => false ) ) );
		self::close_media( array_merge( $close_args, array( 'content' => false ) ) );
	}

	public static function open_primary( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		$class = WPMDC_Component::parse_classes( array(
			'wpmdc-card__primary' => true, 
		) );

		WPMDC_Component::render_errors( $errors );

		$output = '<div class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_primary( $args = array() ) {
		
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

	public static function open_secondary( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		$class = WPMDC_Component::parse_classes( array(
			'wpmdc-card__secondary' => true, 
		) );

		WPMDC_Component::render_errors( $errors );

		$output = '<div class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_secondary( $args = array() ) {
		
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

	public static function open_actions( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'mdc-card__actions'=> true, 
		) );
		
		$output = '<div class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_actions( $args = array() ) {
		
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

	public static function open_action_buttons( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'mdc-card__action-buttons'=> true, 
		) );
		
		$output = '<div class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_action_buttons( $args = array() ) {
		
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

	public static function open_action_icons( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo' => true, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'mdc-card__action-icons'=> true, 
		) );
		
		$output = '<div class="' . esc_attr( $class ) . '">';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_action_icons( $args = array() ) {
		
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

	public static function open_primary_action( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo'   => true, 
			'href'   => '', 
			'target' => '', 
			'rel'    => '', 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'   => 'boolean', 
			'href'   => 'string', 
			'target' => 'string', 
			'rel'    => 'string', 
		) );

		WPMDC_Component::render_errors( $errors );

		$class = WPMDC_Component::parse_classes( array( 
			'mdc-card__primary-action' => true, 
			'mdc-ripple-surface'       => true, 
		) );

		$attrs = WPMDC_Component::parse_attrs( array( 
			'class="' . esc_attr( $class ) . '"' => ! empty( $class ), 
		) );

		if ( ! empty( $args['href'] ) ) {

			$attrs .= WPMDC_Component::parse_attrs( array( 
				'href="' . esc_url( $args['href'] ) . '"'     => true, 
				'target="' . esc_url( $args['target'] ) . '"' => ! empty( $args['target'] ), 
				'rel="' . esc_url( $args['rel'] ) . '"'       => ! empty( $args['rel'] ), 
			) );
		
			$output = '<a ' . $attrs . '>';

		} else {

			$output = '<div ' . $attrs . '>';

		}

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function close_primary_action( $args = array() ) {
		
		$args = wp_parse_args( $args, array(
			'echo' => true, 
			'href' => false, 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo' => 'boolean', 
			'href' => 'boolean', 
		) );

		WPMDC_Component::render_errors( $errors );

		$output = $args['href'] ? '</a>' : '</div>';

		if ( $args['echo'] ) {

			echo $output;

		} else {

			return $output;
			
		}

	}

	public static function action_icon( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'echo'   => true, 
			'menu'   => '', 
			'icon'   => 'more_vert', 
			'label'  => _x( 'Toggle Menu', 'card component default action item label', 'wpmdc' ), 
		) );

		$errors = WPMDC_Component::check_arg_types( $args, array(
			'echo'   => 'boolean', 
			'menu'   => 'string', 
			'label'  => 'string', 
			'icon'   => 'string', 
		) );

		$class = WPMDC_Component::parse_classes( array(
			'mdc-card__action'       => true, 
			'mdc-card__action--icon' => true, 
			'material-icons'         => true, 
			'mdc-ripple-surface'     => true, 
		) );

		$attrs = WPMDC_Component::parse_attrs( array(
			'aria-label="' . esc_attr( $args['label'] ) . '"' => ! empty( $args['label'] ), 
			'title="' . esc_attr( $args['label'] ) . '"'      => ! empty( $args['label'] ), 
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