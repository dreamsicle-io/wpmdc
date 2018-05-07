<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that 
 * contains both the current comments and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpmdc
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$comments_open = comments_open();
$comments_number = intval( get_comments_number() );

if ( $comments_open || ( $comments_number > 0 ) ) { ?>

	<section id="comments" class="comments-area">

		<?php 
		if ( have_comments() ) { 

			$post_title = get_the_title(); ?>

			<h2><?php

				if ( 1 === $comments_number ) {

					printf(
						/* translators: 1: title. */
						esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'wpmdc' ),
						'<span>' . esc_html( $post_title ) . '</span>'
					);

				} else {

					printf( // WPCS: XSS OK.
						/* translators: 1: comment count number, 2: title. */
						esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comments_number, 'comments title', 'wpmdc' ) ),
						number_format_i18n( $comments_number ),
						'<span>' . esc_html( $post_title ) . '</span>'
					);

				}
			
			?></h2>

			<?php the_comments_navigation(); ?>

			<ol><?php

				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
				
			?></ol>

			<?php
			the_comments_navigation();

			if ( ! $comments_open ) { ?>
				
				<p><?php 

					esc_html_e( 'Comments are closed.', 'wpmdc' ); 

				?></p>
			
			<?php }

		}

		comment_form(); ?>

	</section>

<?php } 
