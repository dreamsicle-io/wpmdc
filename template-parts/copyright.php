<?php 
/**
 * The Copyright Message.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     wpmdc
 * @subpackage  template-parts
 */
?>

<p><?php 

	printf( 
		/* translators: 1: current year, 2: site title link. */
		_x( '&copy; %1$d %2$s', 'copyright', 'wpmdc' ), 
		date( 'Y' ), 
		'<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>'
	);

?></p>