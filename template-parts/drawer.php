<?php
/**
 * The drawer.
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

$current_user = wp_get_current_user();

?> 

<aside id="drawer" class="wpmdc-drawer mdc-drawer mdc-drawer--temporary">

	<div class="mdc-drawer__drawer mdc-theme--surface mdc-theme--on-surface">

		<header class="mdc-drawer__header mdc-theme--primary-bg mdc-theme--on-primary">

			<?php if ( is_user_logged_in() ) {

				$current_user = wp_get_current_user(); ?>

				<a 
				href="<?php echo esc_url( get_dashboard_url( $current_user->ID ) ); ?>" 
				class="mdc-drawer__header-content mdc-theme--on-primary mdc-ripple-surface">

					<?php 
					echo get_avatar( 
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

			<?php } else { ?>

				<a 
				href="<?php echo esc_url( home_url( '/' ) ); ?>" 
				class="mdc-drawer__header-content mdc-theme--on-primary mdc-ripple-surface">

					<h3 class="mdc-typography--subtitle2 wpmdc-no-margin"><?php
						
						bloginfo( 'name' );

					?></h3>

					<p class="mdc-typography--caption wpmdc-no-margin"><?php 

						bloginfo( 'description' );

					?></p>
						
				</a>

			<?php } ?>

		</header>

		<div class="mdc-drawer__content"><?php 

			if ( is_active_sidebar( 'drawer' ) ) { ?>

				<div class="widget-area"><?php
				
					dynamic_sidebar( 'drawer' );

				?></div>
			
			<?php } 

		?></div>

	</div>

</aside>
