<?php 
/**
 * The Typography Examples.
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

				<h3><?php esc_html_e( 'Typography', 'wpmdc' ); ?></h3>

			<?php 
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				WPMDC_Typography::body1();
				WPMDC_Typography::body2();
				WPMDC_Typography::headline1();
				WPMDC_Typography::headline2();
				WPMDC_Typography::headline3();
				WPMDC_Typography::headline4();
				WPMDC_Typography::headline5();
				WPMDC_Typography::headline6();
				WPMDC_Typography::button();
				WPMDC_Typography::overline();
				WPMDC_Typography::subtitle1();
				WPMDC_Typography::subtitle2();
				WPMDC_Typography::caption();
			
			WPMDC_Layout_Grid::close_cell();
		WPMDC_Layout_grid::close_inner();
	WPMDC_Layout_grid::close_grid(); ?>

</section>
