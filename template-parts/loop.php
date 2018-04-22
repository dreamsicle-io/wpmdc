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

			/*
			 * Include the Post-Type-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
			 */
			get_template_part( 'template-parts/card', get_post_type() );

		}

		the_posts_pagination();

	} else {

		get_template_part( 'template-parts/content', 'none' );

	}

?></section>
