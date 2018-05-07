<?php 
/**
 * WPMDC Theme Setup Class.
 *
 * @package    wpmdc
 * @subpackage includes
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC.
 *
 * @since  0.0.1 
 */
class WPMDC {

	/**
	 * Construct.
	 *
	 * @since   0.0.1
	 * @return  void
	 */
	function __construct() {

	}

	/**
	 * Initialize.
	 *
	 * @since   0.0.1
	 * @return  void
	 */
	public function init() {

		// Hooks
		add_action( 'after_setup_theme', array( $this, 'manage_globals' ), 0 );
		add_action( 'after_setup_theme', array( $this, 'manage_theme_support' ), 10 );
		add_action( 'init', array( $this, 'manage_post_type_support' ), 20 );
		add_action( 'wp_enqueue_scripts', array( $this, 'manage_site_scripts' ), 10 );
		add_action( 'wp_head', array( $this, 'manage_head' ), 0 );

		// Filters
		add_filter( 'body_class', array( $this, 'manage_body_classes' ), 10 );
		add_filter( 'the_content', array( $this, 'manage_entry_content' ), 10 );
		add_filter( 'the_excerpt', array( $this, 'manage_entry_excerpt' ), 10 );

	}

	/**
	 * Manage Globals.
	 *
	 * @since   0.0.1
	 * @return  void
	 */
	public function manage_globals() {

		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		$GLOBALS['content_width'] = apply_filters( 'wpmdc_content_width', 768 );

	}

	/**
	 * Manage Theme Support.
	 *
	 * @since   0.0.1
	 * @return  void
	 */
	public function manage_theme_support() {

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'custom-background', apply_filters( 'wpmdc_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		add_theme_support( 'custom-header', apply_filters( 'wpmdc_custom_header_args', array(
			'default-image'      => '',
			'default-text-color' => '',
			'width'              => 1920,
			'height'             => 1080,
			'flex-width'         => true,
			'flex-height'        => true,
		) ) );
		add_theme_support( 'custom-logo', apply_filters( 'wpmdc_custom_logo_args', array(
			'height'      => 512,
			'width'       => 512,
			'flex-width'  => true,
			'flex-height' => true,
		) ) );
		
	}

	public function manage_post_type_support() {

		add_post_type_support( 'page', 'excerpt' );

	}

	/**
	 * Manage Site Scripts.
	 *
	 * @since   0.0.1
	 * @return  void
	 */
	public function manage_site_scripts() {

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	/**
	 * Manage Body Classes.
	 *
	 * @since   0.0.1
	 * @param   array  $classes  The incoming array of classes to filter.
	 * @return  array            The filtered array of classes.
	 */
	public function manage_body_classes( $classes ) {

		$classes = array_merge( $classes, array( 
			'wpmdc', 
			'mdc-typography', 
			'mdc-typography--body1', 
			'mdc-theme--background', 
		) );

		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}

	/**
	 * Manage Head.
	 *
	 * @since   0.0.1
	 * @return  void
	 */
	public function manage_head() { 

		$is_singular = is_singular(); ?>

		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
		<meta name="theme-color" content="#000000">

		<?php if ( $is_singular ) {

			$post = get_queried_object();
			$excerpt = $post->post_excerpt ? $post->post_excerpt : $post->post_content;
			$excerpt = apply_filters( 'get_the_excerpt', $post->post_excerpt ? $post->post_excerpt : $post->post_content );
			$excerpt = wp_trim_words( strip_tags( $excerpt ), 25 ); ?>
			
			<meta property="og:url" content="<?php the_permalink(); ?>" />
			<meta property="og:type" content="article" />
			<meta property="og:title" content="<?php the_title_attribute(); ?>" />
			<meta property="og:description" content="<?php echo esc_attr( $excerpt ); ?>" />
			<meta property="og:image" content="<?php the_post_thumbnail_url( 'full' ); ?>" />
		
		<?php } ?>

		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

		<?php if ( $is_singular && pings_open() ) { ?>
			<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>" />
		<?php }

	}

	/**
	 * Manage Entry Content.
	 *
	 * @since   0.0.1
	 * @return  void
	 */
	public function manage_entry_content( $content ) { 

		if ( ! empty( $content ) ) {
			$content = '<div class="entry-content">' . $content . '</div>';
		}

		return $content;

	}

	/**
	 * Manage Entry Excerpt.
	 *
	 * @since   0.0.1
	 * @return  void
	 */
	public function manage_entry_excerpt( $excerpt ) { 

		if ( ! empty( $excerpt ) ) {
			$excerpt = '<div class="entry-excerpt">' . $excerpt . '</div>';
		}

		return $excerpt;

	}

}