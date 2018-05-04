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

			<div class="wpmdc-hero__content mdc-layout-grid__cell mdc-layout-grid__cell--span-12-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone">

				<?php if ( is_singular() || ( is_home() && ! is_front_page() ) ) { ?>

					<p class="mdc-typography--overline wpmdc-no-margin"><?php 

						single_post_title();

					?></p>

					<h1><?php 

						single_post_title();

					?></h1>

				<?php } elseif ( is_front_page() ) { ?>

					<span class="mdc-typography--overline"><?php 

						bloginfo( 'name' );

					?></span>

					<h1><?php 

						bloginfo( 'name' );

					?></h1>

					<p class="wpmdc-no-margin"><?php 

						bloginfo( 'description' );

					?></p>

				<?php } elseif ( is_archive() ) { ?>

					<span class="mdc-typography--overline"><?php 

						the_archive_title();

					?></span>

					<?php 
					the_archive_title( '<h1>', '</h1>' );

					the_archive_description( '<div class="wpmdc-no-margin">', '</div>' );

				} elseif ( is_search() ) { ?>

					<span class="mdc-typography--overline"><?php 

						esc_html_e( 'Search', 'wpmdc' );

					?></span>

					<h1><?php 

						the_search_query();

					?></h1>

				<?php } ?>

			</div>

		</div>

	</div>

</header>