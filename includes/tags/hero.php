<?php
/**
 * Template Tags: Hero.
 *
 * @package     wpmdc
 * @subpackage  template-tags
 */

if ( ! function_exists( 'wpmdc_get_hero_overline' ) ) {

	function wpmdc_get_hero_overline() {

		$overline = '';

		if ( is_singular() || ( is_home() && ! is_front_page() ) ) {

			$overline = single_post_title( '', false );

		} elseif ( is_front_page() ) {

			$overline = get_bloginfo( 'name' );
			
		} elseif ( is_archive() ) {

			$overline = get_the_archive_title();

		} elseif ( is_search() ) {

			$overline = __( 'Search', 'wpmdc' );

		} 

		return apply_filters( 'wpmdc_hero_overline', $overline );

	}

}

if ( ! function_exists( 'wpmdc_hero_overline' ) ) {

	function wpmdc_hero_overline( $before = '', $after = '' ) {

		$overline = wpmdc_get_hero_overline();

		if ( ! empty( $overline ) ) {

			echo $before . esc_html( $overline ) . $after;

		}

	}

}

if ( ! function_exists( 'wpmdc_get_hero_title' ) ) {

	function wpmdc_get_hero_title() {

		$title = '';

		if ( is_singular() || ( is_home() && ! is_front_page() ) ) {

			$title = single_post_title( '', false );

		} elseif ( is_front_page() ) {

			$title = get_bloginfo( 'name' );
			
		} elseif ( is_archive() ) {

			$title = get_the_archive_title();

		} elseif ( is_search() ) {

			$title = __( 'Search', 'wpmdc' );

		} 

		return apply_filters( 'wpmdc_hero_title', $title );

	}

}

if ( ! function_exists( 'wpmdc_hero_title' ) ) {

	function wpmdc_hero_title( $before = '', $after = '' ) {

		$title = wpmdc_get_hero_title();

		if ( ! empty( $title ) ) {

			echo $before . esc_html( $title ) . $after;

		}

	}

}

if ( ! function_exists( 'wpmdc_get_hero_description' ) ) {

	function wpmdc_get_hero_description() {

		$description = '';

		if ( is_singular() || ( is_home() && ! is_front_page() ) ) {

			$description = single_post_title( '', false );

		} elseif ( is_front_page() ) {

			$description = get_bloginfo( 'description' );
			
		} elseif ( is_archive() ) {

			$description = get_the_archive_title();

		} elseif ( is_search() ) {

			$description = __( 'Search', 'wpmdc' );

		} 

		return apply_filters( 'wpmdc_hero_description', $description );

	}

}

if ( ! function_exists( 'wpmdc_hero_description' ) ) {

	function wpmdc_hero_description( $before = '', $after = '' ) {

		$description = wpmdc_get_hero_title();

		if ( ! empty( $description ) ) {

			echo $before . esc_html( $description ) . $after;

		}

	}

}
