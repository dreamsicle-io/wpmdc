<?php
/**
 * Post API: Walker_Page class
 *
 * @package WordPress
 * @subpackage Template
 * @since 4.4.0
 */

/**
 * Core walker class used to create an HTML list of pages.
 *
 * @since 2.1.0
 *
 * @see Walker
 */
class WPMDC_Walker_Page extends Walker {

	/**
	 * What the class handles.
	 *
	 * @since 2.1.0
	 * @var string
	 *
	 * @see Walker::$tree_type
	 */
	public $tree_type = 'page';

	/**
	 * Database fields to use.
	 *
	 * @since 2.1.0
	 * @var array
	 *
	 * @see Walker::$db_fields
	 * @todo Decouple this.
	 */
	public $db_fields = array(
		'parent' => 'post_parent',
		'id'     => 'ID',
	);

	/**
	 * Extra args for the walker.
	 *
	 * @since 0.0.1
	 * @var array
	 */
	public $args = array();

	function __construct( $args = array() ) {
		
		$this->args = wp_parse_args( $args, array(
			'display_descriptions' => false, 
			'display_graphics'     => false, 
		) );

	}

	public function get_item_icon( $page ) {
		switch ( $page->post_type ) {
			default:
				$icon = 'bookmark';
				break;
		}

		$icon = apply_filters( 'wpmdc_walker_page_item_icon', $icon, $page );
		
		return $icon;
	}

