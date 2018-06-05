<?php 
/**
 * The Text Field Examples.
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

$text_field_helper_text = __( 'This is the helper text.', 'wpmdc' );

?>

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
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Text_Field( array(
					'mod'           => 'fullwidth', 
					'icon'          => 'public', 
					'icon_position' => 'trailing', 
					'helper_text'   => $text_field_helper_text, 
				) ) ); 

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Text_Field( array(
					'mod'           => 'fullwidth', 
					'icon'          => 'public', 
					'icon_position' => 'leading', 
					'disabled'      => true, 
				) ) ); 

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 8, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Text_Field( array(
					'type' => 'textarea', 
				) ) ); 

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 8, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Text_Field( array(
					'type'  => 'textarea', 
					'dense' => true, 
				) ) ); 

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 8, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Text_Field( array(
					'type'     => 'textarea', 
					'disabled' => true, 
				) ) ); 

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 8, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Text_Field( array(
					'type'     => 'textarea', 
					'dense'    => true, 
					'disabled' => true, 
				) ) ); 

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Text_Field( array(
					'type' => 'textarea', 
					'mod'  => 'fullwidth', 
				) ) ); 

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Text_Field( array(
					'type'     => 'textarea', 
					'mod'      => 'fullwidth', 
					'disabled' => true, 
				) ) ); 

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Text_Field( array(
					'type'  => 'textarea', 
					'mod'   => 'fullwidth', 
					'dense' => true, 
				) ) ); 

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Text_Field( array(
					'type'     => 'textarea', 
					'mod'      => 'fullwidth', 
					'dense'    => true, 
					'disabled' => true, 
				) ) ); 

			WPMDC_Layout_Grid::close_cell();
		WPMDC_Layout_grid::close_inner();
	WPMDC_Layout_grid::close_grid(); ?>

</section>
