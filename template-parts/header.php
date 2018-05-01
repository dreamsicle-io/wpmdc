<?php
/**
 * The theme header.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package     wpmdc
 * @subpackage  template-parts
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head><?php wp_head(); ?></head>
<body <?php body_class(); ?>>

	<div id="site">

		<a class="screen-reader-text" href="#content"><?php 

			echo esc_html_x( 'Skip to Content', 'skip link', 'wpmdc' ); 
			
		?></a>

		<?php get_template_part( 'template-parts/top-app-bar' ); ?>

		<div id="content" class="mdc-top-app-bar--fixed-adjust">
