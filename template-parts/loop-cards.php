<?php 
/**
 * The cards loop template file.
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

<section class="wpmdc-section wpmdc-section--pull-top"><?php 

	if ( have_posts() ) { ?>

		<div class="mdc-layout-grid wpmdc-contain-desktop">

			<div class="mdc-layout-grid__inner"><?php 

				while ( have_posts() ) { the_post(); ?>

					<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-4-tablet mdc-layout-grid__cell--span-4-phone"><?php

						get_template_part( 'template-parts/content-card', get_post_type() );

					?></div>

				<?php } ?>

				<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"><?php 

					the_posts_pagination();

				?></div>

			</div>

		</div>

	<?php } else {

		get_template_part( 'template-parts/content-none' );

	}

?></section>
