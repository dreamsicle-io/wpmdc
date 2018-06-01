<?php 
/**
 * The Button Examples.
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

				<h3><?php esc_html_e( 'Button', 'wpmdc' ); ?></h3>

			<?php 
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 2, 'phone'  => 2 ) ); 

				wpmdc_component( new WPMDC_Button() );

				wpmdc_component( new WPMDC_Button( array( 
					'dense' => true, 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'icon' => 'favorite', 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'icon'  => 'favorite', 
					'dense' => true, 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'disabled' => true, 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'disabled' => true, 
					'icon'     => 'favorite', 
				) ) );

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 2, 'phone'  => 2 ) ); 

				wpmdc_component( new WPMDC_Button( array(
					'mod' => 'outlined', 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'   => 'outlined', 
					'dense' => true, 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'  => 'outlined', 
					'icon' => 'favorite', 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'   => 'outlined', 
					'icon'  => 'favorite', 
					'dense' => true, 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'      => 'outlined', 
					'disabled' => true, 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'      => 'outlined', 
					'disabled' => true, 
					'icon'     => 'favorite', 
				) ) );

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 2, 'phone'  => 2 ) ); 

				wpmdc_component( new WPMDC_Button( array(
					'mod' => 'raised', 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'   => 'raised', 
					'dense' => true, 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'  => 'raised', 
					'icon' => 'favorite', 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'   => 'raised', 
					'icon'  => 'favorite', 
					'dense' => true, 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'      => 'raised', 
					'disabled' => true, 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'      => 'raised', 
					'disabled' => true, 
					'icon'     => 'favorite', 
				) ) );

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 2, 'phone'  => 2 ) ); 

				wpmdc_component( new WPMDC_Button( array(
					'mod' => 'unelevated', 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'   => 'unelevated', 
					'dense' => true, 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'  => 'unelevated', 
					'icon' => 'favorite', 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'   => 'unelevated', 
					'icon'  => 'favorite', 
					'dense' => true, 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'      => 'unelevated', 
					'disabled' => true, 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'      => 'unelevated', 
					'disabled' => true, 
					'icon'     => 'favorite', 
				) ) );

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 2, 'phone'  => 2 ) ); 

				wpmdc_component( new WPMDC_Button( array(
					'href' => '#', 
				) ) );

				wpmdc_component( new WPMDC_Button( array(
					'href'  => '#', 
					'dense' => true, 
				) ) );

				wpmdc_component( new WPMDC_Button( array(
					'href' => '#', 
					'icon' => 'favorite', 
				) ) );

				wpmdc_component( new WPMDC_Button( array(
					'href' => '#', 
					'icon' => 'favorite', 
				) ) );

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 2, 'phone'  => 2 ) ); 

				wpmdc_component( new WPMDC_Button( array( 
					'mod'  => 'outlined', 
					'href' => '#', 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'   => 'outlined', 
					'href'  => '#', 
					'dense' => true, 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'  => 'outlined', 
					'href' => '#', 
					'icon' => 'favorite', 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'   => 'outlined', 
					'href'  => '#', 
					'icon'  => 'favorite', 
					'dense' => true, 
				) ) );

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 2, 'phone'  => 2 ) ); 

				wpmdc_component( new WPMDC_Button( array( 
					'mod'  => 'raised', 
					'href' => '#', 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'   => 'raised', 
					'href'  => '#', 
					'dense' => true, 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'  => 'raised', 
					'href' => '#', 
					'icon' => 'favorite', 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'   => 'raised', 
					'href'  => '#', 
					'icon'  => 'favorite', 
					'dense' => true, 
				) ) );

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 2, 'phone'  => 2 ) ); 

				wpmdc_component( new WPMDC_Button( array( 
					'mod'  => 'unelevated', 
					'href' => '#', 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'   => 'unelevated', 
					'href'  => '#', 
					'dense' => true, 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'  => 'unelevated', 
					'href' => '#', 
					'icon' => 'favorite', 
				) ) );

				wpmdc_component( new WPMDC_Button( array( 
					'mod'   => 'unelevated', 
					'href'  => '#', 
					'icon'  => 'favorite', 
					'dense' => true, 
				) ) );

			WPMDC_Layout_Grid::close_cell();
		WPMDC_Layout_grid::close_inner();
	WPMDC_Layout_grid::close_grid(); ?>

</section>
