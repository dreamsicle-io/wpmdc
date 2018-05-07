<?php
/**
 * Template Name: Docs
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package    wpmdc
 * @subpackage page-templates
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

$text_field_helper_text = __( 'This is the helper text.', 'wpmdc' );

get_template_part( 'template-parts/header' ); ?>

	<main id="main">

		<?php get_template_part( 'template-parts/loop-singular' ); ?>

		<h2><?php esc_html_e( 'Components', 'wpmdc' ); ?></h2>

		<section class="wpmdc-section"><?php 

			WPMDC_Layout_Grid::open_grid();
				WPMDC_Layout_Grid::open_inner();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); ?>

						<h3><?php esc_html_e( 'Text Field', 'wpmdc' ); ?></h3>

					<?php 
					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field() );

					WPMDC_Layout_Grid::close_cell(); 
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array( 
							'helper_text' => $text_field_helper_text, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array( 
							'dense' => true, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell(); 
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array( 
							'dense'       => true, 
							'helper_text' => $text_field_helper_text, 
						) ) );

					WPMDC_Layout_Grid::close_cell(); 
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod' => 'box', 
						) ) ); 

					WPMDC_Layout_Grid::close_cell(); 
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'         => 'box', 
							'helper_text' => $text_field_helper_text, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'   => 'box',
							'dense' => true,  
						) ) ); 

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'         => 'box',
							'dense'       => true,  
							'helper_text' => $text_field_helper_text, 
						) ) );

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'           => 'box', 
							'icon'          => 'public', 
							'icon_position' => 'leading', 
						) ) ); 

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'           => 'box', 
							'icon'          => 'public', 
							'icon_position' => 'trailing', 
						) ) );

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod' => 'outlined', 
						) ) ); 

					WPMDC_Layout_Grid::close_cell(); 
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'         => 'outlined', 
							'helper_text' => $text_field_helper_text, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell(); 
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod' => 'outlined', 
							'dense' => true, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'         => 'outlined', 
							'dense'       => true, 
							'helper_text' => $text_field_helper_text, 
						) ) );

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'           => 'outlined', 
							'icon'          => 'public', 
							'icon_position' => 'leading', 
						) ) ); 

					WPMDC_Layout_Grid::close_cell(); 
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'           => 'outlined', 
							'icon'          => 'public', 
							'icon_position' => 'trailing', 
						) ) ); 

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod' => 'fullwidth', 
						) ) ); 

					WPMDC_Layout_Grid::close_cell(); 
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'         => 'fullwidth', 
							'helper_text' => $text_field_helper_text, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'   => 'fullwidth', 
							'dense' => true, 
						) ) ); 

					WPMDC_Layout_grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'   => 'fullwidth', 
							'dense' => true, 
							'helper_text' => $text_field_helper_text, 
						) ) ); 

					WPMDC_Layout_grid::close_cell();
				WPMDC_Layout_grid::close_inner();
			WPMDC_Layout_grid::close_grid(); ?>

		</section>

	</main>

<?php
get_template_part( 'template-parts/footer' );
