<?php 
/**
 * The Footer Widgets.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     wpmdc
 * @subpackage  template-parts
 */

if ( is_active_sidebar( 'footer' ) ) { ?>

	<section id="footer_widgets" class="wpmdc-section mdc-theme--surface mdc-theme--on-surface mdc-elevation--z4">

		<?php if ( is_active_sidebar( 'footer' ) ) { ?>

			<div class="mdc-layout-grid wpmdc-contain-desktop">

				<div class="mdc-layout-grid__inner widget-area"><?php 

					dynamic_sidebar( 'footer' );

				?></div>

			</div>

		<?php } ?>

	</section>

<?php }
