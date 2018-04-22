<?php 
/**
 * The Masthead.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-template-parts
 *
 * @package     wpmdc
 * @subpackage  template-parts
 */
?>

<header id="masthead" class="site-header">
	
	<div class="site-branding">
		<?php
		the_custom_logo();
		if ( is_front_page() && is_home() ) {
			?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
		} else {
			?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
		}
		$wpmdc_description = get_bloginfo( 'description', 'display' );
		if ( $wpmdc_description || is_customize_preview() ) {
			?>
			<p class="site-description"><?php echo $wpmdc_description; /* WPCS: xss ok. */ ?></p>
		<?php } ?>
	</div>

	<nav id="site-navigation" class="main-navigation"><?php
		
		wp_nav_menu( array(
			'theme_location' => 'menu-1',
			'menu_id'        => 'primary-menu',
		) );
	
	?></nav>

</header>