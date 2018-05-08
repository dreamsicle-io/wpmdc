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

	<main id="main" class="mdc-theme--surface mdc-theme--on-surface">

		<?php get_template_part( 'template-parts/loop-singular' ); ?>

		<h2><?php esc_html_e( 'Components', 'wpmdc' ); ?></h2>

		<section class="wpmdc-section"><?php 

			WPMDC_Layout_Grid::open_grid();
				WPMDC_Layout_Grid::open_inner();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); ?>

						<h3><?php esc_html_e( 'Text Field', 'wpmdc' ); ?></h3>

					<?php 
					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field() );

					WPMDC_Layout_Grid::close_cell(); 
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array( 
							'dense'       => true, 
							'helper_text' => $text_field_helper_text, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell(); 
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array( 
							'disabled' => true, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell(); 
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'         => 'box', 
							'helper_text' => $text_field_helper_text, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell(); 
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'         => 'box',
							'dense'       => true,  
							'helper_text' => $text_field_helper_text, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'      => 'box',
							'disabled' => true, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'           => 'box', 
							'icon'          => 'public', 
							'icon_position' => 'leading', 
							'helper_text'   => $text_field_helper_text, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'           => 'box', 
							'icon'          => 'public', 
							'icon_position' => 'trailing', 
							'helper_text'   => $text_field_helper_text, 
						) ) );

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'           => 'box', 
							'icon'          => 'public', 
							'icon_position' => 'leading', 
							'disabled'      => true, 
						) ) );

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'         => 'outlined', 
							'helper_text' => $text_field_helper_text, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell(); 
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'         => 'outlined', 
							'dense'       => true, 
							'helper_text' => $text_field_helper_text, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'      => 'outlined', 
							'disabled' => true, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'           => 'outlined', 
							'icon'          => 'public', 
							'icon_position' => 'leading', 
							'helper_text'   => $text_field_helper_text, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell(); 
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'           => 'outlined', 
							'icon'          => 'public', 
							'icon_position' => 'trailing', 
							'helper_text'   => $text_field_helper_text, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'           => 'outlined', 
							'icon'          => 'public', 
							'icon_position' => 'leading', 
							'disabled'      => true, 
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
							'mod'         => 'fullwidth', 
							'helper_text' => $text_field_helper_text, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'      => 'fullwidth', 
							'disabled' => true, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'           => 'fullwidth', 
							'icon'          => 'public', 
							'icon_position' => 'leading', 
							'helper_text'   => $text_field_helper_text, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'           => 'fullwidth', 
							'icon'          => 'public', 
							'icon_position' => 'trailing', 
							'helper_text'   => $text_field_helper_text, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Text_Field( array(
							'mod'           => 'fullwidth', 
							'icon'          => 'public', 
							'icon_position' => 'leading', 
							'disabled'      => true, 
						) ) ); 

					WPMDC_Layout_Grid::close_cell();
				WPMDC_Layout_grid::close_inner();
			WPMDC_Layout_grid::close_grid(); ?>

		</section>

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
				WPMDC_Layout_grid::close_inner();
			WPMDC_Layout_grid::close_grid(); ?>

		</section>

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

		<section class="wpmdc-section"><?php 

			WPMDC_Layout_Grid::open_grid();
				WPMDC_Layout_Grid::open_inner();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); ?>

						<h3><?php esc_html_e( 'Switch', 'wpmdc' ); ?></h3>

					<?php 
					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Switch() );

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Switch( array( 
							'checked' => true, 
						) ) );

					WPMDC_Layout_Grid::close_cell();
					WPMDC_Layout_Grid::open_cell( array( 'desktop' => 4, 'tablet'  => 4, 'phone'  => 4 ) ); 

						wpmdc_component( new WPMDC_Switch( array( 
							'disabled' => true, 
						) ) );

					WPMDC_Layout_Grid::close_cell();
				WPMDC_Layout_grid::close_inner();
			WPMDC_Layout_grid::close_grid(); ?>

		</section>

	</main>

<?php
get_template_part( 'template-parts/footer' );
