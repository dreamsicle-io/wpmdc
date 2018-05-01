<?php 
/**
 * The masthead.
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

$drawer_toggle_label = _x( 'Toggle Drawer', 'top app bar drawer toggle label', 'wpmdc' );
$actions_toggle_label = _x( 'Toggle Actions', 'top app bar actions toggle label', 'wpmdc' );

?>

<header class="wpmdc-top-app-bar mdc-top-app-bar mdc-theme--primary-bg mdc-theme--on-primary">

	<div class="mdc-top-app-bar__row">

		<section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">

			<button 
			for="drawer"
			class="material-icons mdc-top-app-bar__navigation-icon"
			title="<?php echo esc_attr( $drawer_toggle_label ); ?>" 
			alt="<?php echo esc_attr( $drawer_toggle_label ); ?>"
			aria-label="<?php echo esc_attr( $drawer_toggle_label ); ?>">menu</button>

			<a 
			class="mdc-top-app-bar__title mdc-theme--on-primary"
			href="<?php echo esc_url( home_url( '/' ) ); ?>" 
			title="<?php echo esc_attr( get_bloginfo( 'description' ) ) ?>"
			rel="home"><?php 

				bloginfo( 'name' ); 

			?></a>

		</section>

		<section 
		class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" 
		role="toolbar">
					
			<button 
			class="material-icons mdc-top-app-bar__action-item" 
			title="<?php echo esc_attr( $actions_toggle_label ); ?>" 
			alt="<?php echo esc_attr( $actions_toggle_label ); ?>"
			aria-label="<?php echo esc_attr( $actions_toggle_label ); ?>">more_vert</button>

		</section>
	
	</div>

</header>
