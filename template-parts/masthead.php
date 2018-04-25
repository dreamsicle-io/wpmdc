<?php 
/**
 * The Masthead.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     wpmdc
 * @subpackage  template-parts
 */
?>

<header id="masthead">

	<?php if ( has_custom_logo() ) {

		the_custom_logo(); 
	
	} ?>

	<h1 class="site-title">

		<a 
		href="<?php echo esc_url( home_url( '/' ) ); ?>" 
		title="<?php echo esc_attr( get_bloginfo( 'description' ) ) ?>"
		rel="home"><?php 

			bloginfo( 'name' ); 

		?></a>

	</h1>

	<?php if ( has_nav_menu( 'menu-1' ) ) {

		wp_nav_menu( array(
			'container'      => 'nav', 
			'theme_location' => 'menu-1',
			'menu_id'        => 'primary-menu',
		) ); 

	} ?>

</header>