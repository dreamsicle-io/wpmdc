<?php

function wpmdc_get_post_id_attr( $post_id = 0 ) {
	$post = get_post( $post_id );
	$pieces = array( $post->post_type, $post->ID );
	$sep = '_';
	return apply_filters( 'wpmdc_post_id_attr', implode( $sep, $pieces ), $pieces, $sep, $post );
}

function wpmdc_post_id_attr() {
	printf(	' id="%1$s" ', esc_attr( wpmdc_get_post_id_attr() )	);
}
