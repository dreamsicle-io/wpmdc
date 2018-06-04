<?php
/**
 * The Temporary Drawer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package     wpmdc
 * @subpackage  template-parts
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

WPMDC_Drawer::open_drawer( array( 'id' => 'drawer_temporary', 'mod' => 'temporary' ) );  

	WPMDC_Drawer::open_surface();

		WPMDC_Drawer::open_header();

			if ( is_user_logged_in() ) {

				$current_user = wp_get_current_user();

				WPMDC_Drawer::open_header_content(); ?>

					<a 
					href="<?php echo esc_url( get_dashboard_url( $current_user->ID ) ); ?>" 
					rel="nofollow">

						<?php echo get_avatar( 
							sanitize_email( $current_user->user_email ), 
							112, 
							'', 
							$current_user->display_name, 
							array(
								'height' => 56, 
								'width'  => 56, 
								'class'  => array( 'mdc-elevation--z2' ), 
							) 
						); ?>

						<h3 class="mdc-typography--subtitle2 wpmdc-no-margin"><?php
							
							echo esc_html( $current_user->display_name );

						?></h3>

						<p class="mdc-typography--caption wpmdc-no-margin"><?php 

							echo esc_html( $current_user->user_email );

						?></p>
							
					</a>
						
				<?php 
				WPMDC_Drawer::close_header_content();

			} else { 

				WPMDC_Drawer::open_header_content(); ?>

					<a 
					href="<?php echo esc_url( home_url( '/' ) ); ?>" 
					rel="home">

						<h3 class="mdc-typography--subtitle2 wpmdc-no-margin"><?php
							
							bloginfo( 'name' );

						?></h3>

						<p class="mdc-typography--caption wpmdc-no-margin"><?php 

							bloginfo( 'description' );

						?></p>
							
					</a>

				<?php 
				WPMDC_Drawer::close_header_content();

			}

		WPMDC_Drawer::close_header();

		WPMDC_Drawer::open_content();

			if ( is_active_sidebar( 'drawer' ) ) { ?>

				<div class="widget-area"><?php
				
					dynamic_sidebar( 'drawer' );

				?></div>
			
			<?php } 

		WPMDC_Drawer::close_content();

	WPMDC_Drawer::close_surface();

WPMDC_Drawer::close_drawer();
