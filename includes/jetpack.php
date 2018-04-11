<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package wpmdc
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function wpmdc_jetpack_setup() {

	add_theme_support( 'jetpack-responsive-videos' );
	add_theme_support( 'infinite-scroll', apply_filters( 'wpmdc_jetpack_infinite_scroll_args', array(
		'container' => 'main',
		'render'    => 'wpmdc_infinite_scroll_render',
		'footer'    => 'page',
	) ) );
	add_theme_support( 'jetpack-content-options', apply_filters( 'wpmdc_jetpack_content_options_args', array(
		'post-details'    => array(
			'stylesheet' => 'wpmdc',
			'date'       => '.posted-on',
			'categories' => '.cat-links',
			'tags'       => '.tags-links',
			'author'     => '.byline',
			'comment'    => '.comments-link',
		),
		'featured-images' => array(
			'archive' => true,
			'post'    => true,
			'page'    => true,
		),
	) ) );

}

add_action( 'after_setup_theme', 'wpmdc_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function wpmdc_infinite_scroll_render() {
	while ( have_posts() ) { the_post();
		if ( is_search() ) {
			get_template_part( 'template-parts/content', 'search' );
		} else {
			get_template_part( 'template-parts/content', get_post_type() );
		}
	}
}
