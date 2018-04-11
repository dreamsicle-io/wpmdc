<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpmdc
 */
?>

<aside id="secondary" class="widget-area"><?php 

	if ( is_active_sidebar( 'drawer' ) ) {
		
		dynamic_sidebar( 'drawer' );
	
	} 

?></aside>
