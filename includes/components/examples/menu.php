<?php 
/**
 * The Menu Examples.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     wpmdc
 * @subpackage  includes/components/examples
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

?>

<section class="wpmdc-section mdc-menu-anchor"><?php 

	WPMDC_Layout_Grid::open_grid();
		WPMDC_Layout_Grid::open_inner();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); ?>

				<h3><?php esc_html_e( 'Menu', 'wpmdc' ); ?></h3>

			<?php 
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				WPMDC_Menu::open_anchor();
					wpmdc_component( new WPMDC_Button( array(
						'mod'   => 'raised', 
						'text' => _x( 'Toggle Menu Top Start (Default)', 'wpmdc' ), 
						'data'  => array( 'for-menu' => 'wpmdc_menu_demo' )
					) ) );
					WPMDC_Menu::open_menu( array( 'id' => 'wpmdc_menu_demo' ) );
						WPMDC_List_Item::open_list( array( 'menu_list' => true ) );
							for ($i = 1; $i <= 3; $i++) {
								wpmdc_component( new WPMDC_List_Item( array( 'menu_item' => true ) ) ); 
							}
							WPMDC_List_Item::divider();
							wpmdc_component( new WPMDC_List_Item( array( 
								'menu_item' => true, 
								'disabled'  => true,  
							) ) );
							wpmdc_component( new WPMDC_List_Item( array( 'menu_item' => true ) ) ); 
						WPMDC_List_Item::close_list();
					WPMDC_Menu::close_menu();
				WPMDC_Menu::close_anchor();

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				WPMDC_Menu::open_anchor();
					wpmdc_component( new WPMDC_Button( array(
						'mod'   => 'raised', 
						'text' => _x( 'Toggle Menu Top End', 'wpmdc' ), 
						'data'  => array( 'for-menu' => 'wpmdc_menu_demo_top_end' )
					) ) );
					WPMDC_Menu::open_menu( array( 'id' => 'wpmdc_menu_demo_top_end', 'anchor' => 'top-end' ) );
						WPMDC_List_Item::open_list( array( 'menu_list' => true ) );
							for ($i = 1; $i <= 3; $i++) {
								wpmdc_component( new WPMDC_List_Item( array( 'menu_item' => true ) ) ); 
							}
							WPMDC_List_Item::divider();
							wpmdc_component( new WPMDC_List_Item( array( 
								'menu_item' => true, 
								'disabled'  => true,  
							) ) );
							wpmdc_component( new WPMDC_List_Item( array( 'menu_item' => true ) ) ); 
						WPMDC_List_Item::close_list();
					WPMDC_Menu::close_menu();
				WPMDC_Menu::close_anchor();

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				WPMDC_Menu::open_anchor();
					wpmdc_component( new WPMDC_Button( array(
						'mod'   => 'raised', 
						'text' => _x( 'Toggle Menu Bottom Start', 'wpmdc' ), 
						'data'  => array( 'for-menu' => 'wpmdc_menu_demo_bottom_start' )
					) ) );
					WPMDC_Menu::open_menu( array( 'id' => 'wpmdc_menu_demo_bottom_start', 'anchor' => 'bottom-start' ) );
						WPMDC_List_Item::open_list( array( 'menu_list' => true ) );
							for ($i = 1; $i <= 3; $i++) {
								wpmdc_component( new WPMDC_List_Item( array( 'menu_item' => true ) ) ); 
							}
							WPMDC_List_Item::divider();
							wpmdc_component( new WPMDC_List_Item( array( 
								'menu_item' => true, 
								'disabled'  => true,  
							) ) );
							wpmdc_component( new WPMDC_List_Item( array( 'menu_item' => true ) ) ); 
						WPMDC_List_Item::close_list();
					WPMDC_Menu::close_menu();
				WPMDC_Menu::close_anchor();

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				WPMDC_Menu::open_anchor();
					wpmdc_component( new WPMDC_Button( array(
						'mod'   => 'raised', 
						'text' => _x( 'Toggle Menu Bottom End', 'wpmdc' ), 
						'data'  => array( 'for-menu' => 'wpmdc_menu_demo_bottom_end' )
					) ) );
					WPMDC_Menu::open_menu( array( 'id' => 'wpmdc_menu_demo_bottom_end', 'anchor' => 'bottom-end' ) );
						WPMDC_List_Item::open_list( array( 'menu_list' => true ) );
							for ($i = 1; $i <= 3; $i++) {
								wpmdc_component( new WPMDC_List_Item( array( 'menu_item' => true ) ) ); 
							}
							WPMDC_List_Item::divider();
							wpmdc_component( new WPMDC_List_Item( array( 
								'menu_item' => true, 
								'disabled'  => true,  
							) ) );
							wpmdc_component( new WPMDC_List_Item( array( 'menu_item' => true ) ) ); 
						WPMDC_List_Item::close_list();
					WPMDC_Menu::close_menu();
				WPMDC_Menu::close_anchor();

			WPMDC_Layout_Grid::close_cell();
		WPMDC_Layout_grid::close_inner();
	WPMDC_Layout_grid::close_grid(); ?>

</section>
