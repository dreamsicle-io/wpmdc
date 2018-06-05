<?php 
/**
 * The masthead.
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

$actions_toggle_label = _x( 'Toggle Actions', 'top app bar actions toggle label', 'wpmdc' );

WPMDC_Top_App_Bar::open_app_bar();

	WPMDC_Top_App_Bar::open_row();

		WPMDC_Top_App_Bar::open_section( array( 'align' => 'start' ) ); 

			WPMDC_Top_App_Bar::navigation_icon( array( 
				'drawer' => 'drawer_temporary', 
				'label'  => _x( 'Toggle Drawer', 'top app bar drawer toggle label', 'wpmdc' )
			) ); 

			if ( is_author() ) {

				$author = get_queried_object();

				echo get_avatar( 
					sanitize_email( $author->user_email ), 
					112, 
					'', 
					esc_attr( $author->display_name ), 
					array(
						'height' => 40, 
						'width'  => 40, 
						'class'  => array( 'mdc-elevation--z2' ), 
					) 
				);

			}

			wpmdc_top_app_bar_title( '<h4 class="mdc-top-app-bar__title">', '</h4>');

		WPMDC_Top_App_Bar::close_section();

		WPMDC_Top_App_Bar::open_section( array( 'align' => 'end', 'menu_anchor' => true ) ); ?>
					
			<button 
			class="material-icons mdc-top-app-bar__action-item" 
			title="<?php echo esc_attr( $actions_toggle_label ); ?>" 
			alt="<?php echo esc_attr( $actions_toggle_label ); ?>"
			aria-label="<?php echo esc_attr( $actions_toggle_label ); ?>">more_vert</button>

		<?php 
		WPMDC_Top_App_Bar::close_section();
	
	WPMDC_Top_App_Bar::close_row();

WPMDC_Top_App_Bar::close_app_bar();
