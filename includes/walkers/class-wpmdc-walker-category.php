<?php
/**
 * Taxonomy API: Walker_Category class
 *
 * @package    wpmdc
 * @subpackage inlcudes/walkers
 */

/**
 * Core class used to create an HTML list of categories.
 *
 * @since 2.1.0
 *
 * @see Walker
 */
class WPMDC_Walker_Category extends Walker { 

	/**
	 * What the class handles.
	 *
	 * @since WP 2.1.0
	 * @var string
	 *
	 * @see Walker::$tree_type
	 */
	public $tree_type = 'category';

	/**
	 * Database fields to use.
	 *
	 * @since WP 2.1.0
	 * @var array
	 *
	 * @see Walker::$db_fields
	 * @todo Decouple this
	 */
	public $db_fields = array ('parent' => 'parent', 'id' => 'term_id');

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

	public function get_item_icon( $category ) {

		switch ( $term->taxonomy ) {

			default:
				$icon = 'label';
				break;

		}

		$icon = apply_filters( 'wpmdc_walker_category_item_icon', $icon, $category );
		
		return $icon;
	}

	/**
	 * Starts the list before the elements are added.
	 *
	 * @since 2.1.0
	 *
	 * @see Walker::start_lvl()
	 *
	 * @param string $output Used to append additional content. Passed by reference.
	 * @param int    $depth  Optional. Depth of category. Used for tab indentation. Default 0.
	 * @param array  $args   Optional. An array of arguments. Will only append content if style argument
	 *                       value is 'list'. See wp_list_categories(). Default empty array.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		if ( 'list' != $args['style'] ) {
			return;
		}

		$indent = str_repeat("\t", $depth);
		$output .= "$indent<ul class='mdc-list children'>\n";
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @since 2.1.0
	 *
	 * @see Walker::end_lvl()
	 *
	 * @param string $output Used to append additional content. Passed by reference.
	 * @param int    $depth  Optional. Depth of category. Used for tab indentation. Default 0.
	 * @param array  $args   Optional. An array of arguments. Will only append content if style argument
	 *                       value is 'list'. See wp_list_categories(). Default empty array.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		if ( 'list' != $args['style'] ) {
			return;
		}

		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	/**
	 * Starts the element output.
	 *
	 * @since 2.1.0
	 *
	 * @see Walker::start_el()
	 *
	 * @param string $output   Used to append additional content (passed by reference).
	 * @param object $category Category data object.
	 * @param int    $depth    Optional. Depth of category in reference to parents. Default 0.
	 * @param array  $args     Optional. An array of arguments. See wp_list_categories(). Default empty array.
	 * @param int    $id       Optional. ID of the current category. Default 0.
	 */
	public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		
		/** This filter is documented in wp-includes/category-template.php */
		$cat_name = apply_filters(
			'list_cats',
			esc_attr( $category->name ),
			$category
		);

		// Don't generate an element if the category name is empty.
		if ( ! $cat_name ) {
			return;
		}

		if ( ! empty( $category->description ) ) {
			$description = strip_tags( apply_filters( 'category_description', $category->description, $category ) );
		} else {
			$description = '';
		}

		$link_classes = array( 
			'mdc-list-item', 
			'mdc-ripple-surface' 
		);

		$current_category = is_array( $args['current_category'] ) ? $args['current_category'] : explode( ',', trim( $args['current_category'] ) );

		if ( in_array( $category->term_id, $current_category ) ) {
			$link_classes[] = 'mdc-list-item--selected';
		}

		$link = '<a class="' . esc_attr( implode( ' ', $link_classes ) ) . '" href="' . esc_url( get_term_link( $category ) ) . '" ';
		
		if ( $args['use_desc_for_title'] && ! empty( $description ) ) {
			/**
			 * Filters the category description for display.
			 *
			 * @since 1.2.0
			 *
			 * @param string $description Category description.
			 * @param object $category    Category object.
			 */
			$link .= 'title="' . esc_attr( $description ) . '"';
		}

		$link .= '>';

