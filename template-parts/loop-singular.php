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
	
	while ( have_posts() ) { the_post();

		get_template_part( 'template-parts/content-singular', get_post_type() );

	}

?></section>
