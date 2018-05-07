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

		if ( is_page() || ( is_home() && ! is_front_page() ) ) {

			$overline = single_post_title( '', false );

		} elseif ( is_singular() ) {

			$post_type = get_post_type();

			if ( $post_type === 'post' ) {

				$posts_page_id = get_option( 'page_for_posts' );

				if ( $posts_page_id > 0 ) {

					$overline = get_the_title( $posts_page_id );

				} else {

					$post_type_object = get_post_type_object( $post_type );	

					$overline = $post_type_object->labels->name;

				}

			} else {

				$post_type_object = get_post_type_object( $post_type );

				$overline = $post_type_object->labels->name;

			}

		} elseif ( is_front_page() ) {

			$overline = get_bloginfo( 'name' );
			
		} elseif ( is_archive() ) {

			$overline = __( 'Archives', 'wpmdc' );

			if ( is_category() || is_tag() || is_tax() ) {

				$term = get_queried_object();

				$taxonomy = get_taxonomy( $term->taxonomy );

				$overline = $taxonomy->labels->singular_name;

			} elseif ( is_year() ) {
				
				$overline = __( 'Yearly Archives', 'wpmdc' );

			} elseif ( is_month() ) {
				
				$overline = __( 'Monthly Archives', 'wpmdc' );

			} elseif ( is_day() ) {
				
				$overline = __( 'Daily Archives', 'wpmdc' );

			}

		} elseif ( is_search() ) {

			$overline = __( 'Search', 'wpmdc' );

		} elseif ( is_404() ) {

			$overline = __( 'Nothing Found', 'wpmdc' );

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

		if ( is_home() && is_front_page() ) {

			$title = get_bloginfo( 'name' );
			
		} elseif ( is_singular() || ( is_home() && ! is_front_page() ) ) {

			$title = single_post_title( '', false );

		} elseif ( is_archive() ) {

			$title = strip_tags( get_the_archive_title() );

		} elseif ( is_search() ) {

			$title = get_search_query();

		} elseif ( is_404() ) {

			$title = __( '404', 'wpmdc' );

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

		if ( is_home() && is_front_page() ) {

			$description = get_bloginfo( 'description' );
			
		} elseif ( is_archive() ) {

			$description = strip_tags( get_the_archive_description() );

		} elseif ( is_search() ) {

			$description = sprintf( 
				/* translators: 1: search query. */
				__( 'Search results for &ldquo;%1$s&rdquo;', 'wpmdc' ), 
				get_search_query() 
			);

		} elseif ( is_404() ) {

			$description = _x( 'Well, this is embarassing. The page you\'re looking for has either moved, or was never here to begin with. Check the URL or try a search.', '404 hero description', 'wpmdc' );

		} 

		return apply_filters( 'wpmdc_hero_description', $description );

	}

}

if ( ! function_exists( 'wpmdc_hero_description' ) ) {

	function wpmdc_hero_description( $before = '', $after = '' ) {

		$description = wpmdc_get_hero_description();

		if ( ! empty( $description ) ) {

			echo $before . esc_html( $description ) . $after;

		}

	}

}

if ( ! function_exists( 'wpmdc_get_hero_background_url' ) ) {

	function wpmdc_get_hero_background_url() {

		$url = get_header_image();

		if ( is_singular() ) {

			if ( has_post_thumbnail() ) {
			
				$url = get_the_post_thumbnail_url( null, 'large' );

			}

		}

		return apply_filters( 'wpmdc_hero_background_url', $url );

	}

}

if ( ! function_exists( 'wpmdc_hero_background_url' ) ) {

	function wpmdc_hero_background_url() {

		$url = wpmdc_get_hero_background_url();

		if ( ! empty( $url ) ) {

			echo esc_url( $url );

		}

	}

}
