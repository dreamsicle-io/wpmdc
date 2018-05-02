<?php 
/**
 * The WPMDC Navigation Class.
 *
 * @package     wpmdc
 * @subpackage  includes
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Navigation.
 *
 * @since  0.0.1 
 */
class WPMDC_Navigation {

	/**
	 * Construct.
	 *
	 * @since   0.0.1
	 * @return  void
	 */
	function __construct() {

	}

	/**
	 * Initialize.
	 *
	 * @since   0.0.1
	 * @return  void
	 */
	public function init() {

		// Hooks
		add_action( 'after_setup_theme', array( $this, 'manage_locations' ), 10 );

		// Filters
		add_filter( 'widget_nav_menu_args', array( $this, 'manage_widget_args' ), 10, 4 );
		add_filter( 'nav_menu_submenu_css_class', array( $this, 'manage_submenu_classes' ), 10, 3 );
		add_filter( 'nav_menu_item_args', array( $this, 'manage_item_args' ), 10, 3 );
		add_filter( 'nav_menu_link_attributes', array( $this, 'manage_link_attributes' ), 10, 4 );
		add_filter( 'get_archives_link', array( $this, 'manage_archives_link' ), 10, 6 );

	}

	/**
	 * Manage Locations.
	 *
	 * @since   0.0.1
	 * @return  void
	 */
	public function manage_locations() {

		
		
	}

	/**
     * Manage Widget Args.
     *
     * @since   0.0.1 
     * @param   array    $nav_menu_args  An array of arguments passed to wp_nav_menu() to retrieve a navigation menu.
     * @param   WP_Term  $nav_menu       Nav menu object for the current menu.
     * @param   array    $widget_args    Display arguments for the current widget.
     * @param   array    $instance       Array of settings for the current widget.
     * @return  array                    Array of filtered args to return.
     */
	public function manage_widget_args( $nav_menu_args, $nav_menu, $widget_args, $instance ) {

		$menu_classes = array(
			'menu', 
			'wpmdc-list', 
			'mdc-list', 
		);

		if ( isset( $instance['wpmdc_menu_widget_descriptions'] ) && ! empty( $instance['wpmdc_menu_widget_descriptions'] ) ) {
			$menu_classes[] = 'mdc-list--two-line';
		}

		if ( isset( $instance['wpmdc_menu_widget_graphics'] ) && ! empty( $instance['wpmdc_menu_widget_graphics'] ) ) {
			$menu_classes[] = 'mdc-list--avatar-list';
		}
		
		return array_merge( $nav_menu_args, array( 
			'container'       => 'nav', 
			'menu_class'      => implode( ' ', $menu_classes ), 
		) );
		
	}

	/**
	 * Manage Submenu Class.
	 * 
	 * Filter the wp_nav_menu sub-menu classes. This runs after all classes 
	 * have been rendered, right before they are added to the sub-menu.
	 *
	 * @since   0.0.1
	 * @param   array    $classes  Incoming list item classes.
	 * @param   object   $args     The nav menu's args.
	 * @param   integer  $depth    The current depth of the walker.
	 * @return  array
	 */
	public function manage_submenu_classes( $classes, $args, $depth ) { 

		if ( in_array( 'mdc-list', explode( ' ', $args->menu_class ) ) ) {
			$classes = array_merge( $classes, array( 
				'mdc-list',  
			) );
		}
		
		return $classes;
		
	}

