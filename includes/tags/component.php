<?php 
function wpmdc_get_component( $component = null ) {
	
	if ( ! $component instanceof WPMDC_Component ) {
		return;
	}

	ob_start();

	$component->render();

	return ob_get_clean();

}

function wpmdc_component( $component = null ) {
	
	if ( ! $component instanceof WPMDC_Component ) {
		return;
	}

	echo wpmdc_get_component( $component );

}