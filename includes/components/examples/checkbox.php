<?php 
/**
 * The Checkbox Examples.
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

				<h3><?php esc_html_e( 'Checkbox', 'wpmdc' ); ?></h3>

			<?php 
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 3, 'tablet'  => 4, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Checkbox() );
			
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 3, 'tablet'  => 4, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Checkbox( array(
					'checked' => true, 
				) ) );

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 3, 'tablet'  => 4, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Checkbox( array( 
					'indeterminate' => true, 
				) ) );

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 3, 'tablet'  => 4, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Checkbox( array( 
					'disabled' => true, 
				) ) );

			WPMDC_Layout_Grid::close_cell();
		WPMDC_Layout_grid::close_inner();
	WPMDC_Layout_grid::close_grid(); ?>

</section>
