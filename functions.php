<?php
/**
 * wpmdc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wpmdc
 */

$template_directory = get_template_directory();

/**
 * Require all files.
 */
require $template_directory . '/includes/class-wpmdc.php';
require $template_directory . '/includes/class-wpmdc-widgets.php';
require $template_directory . '/includes/class-wpmdc-navigation.php';
require $template_directory . '/includes/class-wpmdc-assets.php';
require $template_directory . '/includes/class-wpmdc-customizer.php';
require $template_directory . '/includes/class-wpmdc-widget-nav-menu.php';
require $template_directory . '/includes/class-wpmdc-widget-archives.php';
require $template_directory . '/includes/class-wpmdc-widget-categories.php';
require $template_directory . '/includes/class-wpmdc-walker-category.php';

/**
 * Initialize all classes.
 *
 * These should be initialized at priority 0 to allow other 
 * functions and methods attached to the 'after_setup_theme' 
 * hook to be hooked properly.
 */
add_action( 'after_setup_theme', array( new WPMDC, 'init' ), 0 );
add_action( 'after_setup_theme', array( new WPMDC_Widgets, 'init' ), 0 );
add_action( 'after_setup_theme', array( new WPMDC_Navigation, 'init' ), 0 );
add_action( 'after_setup_theme', array( new WPMDC_Assets, 'init' ), 0 );
add_action( 'after_setup_theme', array( new WPMDC_Customizer, 'init' ), 0 );
