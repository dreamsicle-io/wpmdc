<?php 

class WPMDC {

	function __construct() {

	}

	public static function init() {

		add_action( 'after_setup_theme', array( $this, 'manage_globals' ), 0 );
		add_action( 'after_setup_theme', array( $this, 'manage_theme_support' ), 10 );
		add_action( 'after_setup_theme', array( $this, 'manage_nav_menus' ), 10 );
		add_action( 'widgets_init', array( $this, 'manage_widget_areas' ), 10 );
		add_action( 'wp_enqueue_scripts', array( $this, 'manage_site_scripts' ), 10 );
		add_action( 'body_class', array( $this, 'manage_body_classes' ), 10 );
		add_action( 'wp_head', array( $this, 'manage_head' ), 10 );

	}

	public static function manage_globals() {

		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		$GLOBALS['content_width'] = apply_filters( 'wpmdc_content_width', 768 );

	}

	/**
	 * Manage Theme Support
	 *
	 * @since   0.0.1
	 * @return  void
	 */
	public static function manage_theme_support() {
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
		) ) );
		add_theme_support( 'custom-logo', apply_filters( 'wpmdc_custom_logo_args', array(
			'height'      => 512,
			'width'       => 512,
			'flex-width'  => true,
			'flex-height' => true,
		) ) );
		
	}

	public static function manage_nav_menus() {

		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'wpmdc' ),
		) );
		
	}

	public static function manage_widget_areas() {

		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'wpmdc' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wpmdc' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

	}

	public static function manage_site_scripts() {

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	public static function manage_body_classes( $classes ) {

		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}

	public static function manage_head() { ?>

		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />

		<?php if ( is_singular() && pings_open() ) { ?>
			<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>" />
		<?php }

	}

}