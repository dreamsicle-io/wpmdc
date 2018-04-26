<?php 
/**
 * The page header for all views.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     wpmdc
 * @subpackage  template-parts
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

?>

<header>

	<?php if ( is_singular() || ( is_home() && ! is_front_page() ) ) { ?>

		<h1><?php 

			single_post_title();

		?></h1>

	<?php } elseif ( is_front_page() ) { ?>

		<h1><?php 

			bloginfo( 'name' );

		?></h1>

		<p><?php 

			bloginfo( 'description' );

		?></p>

	<?php } elseif ( is_archive() ) {

		the_archive_title( '<h1>', '</h1>' );

		the_archive_description( '<div>', '</div>' );

	} elseif ( is_search() ) { ?>

		<h1><?php 

			the_search_query();

		?></h1>

	<?php } ?>

</header>