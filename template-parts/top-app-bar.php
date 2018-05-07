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

<header class="wpmdc-top-app-bar mdc-top-app-bar">

	<div class="mdc-top-app-bar__row">

		<section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">

			<button 
			for="drawer"
			class="material-icons mdc-top-app-bar__navigation-icon"
			title="<?php echo esc_attr( $drawer_toggle_label ); ?>" 
			alt="<?php echo esc_attr( $drawer_toggle_label ); ?>"
			aria-label="<?php echo esc_attr( $drawer_toggle_label ); ?>">menu</button>

			<?php 
			if ( is_author() ) {

				$author = get_queried_object();

				echo get_avatar( 
					sanitize_email( $author->user_email ), 
					112, 
					'', 
					esc_attr( $author->display_name ), 
					array(
						'height' => 40, 
						'width'  => 40, 
						'class'  => array( 'mdc-elevation--z2' ), 
					) 
				);

			} ?>

			<?php wpmdc_top_app_bar_title( '<h4 class="mdc-top-app-bar__title">', '</h4>'); ?>

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
