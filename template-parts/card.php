<?php 
/**
 * The Card Content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-template-parts
 *
 * @package     wpmdc
 * @subpackage  template-parts
 */

global $post;

?>

<article <?php wpmdc_post_id_attr() . post_class(); ?>><?php 
	
	/**
	 * Hook: WPMDC Card.
	 *
	 * @since  0.0.1 
	 * @param  object  $post  The global post object.
	 */
	do_action( 'wpmdc_card', $post );

?></article>
