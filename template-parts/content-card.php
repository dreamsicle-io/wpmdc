<?php 
/**
 * The Card Content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     wpmdc
 * @subpackage  template-parts
 */

$permalink = get_permalink();
$title_attr = the_title_attribute( array( 'echo' => false ) );

?>

<article id="<?php echo esc_attr( $post->post_type . '_' . $post->ID ); ?>" <?php post_class(); ?>><?php 
	
	if ( has_post_thumbnail() ) { ?>
		
		<a 
		href="<?php echo esc_url( $permalink ); ?>" 
		title="<?php echo esc_attr( $title_attr ); ?>" 
		rel="bookmark"><?php 
		
			the_post_thumbnail( 'medium', array( 
				'alt' => esc_attr( $title_attr ) 
			) );

		?></a>

	<?php }
	
	the_title( '<h3><a href="' . esc_url( $permalink ) . '" rel="bookmark">', '</a></h3>' );

	if ( $post->post_type !== 'page' ) {

		printf( 
			/* translators: 1: post author, 2: post publish date, 3: post publish time. */
			_x( 'Posted by %1$s on %2$s at %3$s', 'post byline', 'wpmdc' ), 
			get_the_author_posts_link(), 
			get_the_date(), 
			get_the_time() 
		);

	}

	the_excerpt();

?></article>
