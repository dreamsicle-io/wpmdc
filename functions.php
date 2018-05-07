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
require $template_directory . '/includes/class-wpmdc-comments.php';
require $template_directory . '/includes/class-wpmdc-assets.php';
require $template_directory . '/includes/class-wpmdc-customizer.php';
require $template_directory . '/includes/class-wpmdc-component.php';
require $template_directory . '/includes/widgets/class-wpmdc-widget-nav-menu.php';
require $template_directory . '/includes/widgets/class-wpmdc-widget-pages.php';
require $template_directory . '/includes/widgets/class-wpmdc-widget-posts.php';
require $template_directory . '/includes/widgets/class-wpmdc-widget-comments.php';
require $template_directory . '/includes/widgets/class-wpmdc-widget-archives.php';
require $template_directory . '/includes/widgets/class-wpmdc-widget-terms.php';
require $template_directory . '/includes/walkers/class-wpmdc-walker-page.php';
require $template_directory . '/includes/walkers/class-wpmdc-walker-category.php';
require $template_directory . '/includes/components/class-wpmdc-layout-grid.php';
require $template_directory . '/includes/components/class-wpmdc-text-field.php';
require $template_directory . '/includes/tags/component.php';
require $template_directory . '/includes/tags/top-app-bar.php';
require $template_directory . '/includes/tags/hero.php';

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
add_action( 'after_setup_theme', array( new WPMDC_Comments, 'init' ), 0 );
add_action( 'after_setup_theme', array( new WPMDC_Assets, 'init' ), 0 );
add_action( 'after_setup_theme', array( new WPMDC_Customizer, 'init' ), 0 );
