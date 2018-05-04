<?php 
/**
 * The page header for all views.
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

?>

<header class="wpmdc-hero mdc-theme--primary-bg mdc-theme--on-primary">

	<div class="mdc-layout-grid wpmdc-contain-tablet">

		<div class="mdc-layout-grid__inner">

			<div class="wpmdc-hero__content mdc-layout-grid__cell mdc-layout-grid__cell--span-12-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"><?php 

				wpmdc_hero_overline( '<p class="mdc-typography--overline wpmdc-contain-phone wpmdc-no-margin">', '</p>' );

				if ( is_singular() ) {
				
					wpmdc_hero_title( '<h1 class="mdc-typography--headline2">', '</h1>' );

				} else {

					wpmdc_hero_title( '<h2 class="mdc-typography--headline2">', '</h2>' );

				}

				wpmdc_hero_description( '<p class="wpmdc-no-margin wpmdc-contain-phone">', '</p>' );

			?></div>

		</div>

	</div>

</header>
