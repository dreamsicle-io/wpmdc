<?php
/**
 * The Tabs Examples.
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

<section class="wpmdc-section"><?php 

	WPMDC_Layout_Grid::open_grid();
		WPMDC_Layout_Grid::open_inner();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); ?>

				<h3><?php esc_html_e( 'Tabs', 'wpmdc' ); ?></h3>

			<?php 
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Tab() );

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				WPMDC_Tab::open_bar();
					for ($i = 1; $i <= 3; $i++) {
						wpmdc_component( new WPMDC_Tab() );
					}
				WPMDC_Tab::close_bar();

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				WPMDC_Tab::open_bar( array( 'mod' => 'icon-tab-bar' ) );
					for ($i = 1; $i <= 3; $i++) {
						wpmdc_component( new WPMDC_Tab( array( 'icon' => 'favorite' ) ) );
					}
				WPMDC_Tab::close_bar();

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				WPMDC_Tab::open_bar( array( 'mod' => 'icons-with-text' ) );
					for ($i = 1; $i <= 3; $i++) {
						wpmdc_component( new WPMDC_Tab( array( 'icon' => 'favorite', 'mod' => 'with-icon-and-text' ) ) );
					}
				WPMDC_Tab::close_bar();

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				WPMDC_Tab::open_scroller();
					WPMDC_Tab::open_bar( array( 'scroller' => true ) );
						for ($i = 1; $i <= 12; $i++) {
							wpmdc_component( new WPMDC_Tab() );
						}
					WPMDC_Tab::close_bar();
				WPMDC_Tab::close_scroller();

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				WPMDC_Tab::open_scroller();
					WPMDC_Tab::open_bar( array( 'scroller' => true, 'mod' => 'icon-tab-bar' ) );
						for ($i = 1; $i <= 12; $i++) {
							wpmdc_component( new WPMDC_Tab( array( 'icon' => 'favorite' ) ) );
						}
					WPMDC_Tab::close_bar();
				WPMDC_Tab::close_scroller();

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				WPMDC_Tab::open_scroller();
					WPMDC_Tab::open_bar( array( 'scroller' => true, 'mod' => 'icons-with-text' ) );
						for ($i = 1; $i <= 12; $i++) {
							wpmdc_component( new WPMDC_Tab( array( 'icon' => 'favorite', 'mod' => 'with-icon-and-text' ) ) );
						}
					WPMDC_Tab::close_bar();
				WPMDC_Tab::close_scroller();

			WPMDC_Layout_Grid::close_cell();
		WPMDC_Layout_grid::close_inner();
	WPMDC_Layout_grid::close_grid(); ?>

</section>
