<?php
/**
 * wpmdc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wpmdc
 */

/**
 * Define path constants.
 */
define( 'WPMDCINC', get_template_directory() . '/includes' );

/**
 * Require all files.
 */
require WPMDCINC . '/class-wpmdc.php';
require WPMDCINC . '/class-wpmdc-widgets.php';
require WPMDCINC . '/class-wpmdc-navigation.php';
require WPMDCINC . '/class-wpmdc-comments.php';
require WPMDCINC . '/class-wpmdc-assets.php';
require WPMDCINC . '/class-wpmdc-customizer.php';
require WPMDCINC . '/class-wpmdc-component.php';
require WPMDCINC . '/widgets/class-wpmdc-widget-nav-menu.php';
require WPMDCINC . '/widgets/class-wpmdc-widget-pages.php';
require WPMDCINC . '/widgets/class-wpmdc-widget-posts.php';
require WPMDCINC . '/widgets/class-wpmdc-widget-comments.php';
require WPMDCINC . '/widgets/class-wpmdc-widget-archives.php';
require WPMDCINC . '/widgets/class-wpmdc-widget-terms.php';
require WPMDCINC . '/walkers/class-wpmdc-walker-page.php';
require WPMDCINC . '/walkers/class-wpmdc-walker-category.php';
require WPMDCINC . '/components/class-wpmdc-layout-grid.php';
require WPMDCINC . '/components/class-wpmdc-drawer.php';
require WPMDCINC . '/components/class-wpmdc-list-item.php';
require WPMDCINC . '/components/class-wpmdc-text-field.php';
require WPMDCINC . '/components/class-wpmdc-checkbox.php';
require WPMDCINC . '/components/class-wpmdc-switch.php';
require WPMDCINC . '/components/class-wpmdc-radio.php';
require WPMDCINC . '/components/class-wpmdc-slider.php';
// require WPMDCINC . '/components/class-wpmdc-icon-button.php';
require WPMDCINC . '/components/class-wpmdc-icon-toggle.php';
require WPMDCINC . '/components/class-wpmdc-button.php';
require WPMDCINC . '/components/class-wpmdc-fab.php';
require WPMDCINC . '/components/class-wpmdc-tab.php';
require WPMDCINC . '/components/class-wpmdc-chip.php';
require WPMDCINC . '/components/class-wpmdc-dialog.php';
require WPMDCINC . '/components/class-wpmdc-menu.php';
require WPMDCINC . '/tags/component.php';
require WPMDCINC . '/tags/top-app-bar.php';
require WPMDCINC . '/tags/hero.php';

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
