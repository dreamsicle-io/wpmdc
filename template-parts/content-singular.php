<?php 
/**
 * The singular content.
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

global $post;

$title_attr = the_title_attribute( array( 'echo' => false ) );

?>

<article id="<?php echo esc_attr( $post->post_type . '_' . $post->ID ); ?>" <?php post_class( 'wpmdc-card mdc-card' ); ?>> 
	
	<div class="wpmdc-card__content"><?php 

		the_title( '<h1 class="mdc-typography--headline3">', '</h1>' );

		if ( $post->post_type !== 'page' ) {

			printf( 
				/* translators: 1: post author, 2: post publish date, 3: post publish time. */
				_x( 'Posted by %1$s on %2$s at %3$s', 'singular post byline', 'wpmdc' ), 
				get_the_author_posts_link(), 
				get_the_date(), 
				get_the_time() 
			);

		}

		the_content( _x( 'Read More', 'post content read more link', 'wpmdc' ) );

		wp_link_pages( array(
			'before' => '<div>',
			'after'  => '</div>',
		) );

	?></div>

</article>
