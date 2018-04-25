<?php 
/**
 * The Designer Message.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     wpmdc
 * @subpackage  template-parts
 */

$theme = wp_get_theme();

?>

<p><?php 

	printf( 
		/* translators: 1: theme author link. */
		_x( 'Designed by %1$s', 'copyright', 'wpmdc' ),  
		'<a href="' . esc_url( $theme->get( 'AuthorURI' ) ) . '" target="_blank" rel="noopener noreferrer">' . esc_html( $theme->get( 'Author' ) ) . '</a>'
	);

?></p>
