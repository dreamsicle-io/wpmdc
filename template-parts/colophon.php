<?php 
/**
 * The Colophon.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     wpmdc
 * @subpackage  template-parts
 */
?>

<footer id="colophon">

	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wpmdc' ) ); ?>"><?php
		/* translators: %s: CMS name, i.e. WordPress. */
		printf( 
			esc_html__( 'Proudly powered by %s', 'wpmdc' ), 
			'WordPress' 
		);
	?></a>

	<span> | </span>

	<span><?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf( 
			esc_html__( 'Theme: %1$s by %2$s.', 'wpmdc' ), 
			'wpmdc', 
			'<a href="http://www.dreamsicle.io">Dreamsicle</a>' 
		); 
	?></span>

</footer><!-- #colophon -->