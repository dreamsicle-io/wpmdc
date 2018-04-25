<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpmdc
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head><?php wp_head(); ?></head>
<body <?php body_class(); ?>>

	<div id="site">

		<a class="screen-reader-text" href="#content"><?php 

			esc_html_e( 'Skip to Content', 'wpmdc' ); 
			
		?></a>

		<?php get_template_part( 'template-parts/masthead' ); ?>

		<div id="content">