		if ( $this->args['display_graphics'] ) {
			$link .= '<span class="mdc-list-item__graphic">';
			$link .= '<i class="material-icons">' . $this->get_item_icon( $category ) . '</i>';
			$link .= '</span>';
		}

		$link .= '<span class="mdc-list-item__text">';
		$link .= $cat_name;

		if ( $this->args['display_descriptions'] && ! empty( $description ) ) {
			$link .= '<span class="mdc-list-item__secondary-text">';
			$link .= esc_html( $description );
			$link .= '</span>';
		}

		$link .= '</span>';

		if ( ! empty( $args['show_count'] ) ) {
			$link .= '<span class="mdc-list-item__meta">(' . number_format_i18n( $category->count ) . ')</span>';
		}

		$link .= '</a>';

		if ( ! empty( $args['feed_image'] ) || ! empty( $args['feed'] ) ) {
			$link .= ' ';

			if ( empty( $args['feed_image'] ) ) {
				$link .= '(';
			}

			$link .= '<a href="' . esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $args['feed_type'] ) ) . '"';

			if ( empty( $args['feed'] ) ) {
				$alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
			} else {
				$alt = ' alt="' . $args['feed'] . '"';
				$name = $args['feed'];
				$link .= empty( $args['title'] ) ? '' : $args['title'];
			}

			$link .= '>';

			if ( empty( $args['feed_image'] ) ) {
				$link .= $name;
			} else {
				$link .= "<img src='" . $args['feed_image'] . "'$alt" . ' />';
			}

			$link .= '</a>';

			if ( empty( $args['feed_image'] ) ) {
				$link .= ')';
			}
		}

		if ( 'list' == $args['style'] ) {
			
			$output .= "\t<li";

			$css_classes = array(
				'cat-item',
				'cat-item-' . $category->term_id,
			);

			if ( ! empty( $args['current_category'] ) ) {
				
				// 'current_category' can be an array, so we use `get_terms()`.
				$_current_terms = get_terms( $category->taxonomy, array(
					'include' => $args['current_category'],
					'hide_empty' => false,
				) );

				foreach ( $_current_terms as $_current_term ) {

					if ( $category->term_id == $_current_term->term_id ) {
						$css_classes[] = 'current-cat';
					} elseif ( $category->term_id == $_current_term->parent ) {
						$css_classes[] = 'current-cat-parent';
					}

					while ( $_current_term->parent ) {

						if ( $category->term_id == $_current_term->parent ) {
							$css_classes[] =  'current-cat-ancestor';
							break;
						}

						$_current_term = get_term( $_current_term->parent, $category->taxonomy );
					
					}
				
				}
			
			}

			/**
			 * Filters the list of CSS classes to include with each category in the list.
			 *
			 * @since 4.2.0
			 *
			 * @see wp_list_categories()
			 *
			 * @param array  $css_classes An array of CSS classes to be applied to each list item.
			 * @param object $category    Category data object.
			 * @param int    $depth       Depth of page, used for padding.
			 * @param array  $args        An array of wp_list_categories() arguments.
			 */
			$css_classes = implode( ' ', apply_filters( 'category_css_class', $css_classes, $category, $depth, $args ) );

			$output .= ' class="' . $css_classes . '"';
			$output .= ">$link\n";

		} elseif ( isset( $args['separator'] ) ) {

			$output .= "\t$link" . $args['separator'] . "\n";

		} else {

			$output .= "\t$link<br />\n";

		}

	}

	/**
	 * Ends the element output, if needed.
	 *
	 * @since 2.1.0
	 *
	 * @see Walker::end_el()
	 *
	 * @param string $output Used to append additional content (passed by reference).
	 * @param object $page   Not used.
	 * @param int    $depth  Optional. Depth of category. Not used.
	 * @param array  $args   Optional. An array of arguments. Only uses 'list' for whether should append
	 *                       to output. See wp_list_categories(). Default empty array.
	 */
	public function end_el( &$output, $page, $depth = 0, $args = array() ) {
		if ( 'list' != $args['style'] )
			return;

		$output .= "</li>\n";
	}

}