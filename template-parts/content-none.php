<?php 
/**
 * The template for when nothing is found.
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

<section id="not_found">

	<h2><?php 
	
		echo esc_html_x( 'Nothing Found.', 'not found template title', 'wpmdc' );

	?></h2>

</section>
