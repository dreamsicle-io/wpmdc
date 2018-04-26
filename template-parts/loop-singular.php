<?php 
/**
 * The loop template file.
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

<section><?php 
	
	while ( have_posts() ) { the_post();

		global $post;

		get_template_part( 'template-parts/content-singular', $post->post_type );
		
		comments_template( 'template-parts/comments' );

		if ( $post->post_type !== 'page' ) {

			the_post_navigation();

		}

	}

?></section>
