<?php 
/**
 * The Image List Examples.
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

				<h3><?php esc_html_e( 'Image List', 'wpmdc' ); ?></h3>

			<?php 
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 3, 'tablet'  => 2, 'phone'  => 2 ) ); 

				wpmdc_component( new WPMDC_Image_List_Item() ); 
			
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 3, 'tablet'  => 2, 'phone'  => 2 ) ); 

				wpmdc_component( new WPMDC_Image_List_Item( array(
					'label' => wp_trim_words( WPMDCLOREM, 25 ), 
				) ) ); 
			
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 3, 'tablet'  => 2, 'phone'  => 2 ) ); 

				wpmdc_component( new WPMDC_Image_List_Item( array(
					'aspect' => 'square', 
				) ) ); 
			
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 3, 'tablet'  => 2, 'phone'  => 2 ) ); 

				wpmdc_component( new WPMDC_Image_List_Item( array(
					'aspect' => '3-2', 
				) ) ); 
			
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 
				
				WPMDC_Image_list::open_list( array( 'columns' => 6 ) );
					for ($i = 1; $i <= 12; $i++) {
						wpmdc_component( new WPMDC_Image_List_Item( array( 
							'label' => wp_trim_words( WPMDCLOREM, 25 ),  
						) ) ); 
					}
				WPMDC_Image_List::close_list();
			
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 
				
				WPMDC_Image_list::open_list( array( 'columns' => 2 ) );
					for ($i = 1; $i <= 4; $i++) {
						wpmdc_component( new WPMDC_Image_List_Item( array( 
							'label' => wp_trim_words( WPMDCLOREM, 25 ),  
						) ) ); 
					}
				WPMDC_Image_List::close_list();
			
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 
				
				WPMDC_Image_list::open_list( array( 'mod' => 'masonry', 'columns' => 5 ) );
					for ($i = 1; $i <= 10; $i++) {
						wpmdc_component( new WPMDC_Image_List_Item( array( 
							'label' => wp_trim_words( WPMDCLOREM, 25 ),  
						) ) ); 
					}
				WPMDC_Image_List::close_list();
			
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 
				
				WPMDC_Image_list::open_list( array( 'mod' => 'masonry', 'columns' => 3 ) );
					for ($i = 1; $i <= 6; $i++) {
						wpmdc_component( new WPMDC_Image_List_Item( array( 
							'label' => wp_trim_words( WPMDCLOREM, 25 ),  
						) ) ); 
					}
				WPMDC_Image_List::close_list();
			
			WPMDC_Layout_Grid::close_cell();
		WPMDC_Layout_grid::close_inner();
	WPMDC_Layout_grid::close_grid(); ?>

</section>
