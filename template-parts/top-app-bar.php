<?php 
/**
 * The masthead.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     wpmdc
 * @subpackage  template-parts
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

$actions_toggle_label = _x( 'Toggle Actions', 'top app bar actions toggle label', 'wpmdc' );

WPMDC_Top_App_Bar::open_app_bar( array( 'id' => 'top_app_bar' ) );

	WPMDC_Top_App_Bar::open_row();

		WPMDC_Top_App_Bar::open_section( array( 'align' => 'start' ) ); 

			WPMDC_Top_App_Bar::navigation_icon( array( 
				'drawer' => 'drawer_temporary', 
				'label'  => _x( 'Toggle Drawer', 'top app bar drawer toggle label', 'wpmdc' )
			) ); 

			if ( is_author() ) {

				wpmdc_top_app_bar_graphic();

			}

			WPMDC_Top_App_Bar::title( array( 'text' => wpmdc_get_top_app_bar_title() ) );

		WPMDC_Top_App_Bar::close_section();

		WPMDC_Top_App_Bar::open_section( array( 'align' => 'end', 'menu_anchor' => true ) );
					
			WPMDC_Top_App_Bar::action_item( array( 'menu' => 'top_app_bar_actions' ) );

		WPMDC_Top_App_Bar::close_section();
	
	WPMDC_Top_App_Bar::close_row();

WPMDC_Top_App_Bar::close_app_bar();
