<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpmdc
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

get_template_part( 'template-parts/header' ); ?>

	<main id="main"><?php 

		get_template_part( 'template-parts/page-header' );

		get_template_part( 'template-parts/loop', is_singular() ? 'singular' : 'cards' ); 

	?></main>

<?php
get_template_part( 'template-parts/footer' );
