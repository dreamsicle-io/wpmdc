<?php 
/**
 * The Card Examples.
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

				<h3><?php esc_html_e( 'Card', 'wpmdc' ); ?></h3>

			<?php 
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

				WPMDC_Card::open_card();
					WPMDC_Card::open_media();
						echo '<p>Hello World!</p>';
					WPMDC_Card::close_media();
					echo '<p>Hello World!</p>';
				WPMDC_Card::close_card();
			
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

				WPMDC_Card::open_card( array( 'mod' => 'outlined' ) );
					WPMDC_Card::open_media();
						echo '<p>Hello World!</p>';
					WPMDC_Card::close_media();
					echo '<p>Hello World!</p>';
				WPMDC_Card::close_card();
			
			WPMDC_Layout_Grid::close_cell();
		WPMDC_Layout_grid::close_inner();
	WPMDC_Layout_grid::close_grid(); ?>

</section>
