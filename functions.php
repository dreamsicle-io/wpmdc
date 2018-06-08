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
define( 'WPMDCLOREM', _x( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'lorem ipsum demo text.', 'wpmdc' ) );

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
require WPMDCINC . '/components/class-wpmdc-layout-grid.php';
require WPMDCINC . '/components/class-wpmdc-top-app-bar.php';
require WPMDCINC . '/components/class-wpmdc-card.php';
require WPMDCINC . '/components/class-wpmdc-drawer.php';
require WPMDCINC . '/components/class-wpmdc-list-item.php';
require WPMDCINC . '/components/class-wpmdc-image-list.php';
require WPMDCINC . '/components/class-wpmdc-image-list-item.php';
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
require WPMDCINC . '/components/class-wpmdc-linear-progress.php';
require WPMDCINC . '/components/class-wpmdc-typography.php';
require WPMDCINC . '/widgets/class-wpmdc-widget-nav-menu.php';
require WPMDCINC . '/widgets/class-wpmdc-widget-pages.php';
require WPMDCINC . '/widgets/class-wpmdc-widget-posts.php';
require WPMDCINC . '/widgets/class-wpmdc-widget-comments.php';
require WPMDCINC . '/widgets/class-wpmdc-widget-archives.php';
require WPMDCINC . '/widgets/class-wpmdc-widget-terms.php';
require WPMDCINC . '/walkers/class-wpmdc-walker-page.php';
require WPMDCINC . '/walkers/class-wpmdc-walker-category.php';
require WPMDCINC . '/tags/component.php';
require WPMDCINC . '/tags/top-app-bar.php';
require WPMDCINC . '/tags/drawer.php';
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
