<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpmdc
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

?>

<aside id="drawer" class="widget-area"><?php 

	if ( is_active_sidebar( 'drawer' ) ) {
		
		dynamic_sidebar( 'drawer' );
	
	} 

?></aside>
