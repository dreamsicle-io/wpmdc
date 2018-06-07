<?php 
if ( ! function_exists( 'wpmdc_get_top_app_bar_title' ) ) {

	function wpmdc_get_top_app_bar_title() {

		$title = get_bloginfo( 'name' );

		if ( is_single() ) {

			$posts_page_id = get_option( 'page_for_posts' );

			if ( $posts_page_id > 0 ) {

				$title = get_the_title( $posts_page_id );

			} 

		} elseif ( is_page() || ( is_home() && ! is_front_page() ) ) {

			$title = single_post_title( '', false );

		} elseif ( is_archive() ) {

			$title = strip_tags( get_the_archive_title() );

			if ( is_year() ) {
				
				$title = __( 'Yearly Archives', 'wpmdc' );

			} elseif ( is_month() ) {
				
				$title = __( 'Monthly Archives', 'wpmdc' );

			} elseif ( is_day() ) {
				
				$title = __( 'Daily Archives', 'wpmdc' );

			}

		} elseif ( is_search() ) {

			$title = __( 'Search', 'wpmdc' );

		} elseif ( is_404() ) {

			$title = __( 'Nothing Found', 'wpmdc' );

		} 

		return apply_filters( 'wpmdc_top_app_bar_title', $title );

	}

}

if ( ! function_exists( 'wpmdc_top_app_bar_title' ) ) {

	function wpmdc_top_app_bar_title( $before = '', $after = '' ) {

		$title = wpmdc_get_top_app_bar_title();

		if ( ! empty( $title ) ) {

			echo $before . esc_html( $title ) . $after;

		}

	}

}

if ( ! function_exists( 'wpmdc_get_top_app_bar_graphic' ) ) {

	function wpmdc_get_top_app_bar_graphic() {

		$graphic = '';

		if ( is_author() ) {

			$author = get_queried_object();

			$graphic = get_avatar( 
				sanitize_email( $author->user_email ), 
				112, 
				'', 
				esc_attr( $author->display_name ), 
				array(
					'height' => 40, 
					'width'  => 40, 
					'class'  => array( 'mdc-elevation--z2', 'wpmdc-top-app-bar__graphic' ), 
				) 
			);

		}

		return apply_filters( 'wpmdc_top_app_bar_graphic', $graphic );

	}

}

if ( ! function_exists( 'wpmdc_top_app_bar_graphic' ) ) {

	function wpmdc_top_app_bar_graphic( $before = '', $after = '' ) {

		$graphic = wpmdc_get_top_app_bar_graphic();

		if ( ! empty( $graphic ) ) {

			echo $before . wp_kses_post( $graphic ) . $after;

		}

	}

}