<?php 
/**
 * The cards loop template file.
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

?>

<section class="wpmdc-section"><?php 

	if ( have_posts() ) { 

		WPMDC_Layout_Grid::open_grid();

			WPMDC_Layout_Grid::open_inner();

				while ( have_posts() ) { the_post();

					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet' => 4, 'phone' => 4 ) );

						get_template_part( 'template-parts/content-card', get_post_type() );

					WPMDC_Layout_Grid::close_cell();

				} 

				WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet' => 8, 'phone' => 4 ) ); 

					the_posts_pagination();

				WPMDC_Layout_Grid::close_cell();

			WPMDC_Layout_Grid::close_inner();

		WPMDC_Layout_Grid::close_grid();

	} else {

		get_template_part( 'template-parts/content-none' );

	}

?></section>
