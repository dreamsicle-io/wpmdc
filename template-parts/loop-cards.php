<?php 
/**
 * The loop template file.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     wpmdc
 * @subpackage  template-parts
 */
?>

<section><?php 

	if ( have_posts() ) {

		while ( have_posts() ) { the_post();

			get_template_part( 'template-parts/content-card', get_post_type() );

		}

		the_posts_pagination();

	} else {

		get_template_part( 'template-parts/content-none' );

	}

?></section>