<?php 
/**
 * The List Examples.
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

				<h3><?php esc_html_e( 'List', 'wpmdc' ); ?></h3>

			<?php 
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_List_Item() ); 

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_List_Item( array( 'href' => '#' ) ) ); 

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

				WPMDC_List_Item::open_list();
					for ($i = 1; $i <= 3; $i++) {
						wpmdc_component( new WPMDC_List_Item() ); 
					}
				WPMDC_List_Item::close_list();

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

				WPMDC_List_Item::open_list( array( 'two_line' => true ) );
					for ($i = 1; $i <= 3; $i++) {
						wpmdc_component( new WPMDC_List_Item( array( 'two_line' => true ) ) ); 
					}
				WPMDC_List_Item::close_list();

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

				WPMDC_List_Item::open_list( array( 'avatar_list' => true ) );
					for ($i = 1; $i <= 3; $i++) {
						wpmdc_component( new WPMDC_List_Item( array( 'avatar_list' => true ) ) ); 
					}
				WPMDC_List_Item::close_list();

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

				WPMDC_List_Item::open_list();
					for ($i = 1; $i <= 3; $i++) {
						wpmdc_component( new WPMDC_List_Item( array( 'meta' => 'info' ) ) ); 
					}
				WPMDC_List_Item::close_list();

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

				WPMDC_List_Item::open_list( array( 'two_line' => true ) );
					for ($i = 1; $i <= 3; $i++) {
						wpmdc_component( new WPMDC_List_Item( array( 
							'two_line' => true, 
							'meta'     => 'info', 
						) ) ); 
					}
				WPMDC_List_Item::close_list();

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

				WPMDC_List_Item::open_list( array( 'avatar_list' => true ) );
					for ($i = 1; $i <= 3; $i++) {
						wpmdc_component( new WPMDC_List_Item( array( 
							'avatar_list' => true, 
							'meta'        => 'info', 
						) ) ); 
					}
				WPMDC_List_Item::close_list();

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

				WPMDC_List_Item::open_list( array( 'avatar_list' => true, 'two_line' => true ) );
					for ($i = 1; $i <= 3; $i++) {
						wpmdc_component( new WPMDC_List_Item( array( 
							'avatar_list' => true, 
							'two_line'    => true, 
							'meta'        => 'info', 
						) ) ); 
					}
				WPMDC_List_Item::close_list();

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

				WPMDC_List_Item::open_list( array( 'avatar_list' => true, 'two_line' => true, 'container' => 'nav' ) );
					for ($i = 1; $i <= 3; $i++) {
						wpmdc_component( new WPMDC_List_Item( array( 
							'avatar_list' => true, 
							'two_line'    => true, 
							'meta'        => 'info', 
							'href'        => '#', 
						) ) ); 
					}
				WPMDC_List_Item::close_list( array( 'container' => 'nav' ) );

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

				WPMDC_List_Item::open_list( array( 'avatar_list' => true, 'two_line' => true, 'container' => 'nav' ) );
					wpmdc_component( new WPMDC_List_Item( array( 
						'avatar_list' => true, 
						'two_line'    => true, 
						'meta'        => 'info', 
					) ) ); 
					WPMDC_List_Item::divider();
					wpmdc_component( new WPMDC_List_Item( array( 
						'avatar_list' => true, 
						'two_line'    => true, 
						'meta'        => 'info', 
					) ) ); 
					WPMDC_List_Item::divider( array( 'padded' => true ) );
					wpmdc_component( new WPMDC_List_Item( array( 
						'avatar_list' => true, 
						'two_line'    => true, 
						'meta'        => 'info', 
					) ) ); 
					WPMDC_List_Item::divider( array( 'inset' => true ) );
					wpmdc_component( new WPMDC_List_Item( array( 
						'avatar_list' => true, 
						'two_line'    => true, 
						'meta'        => 'info', 
					) ) ); 
					WPMDC_List_Item::divider( array( 'inset' => true, 'padded' => true ) );
					wpmdc_component( new WPMDC_List_Item( array( 
						'avatar_list' => true, 
						'two_line'    => true, 
						'meta'        => 'info', 
					) ) ); 
				WPMDC_List_Item::close_list( array( 'container' => 'nav' ) );

			WPMDC_Layout_Grid::close_cell();
		WPMDC_Layout_grid::close_inner();
	WPMDC_Layout_grid::close_grid(); ?>

</section>
