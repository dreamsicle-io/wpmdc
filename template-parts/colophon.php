<?php 
/**
 * The Colophon.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     wpmdc
 * @subpackage  template-parts
 */

$theme = wp_get_theme();

?>

<footer id="colophon">

	<p><?php 
	
		/* translators: 1: current year, 2: site title link. */
		printf( 
			_x( '&copy; %1$d %2$s', 'site copyright', 'wpmdc' ), 
			date( 'Y' ), 
			'<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>'
		);

	?></p>

	<p><?php 
		
		/* translators: 1: theme author link. */
		printf( 
			_x( 'Designed by %1$s', 'site designer', 'wpmdc' ),  
			'<a href="' . esc_url( $theme->get( 'AuthorURI' ) ) . '" target="_blank" rel="noopener noreferrer">' . esc_html( $theme->get( 'Author' ) ) . '</a>'
		);

	?></p>

?></footer>
