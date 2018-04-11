<?php
/**
 * wpmdc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wpmdc
 */

require get_template_directory() . '/includes/class-wpmdc.php';
require get_template_directory() . '/includes/customizer.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/includes/jetpack.php';
}

if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/includes/woocommerce.php';
}

function wpmdc_init() {
	new WPMDC()->init();
}

add_action( 'after_setup_theme', 'wpmdc_init', 10 );
