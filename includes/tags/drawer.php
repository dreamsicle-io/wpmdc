<?php 

if ( ! function_exists( 'wpmdc_drawer_header_link' ) ) {

	function wpmdc_drawer_header_link() {

		if ( is_user_logged_in() ) {

			$current_user = wp_get_current_user(); ?>

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

		<?php } else { ?>

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

		<?php }

	}

}