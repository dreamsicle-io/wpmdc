<?php
/**
 * The Persistent Drawer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package     wpmdc
 * @subpackage  template-parts
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

WPMDC_Drawer::open_drawer( array( 'id' => 'drawer_persistent', 'mod' => 'persistent' ) );  

	WPMDC_Drawer::open_surface();

		WPMDC_Drawer::open_header();

			WPMDC_Drawer::open_header_content();

				wpmdc_drawer_header_link();

			WPMDC_Drawer::close_header_content();

		WPMDC_Drawer::close_header();

		WPMDC_Drawer::open_content();

			if ( is_active_sidebar( 'drawer' ) ) { ?>

				<div class="widget-area"><?php
				
					dynamic_sidebar( 'drawer' );

				?></div>
			
			<?php } 

		WPMDC_Drawer::close_content();

	WPMDC_Drawer::close_surface();

WPMDC_Drawer::close_drawer();