	/**
	 * Outputs the beginning of the current level in the tree before elements are output.
	 *
	 * @since 2.1.0
	 *
	 * @see Walker::start_lvl()
	 *
	 * @param string $output Used to append additional content (passed by reference).
	 * @param int    $depth  Optional. Depth of page. Used for padding. Default 0.
	 * @param array  $args   Optional. Arguments for outputting the next level.
	 *                       Default empty array.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
			$t = "\t";
			$n = "\n";
		} else {
			$t = '';
			$n = '';
		}
		$indent  = str_repeat( $t, $depth );
		$output .= "{$n}{$indent}<ul class='children mdc-list'>{$n}";
	}

	/**
	 * Outputs the end of the current level in the tree after elements are output.
	 *
	 * @since 2.1.0
	 *
	 * @see Walker::end_lvl()
	 *
	 * @param string $output Used to append additional content (passed by reference).
	 * @param int    $depth  Optional. Depth of page. Used for padding. Default 0.
	 * @param array  $args   Optional. Arguments for outputting the end of the current level.
	 *                       Default empty array.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
			$t = "\t";
			$n = "\n";
		} else {
			$t = '';
			$n = '';
		}
		$indent  = str_repeat( $t, $depth );
		$output .= "{$indent}</ul>{$n}";
	}

	/**
	 * Outputs the beginning of the current element in the tree.
	 *
	 * @see Walker::start_el()
	 * @since 2.1.0
	 *
	 * @param string  $output       Used to append additional content. Passed by reference.
	 * @param WP_Post $page         Page data object.
	 * @param int     $depth        Optional. Depth of page. Used for padding. Default 0.
	 * @param array   $args         Optional. Array of arguments. Default empty array.
	 * @param int     $current_page Optional. Page ID. Default 0.
	 */
	public function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
		if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
			$t = "\t";
			$n = "\n";
		} else {
			$t = '';
			$n = '';
		}
		if ( $depth ) {
			$indent = str_repeat( $t, $depth );
		} else {
			$indent = '';
		}

		$css_class = array( 'page_item', 'page-item-' . $page->ID );

		$link_classes = array(
			'mdc-list-item', 
			'mdc-ripple-surface', 
		);

		if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
			$css_class[] = 'page_item_has_children';
		}

		if ( ! empty( $current_page ) ) {
			$_current_page = get_post( $current_page );
			if ( $_current_page && in_array( $page->ID, $_current_page->ancestors ) ) {
				$css_class[] = 'current_page_ancestor';
			}
			if ( $page->ID == $current_page ) {
				$css_class[] = 'current_page_item';
				$link_classes[] = 'mdc-list-item--selected';
			} elseif ( $_current_page && $page->ID == $_current_page->post_parent ) {
				$css_class[] = 'current_page_parent';
			}
		} elseif ( $page->ID == get_option( 'page_for_posts' ) ) {
			$css_class[] = 'current_page_parent';
		}

		/**
		 * Filters the list of CSS classes to include with each page item in the list.
		 *
		 * @since 2.8.0
		 *
		 * @see wp_list_pages()
		 *
		 * @param string[] $css_class    An array of CSS classes to be applied to each list item.
		 * @param WP_Post  $page         Page data object.
		 * @param int      $depth        Depth of page, used for padding.
		 * @param array    $args         An array of arguments.
		 * @param int      $current_page ID of the current page.
		 */
		$css_classes = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

		if ( '' === $page->post_title ) {
			
			$page->post_title = sprintf( 
				/* translators: %d: ID of a post */
				__( '#%d (no title)' ), 
				$page->ID 
			);
		}

		$excerpt = get_the_excerpt( $page->ID );
		// Fix the excerpt on customizer change. When the widget is 
		// updated in the customizer, the excerpt only shows when 
		// there is one explicitly set.
		$excerpt = ! empty( $excerpt ) ? $excerpt : apply_filters( 'the_excerpt', wp_trim_words( strip_tags( $page->post_content ) ) );

		$args['link_before'] = empty( $args['link_before'] ) ? '' : $args['link_before'];
		$args['link_after']  = empty( $args['link_after'] ) ? '' : $args['link_after'];

		$atts = array(
			'href'  => esc_url( get_permalink( $page->ID ) ), 
			'class' => esc_attr( implode( ' ', $link_classes ) ), 
			'title' => ! $this->args['display_descriptions'] ? esc_attr( $excerpt ) : '', 
		);

		/**
		 * Filters the HTML attributes applied to a page menu item's anchor element.
		 *
		 * @since 4.8.0
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $href The href attribute.
		 * }
		 * @param WP_Post $page         Page data object.
		 * @param int     $depth        Depth of page, used for padding.
		 * @param array   $args         An array of arguments.
		 * @param int     $current_page ID of the current page.
		 */
		$atts = apply_filters( 'page_menu_link_attributes', $atts, $page, $depth, $args, $current_page );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value       = esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$link = '<a ' . $attributes . '>';

		if ( $this->args['display_graphics'] ) {
			$link .= '<span class="mdc-list-item__graphic">';
			$link .= '<i class="material-icons">' . $this->get_item_icon( $page ) . '</i>';
			$link .= '</span>';
		}

		$link .= '<span class="mdc-list-item__text">';
		$link .= $args['link_before'];
		$link .= apply_filters( 'the_title', $page->post_title, $page->ID );
		$link .= $args['link_after'];

		if ( $this->args['display_descriptions'] && ! empty( $excerpt ) ) {
			$link .= '<span class="mdc-list-item__secondary-text">';
			$link .= strip_tags( $excerpt );
			$link .= '</span>';
		}

		$link .= '</span>';
		$link .= '</a>';

		$output .= $indent . sprintf(
			'<li class="%1$s">%2$s</a>',
			$css_classes,
			$link
		);

		if ( ! empty( $args['show_date'] ) ) {
			if ( 'modified' == $args['show_date'] ) {
				$time = $page->post_modified;
			} else {
				$time = $page->post_date;
			}

			$date_format = empty( $args['date_format'] ) ? '' : $args['date_format'];
			$output     .= ' ' . mysql2date( $date_format, $time );
		}
	}

	/**
	 * Outputs the end of the current element in the tree.
	 *
	 * @since 2.1.0
	 *
	 * @see Walker::end_el()
	 *
	 * @param string  $output Used to append additional content. Passed by reference.
	 * @param WP_Post $page   Page data object. Not used.
	 * @param int     $depth  Optional. Depth of page. Default 0 (unused).
	 * @param array   $args   Optional. Array of arguments. Default empty array.
	 */
	public function end_el( &$output, $page, $depth = 0, $args = array() ) {
		if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
			$t = "\t";
			$n = "\n";
		} else {
			$t = '';
			$n = '';
		}
		$output .= "</li>{$n}";
	}

}