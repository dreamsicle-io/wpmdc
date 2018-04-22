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
require get_template_directory() . '/includes/class-wpmdc-structure.php';
require get_template_directory() . '/includes/class-wpmdc-customizer.php';
require get_template_directory() . '/includes/template-tags.php';

/**
 * Init all classes.
 */
add_action( 'after_setup_theme', array( new WPMDC, 'init' ), 10 );
add_action( 'after_setup_theme', array( new WPMDC_Structure, 'init' ), 10 );
add_action( 'after_setup_theme', array( new WPMDC_Customizer, 'init' ), 10 );
