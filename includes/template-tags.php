<?php
/**
 * Template Tags.
 *
 * @link https://codex.wordpress.org/Template_Tags
 *
 * @package     wpmdc
 * @subpackage  includes
 */

/**
 * WPMDC Get Post "id" Attribute.
 *
 * @since   0.0.1 
 * @param   integer  $post_id  The ID of the post to create the attribute for.
 * @return  string             The filtered "id" attribute value.
 */
function wpmdc_get_post_id_attr( $post_id = 0 ) {
	$post = get_post( $post_id );
	$pieces = array( $post->post_type, $post->ID );
	$sep = '_';
	return apply_filters( 'wpmdc_post_id_attr', implode( $sep, $pieces ), $pieces, $sep, $post );
}

/**
 * WPMDC Post "id" Attribute.
 *
 * @since   0.0.1 
 * @return  void
 */
function wpmdc_post_id_attr() {
	printf(	' id="%1$s" ', esc_attr( wpmdc_get_post_id_attr() )	);
}
