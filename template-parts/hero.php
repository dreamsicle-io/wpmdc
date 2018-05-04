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

	<div class="mdc-layout-grid wpmdc-contain-desktop">

		<div class="mdc-layout-grid__inner">

			<div class="wpmdc-hero__content mdc-layout-grid__cell mdc-layout-grid__cell--span-12-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"><?php 

				wpmdc_hero_overline( '<p class="wpmdc-hero__overline mdc-typography--overline wpmdc-no-margin">', '</p>' );

				wpmdc_hero_title( '<h1 class="wpmdc-hero__title">', '</h1>' );

				wpmdc_hero_description( '<p class="wpmdc-hero__description wpmdc-no-margin">', '</p>' );

			?></div>

		</div>

	</div>

</header>
