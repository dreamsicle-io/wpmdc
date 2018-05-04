<?php 
/**
 * The card content.
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

$permalink = get_permalink();
$title_attr = the_title_attribute( array( 'echo' => false ) );
$excerpt = get_the_excerpt( $post->ID );

?>

<article id="<?php echo esc_attr( $post->post_type . '_' . $post->ID ); ?>" <?php post_class( 'wpmdc-card mdc-card mdc-typography--body2' ); ?>>
	
	<a 
	href="<?php echo esc_url( $permalink ); ?>" 
	class="mdc-card__primary-action mdc-ripple-surface"
	title="<?php echo esc_attr( $title_attr ); ?>"
	rel="bookmark">

		<?php if ( has_post_thumbnail() ) { ?>
		
			<header 
			class="mdc-card__media mdc-card__media--16-9" 
			style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( $post->ID, 'medium' ) ); ?>');"></header>

		<?php } ?>
		
		<div class="wpmdc-card__content">

			<?php the_title( '<h3 class="wpmdc-card__title mdc-typography--headline5">', '</h3>' ); ?>

			<h4 class="wpmdc-card__subtitle mdc-typography--caption"><?php 

				if ( $post->post_type === 'post' ) {

					printf( 
						/* translators: 1: post author, 2: post publish date, 3: post publish time. */
						esc_html_x( 'Posted by %1$s on %2$s at %3$s', 'post card byline', 'wpmdc' ), 
						get_the_author(), 
						get_the_date(), 
						get_the_time() 
					);

				} 

			?></h4>

			<?php if ( $excerpt ) { 

				echo apply_filters( 'the_excerpt', $excerpt );

			} ?>

		</div>
	
	</a>

	<footer class="mdc-card__actions">
		
		<div class="mdc-card__action-buttons">
			
			<button class="mdc-button mdc-card__action mdc-card__action--button mdc-ripple-surface">

				Read

			</button>
		
		</div>
		
		<div class="mdc-card__action-icons">
			
			<i 
			class="material-icons mdc-ripple-surface mdc-card__action mdc-card__action--icon" 
			tabindex="0" 
			role="button" 
			title="More options" 
			data-mdc-ripple-is-unbounded="true">

				more_vert

			</i>
		
		</div>
	
	</footer>

</article>