	/**
	 * Manage Item Args.
	 * 
	 * Filter the nav menu args per nav menu item individually. 
	 * This runs after the default classes have been added, 
	 * before the custom classes have been added, before all 
	 * attributes have been added.
	 *
	 * @since   0.0.1
	 * @param   object   $args   This nav menu's args.
	 * @param   object   $item   Incoming nav menu item object.
	 * @param   integer  $depth  The current depth of the walker.
	 * @return  array
	 */
	public function manage_item_args( $args, $item, $depth ) {

		$menu_classes = explode( ' ', $args->menu_class );

		if ( in_array( 'mdc-list', $menu_classes ) ) {
			
			$graphic = '';
			$description = '';
			$meta = '';

			if ( in_array( 'mdc-list--avatar-list', $menu_classes ) ) {
				$graphic = '<span class="mdc-list-item__graphic"><i class="material-icons" aria-hidden="true">' . $this->get_item_icon( $item ) . '</i></span>';
			} 

			if ( in_array( 'mdc-list--two-line', $menu_classes ) ) {
				$description = '<span class="mdc-list-item__secondary-text">' . esc_html( $item->description ) . '</span>';
			} 

			if ( $item->target === '_blank' ) {
				$meta = '<i class="mdc-list-item__meta material-icons">open_in_new</i>';	
			}

			$args->link_before = $graphic . '<span class="mdc-list-item__text">';
			$args->link_after = $description . '</span>' . $meta;

		}

		return $args;

	}

	public function get_item_icon( $item ) {

		switch ( $item->type ) {

			case 'taxonomy':
				$icon = 'label';
				break;
			
			default:
				$icon = 'bookmark';
				break;
		}

		return apply_filters( 'wpmdc_nav_menu_item_icon', $icon, $item );

	}

	/**
	 * Manage Link Attributes 
	 * 
	 * Filter the wp_nav_menu link attributes per menu. 
	 * This runs right before the attributes are added to the link. 
	 * They are parsed, so anything falsy is discarded, including 
	 * the integer 0 (as in tab indecies).
	 *
	 * @since   0.0.1
	 * @param   array    $atts   Incoming list item classes.
	 * @param   object   $item   Incoming nav menu item object.
	 * @param   object   $args   The nav menu's args.
	 * @param   integer  $depth  The current depth of the walker.
	 * @return  array
	 */
	public function manage_link_attributes( $atts, $item, $args, $depth ) {

		$classes = isset( $atts['class'] ) ? explode(' ', $atts['class']) : array();

		$classes = array_merge( $classes, array(
			'mdc-list-item', 
			'mdc-ripple-surface', 
		) );

		if ( in_array( 'current-menu-item', $item->classes ) ) {
			$classes = array_merge( $classes, array(
				'mdc-list-item--selected', 
			) );
		}

		$atts['class'] = implode(' ', $classes);
		
		return $atts;
	}

	/**
	 * Manage Archives Link.
	 * 
     * Filters the archives link content.
     *
     * @since   0.0.1
     * @param   string  $html    The archives HTML link content.
     * @param   string  $url     URL to archive.
     * @param   string  $text    Archive text description.
     * @param   string  $format  Link format. Can be 'link', 'option', 'html', or custom.
     * @param   string  $before  Content to prepend to the description.
     * @param   string  $after   Content to append to the description.
     * @return  string           The archive link output.
     */
   public function manage_archives_link( $html, $url, $text, $format, $before, $after ) {

   		if ( $format === 'custom' ) {

   			ob_start(); ?>

   			<li>
   				
   				<a href="<?php echo esc_url( $url ); ?>" class="mdc-list-item mdc-ripple-surface">

   					<?php if ( ! empty( $before ) ) { ?>

	   					<span class="mdc-list-item__graphic">
	   						
	   						<i class="material-icons" aria-hidden="true"><?php 

	   							echo $before; 

	   						?></i>

	   					</span>

	   				<?php } ?>
   					
   					<span class="mdc-list-item__text"><?php 

   						echo ( esc_html( $text ) ); 

   					?></span>

   					<?php if ( ! empty( $after ) ) { ?>

	   					<span class="mdc-list-item__meta"><?php 

	   						echo $after; 

	   					?></span>

	   				<?php } ?>

   				</a>

   			</li>

   			<?php 
   			$link = ob_get_clean();

   			$html = "\t" . $link  . "\n";
   		}

   		return $html;
   }

}