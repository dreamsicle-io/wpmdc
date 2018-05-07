<?php 
/**
 * The singular loop template file.
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
	
	while ( have_posts() ) { the_post();

		global $post; ?>

		<div class="mdc-layout-grid wpmdc-contain-tablet">

			<div class="mdc-layout-grid__inner">

				<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"><?php 

					get_template_part( 'template-parts/content-singular', $post->post_type );
					
					// Note the opening slash and `.php` suffix.
					comments_template( '/template-parts/comments.php' );

					if ( $post->post_type !== 'page' ) {

						the_post_navigation();

					}

				?></div>

			</div>

		</div>

	<?php }

?></section>
