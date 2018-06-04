<?php
/**
 * The Permanent Drawer.
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

WPMDC_Drawer::open_drawer( array( 'id' => 'drawer_permanent', 'mod' => 'permanent' ) );  

	WPMDC_Drawer::open_content();

		if ( is_active_sidebar( 'drawer' ) ) { ?>

			<div class="widget-area"><?php
			
				dynamic_sidebar( 'drawer' );

			?></div>
		
		<?php } 

	WPMDC_Drawer::close_content();

WPMDC_Drawer::close_drawer();
