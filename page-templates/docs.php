<?php
/**
 * Template Name: Docs
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package    wpmdc
 * @subpackage page-templates
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

get_template_part( 'template-parts/header' ); ?>

	<main id="main" class="mdc-theme--surface mdc-theme--on-surface">

		<?php get_template_part( 'template-parts/loop-singular' ); ?>

		<h2><?php esc_html_e( 'Components', 'wpmdc' ); ?></h2>

		<?php
		get_template_part( 'includes/components/examples/text-field' ); 
		get_template_part( 'includes/components/examples/button' ); 
		get_template_part( 'includes/components/examples/checkbox' ); 
		get_template_part( 'includes/components/examples/switch' ); 
		get_template_part( 'includes/components/examples/radio' ); 
		// get_template_part( 'includes/components/examples/icon-button' );
		get_template_part( 'includes/components/examples/icon-toggle' ); ?>

	</main>

<?php
get_template_part( 'template-parts/footer' );
