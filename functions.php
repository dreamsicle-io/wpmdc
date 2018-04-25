<?php
/**
 * wpmdc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wpmdc
 */

/**
 * Require all files.
 */
require get_template_directory() . '/includes/class-wpmdc.php';
require get_template_directory() . '/includes/class-wpmdc-assets.php';
require get_template_directory() . '/includes/class-wpmdc-customizer.php';

/**
 * Initialize all classes.
 *
 * These should be initialized at priority 0 to allow other 
 * functions and methods attached to the 'after_setup_theme' 
 * hook to be hooked properly.
 */
add_action( 'after_setup_theme', array( new WPMDC, 'init' ), 0 );
add_action( 'after_setup_theme', array( new WPMDC_Assets, 'init' ), 0 );
add_action( 'after_setup_theme', array( new WPMDC_Customizer, 'init' ), 0 );
