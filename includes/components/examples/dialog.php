<?php 
/**
 * The Dialog Examples.
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

$body_template = 'Lorem ipsum dolor sit amet. A descipling consectateur elit. ';

?>

<section class="wpmdc-section"><?php 

	WPMDC_Layout_Grid::open_grid();
		WPMDC_Layout_Grid::open_inner();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); ?>

				<h3><?php esc_html_e( 'Dialog', 'wpmdc' ); ?></h3>

			<?php 
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Button( array(
					'mod'   => 'raised', 
					'text' => _x( 'Toggle Standard Dialog', 'wpmdc' ), 
					'data'  => array( 'for-dialog' => 'wpmdc_standard_dialog_demo' )
				) ) );
				wpmdc_component( new WPMDC_Dialog( array( 
					'id' => 'wpmdc_standard_dialog_demo', 
					'body' => str_repeat( $body_template, 5 ), 
				) ) );

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Button( array(
					'mod'   => 'raised', 
					'text' => _x( 'Toggle Scrollable Dialog', 'wpmdc' ), 
					'data'  => array( 'for-dialog' => 'wpmdc_scrollable_dialog_demo' )
				) ) );
				wpmdc_component( new WPMDC_Dialog( array( 
					'id'         => 'wpmdc_scrollable_dialog_demo', 
					'body'       => str_repeat( $body_template, 25 ), 
					'scrollable' => true, 
				) ) );

			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Button( array(
					'mod'   => 'raised', 
					'text' => _x( 'Toggle Dialog with Custom Actions', 'wpmdc' ), 
					'data'  => array( 'for-dialog' => 'wpmdc_dialog_with_footer_buttons_demo' )
				) ) );
				wpmdc_component( new WPMDC_Dialog( array( 
					'id'             => 'wpmdc_dialog_with_footer_buttons_demo', 
					'body'           => str_repeat( $body_template, 5 ), 
					'cancel_text'    => __( 'Go Back', 'wpmdc' ),  
					'accept_text'    => __( 'Continue', 'wpmdc' ),  
				) ) );

			WPMDC_Layout_Grid::close_cell();
		WPMDC_Layout_grid::close_inner();
	WPMDC_Layout_grid::close_grid(); ?>

</section>
