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

$image = '/wp-content/themes/wpmdc/screenshot.png';

$primary = WPMDC_Typography::headline5( array( 
	'echo'      => false, 
	'container' => 'h3', 
	'text'      => __( 'Card Title', 'wpmdc' ), 
) );

$primary .= WPMDC_Typography::subtitle1( array( 
	'echo'      => false, 
	'container' => 'p', 
	'text'      => __( 'Card Subtitle', 'wpmdc' ), 
) );

$secondary = WPMDC_Typography::body2( array(
	'echo' => false, 
	'text' => '', 
) );

$action_buttons = array( 
	array( 
		'card_action' => true, 
	), 
	array( 
		'card_action' => true, 
	),  
);

$action_icons = array( 
	array( 
		'icon'  => 'favorite_border', 
		'label' => __( 'Add to Favorites', 'wpmdc' ),  
	), 
	array( 
		'icon'  => 'share', 
		'label' => __( 'Share', 'wpmdc' ),  
	), 
	array( 
		'icon'  => 'more_vert', 
		'label' => __( 'Toggle Menu', 'wpmdc' ),  
	), 
);

?>

<section class="wpmdc-section"><?php 

	WPMDC_Layout_Grid::open_grid();
		WPMDC_Layout_Grid::open_inner();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 12, 'tablet'  => 8, 'phone'  => 4 ) ); ?>

				<h3><?php esc_html_e( 'Card', 'wpmdc' ); ?></h3>

			<?php 
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Card( array(
					'primary'        => $primary, 
					'secondary'      => $secondary, 
					'action_buttons' => $action_buttons, 
					'action_icons'   => $action_icons,  
				) ) );
			
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Card( array(
					'mod'            => 'outlined', 
					'primary'        => $primary, 
					'secondary'      => $secondary, 
					'action_buttons' => $action_buttons, 
					'action_icons'   => $action_icons, 
				) ) );
			
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Card( array(
					'image'          => $image, 
					'primary'        => $primary, 
					'secondary'      => $secondary, 
					'action_buttons' => $action_buttons, 
					'action_icons'   => $action_icons,  
				) ) );
			
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

				wpmdc_component( new WPMDC_Card( array(
					'mod'            => 'outlined', 
					'image'          => $image, 
					'primary'        => $primary, 
					'secondary'      => $secondary, 
					'action_buttons' => $action_buttons, 
					'action_icons'   => $action_icons, 
				) ) );
			
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

				WPMDC_Card::open_card();
					WPMDC_Card::open_primary_action();
						WPMDC_Card::media( array( 'image' => $image ) );
						WPMDC_Card::open_primary();
							echo wp_kses_post( $primary );
						WPMDC_Card::close_primary(); 
						WPMDC_Card::open_secondary();
							echo wp_kses_post( $secondary );
						WPMDC_Card::close_secondary(); 
					WPMDC_Card::close_primary_action();
					WPMDC_Card::open_actions();
						WPMDC_Card::open_action_buttons();
							wpmdc_component( new WPMDC_Button( array( 'card_action' => true ) ) );
							wpmdc_component( new WPMDC_Button( array( 'card_action' => true ) ) );
						WPMDC_Card::close_action_buttons();
						WPMDC_Card::open_action_icons();
							WPMDC_Card::action_icon( array( 
								'icon' => 'favorite_border', 
								'label' => __( 'Add to Favorites', 'wpmdc' ),  
							) );
							WPMDC_Card::action_icon( array( 
								'icon' => 'share',  
								'label' => __( 'Share', 'wpmdc' ),  
							) );
							WPMDC_Card::action_icon();
						WPMDC_Card::close_action_icons();
					WPMDC_Card::close_actions();
				WPMDC_Card::close_card();
			
			WPMDC_Layout_Grid::close_cell();
			WPMDC_Layout_Grid::open_cell( array( 'desktop' => 6, 'tablet'  => 4, 'phone'  => 4 ) ); 

				WPMDC_Card::open_card( array( 'mod' => 'outlined' ) );
					WPMDC_Card::open_primary_action();
						WPMDC_Card::media( array( 'image' => $image ) );
						WPMDC_Card::open_primary();
							echo wp_kses_post( $primary );
						WPMDC_Card::close_primary(); 
						WPMDC_Card::open_secondary();
							echo wp_kses_post( $secondary );
						WPMDC_Card::close_secondary(); 
					WPMDC_Card::close_primary_action();
					WPMDC_Card::open_actions();
						WPMDC_Card::open_action_buttons();
							wpmdc_component( new WPMDC_Button( array( 'card_action' => true ) ) );
							wpmdc_component( new WPMDC_Button( array( 'card_action' => true ) ) );
						WPMDC_Card::close_action_buttons();
						WPMDC_Card::open_action_icons();
							WPMDC_Card::action_icon( array( 
								'icon' => 'favorite_border', 
								'label' => __( 'Add to Favorites', 'wpmdc' ),  
							) );
							WPMDC_Card::action_icon( array( 
								'icon' => 'share',  
								'label' => __( 'Share', 'wpmdc' ),  
							) );
							WPMDC_Card::action_icon();
						WPMDC_Card::close_action_icons();
					WPMDC_Card::close_actions();
				WPMDC_Card::close_card();
			
			WPMDC_Layout_Grid::close_cell();
		WPMDC_Layout_grid::close_inner();
	WPMDC_Layout_grid::close_grid(); ?>

</section>
