<?php
/**
 * The WPMDC Widget Comments class.
 *
 * @package    wpmdc
 * @subpackage includes
 */

/**
 * WPMDC Widget Comments.
 *
 * @since 0.0.1
 *
 * @see WP_Widget
 */
class WPMDC_Widget_Comments extends WP_Widget {

	/**
	 * Construct.
	 * 
	 * Sets up a new Recent Comments widget instance.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'wpmdc-widget--comments',
			'description'                 => __( 'Your site&#8217;s comments.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'wpmdc_widget_comments', __( 'Comments', 'wpmdc' ), $widget_ops );
		$this->alt_option_name = 'wpmdc_widget_comments';

	}

	public function get_item_avatar( $comment ) {
		
		$avatar_args = array(
			'size' => 128, 
		);

		if ( $comment->user_id > 0 ) {
			$avatar = get_avatar_url( $comment->user_id, $avatar_args );
		} else {
			$avatar = get_avatar_url( $comment->comment_author_email, $avatar_args );
		}

		$avatar = apply_filters( 'wpmdc_widget_comments_item_avatar', $avatar, $comment );

		return $avatar;
	}

	/**
	 * Widget.
	 * 
	 * Outputs the content for the current Recent Comments widget instance.
	 *
	 * @since   0.0.1
	 * @param   array  $args      Display arguments.
	 * @param   array  $instance  Settings for the current Recent Comments widget instance.
	 * @return  void 
	 */
	public function widget( $args, $instance ) {

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$instance = wp_parse_args( $instance, array(
			'title'     => '', 
			'number'    => 5, 
			'excerpts'  => false, 
			'graphics'  => false, 
		) );

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Comments', 'wpmdc' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$get_comments_args = array(
			'number'      => ( $instance['number'] > 0 ) ? intval( $instance['number'] ) : 5,
			'status'      => 'approve',
			'post_status' => 'publish',
		);

		/**
		 * Filters the arguments for the Recent Comments widget.
		 *
		 * @since   0.0.1                      Added the `$instance` parameter.
		 * @param   array  $get_comments_args  An array of arguments used to retrieve the recent comments.
		 * @param   array  $instance           Array of settings for the current widget.
		 * @return  void 
		 */
		$get_comments_args = apply_filters( 'wpmdc_widget_comments_get_comments_args', $get_comments_args, $instance );
		
		$comments = get_comments( $get_comments_args );

		if ( is_array( $comments ) && ! empty( $comments ) && ! is_wp_error( $comments ) ) {
			
			// Prime cache for associated posts. 
			// Prime post term cache if needed for permalinks.
			$post_ids = array_unique( wp_list_pluck( $comments, 'comment_post_ID' ) );
			_prime_post_caches( $post_ids, strpos( get_option( 'permalink_structure' ), '%category%' ), false );

			$list_classes = array(
				'wpmdc-list', 
				'mdc-list', 
			);

			if ( $instance['excerpts'] ) {
				$list_classes[] = 'mdc-list--two-line';
			}

			if ( $instance['graphics'] ) {
				$list_classes[] = 'mdc-list--avatar-list';
			}
			
			echo $args['before_widget'];

			if ( $title ) {
				echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
			} ?>

			<div class="<?php echo esc_attr( implode( ' ', $list_classes ) ); ?>"><?php 

				foreach ( $comments as $comment ) {

					if ( ! post_password_required( $comment->comment_post_ID ) ) {
						$excerpt = strip_tags( get_comment_excerpt( $comment->comment_ID ) );
						// Fix the excerpt on customizer change. When the widget is 
						// updated in the customizer, the excerpt only shows when 
						// there is one explicitly set.
						$excerpt = ! empty( $excerpt ) ? $excerpt : apply_filters( 'comment_excerpt', wp_trim_words( strip_tags( $comment->comment_content ) ) );
					} else {
						$excerpt = '';
					}

					$comment_author = get_comment_author( $comment->comment_ID ); ?>

					<a 
					href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" 
					title="<?php echo ! $instance['excerpts'] ? esc_attr( $excerpt ) : ''; ?>"
					class="mdc-list-item mdc-ripple-surface">

						<?php if ( $instance['graphics'] ) { ?>
							
							<img 
							class="mdc-list-item__graphic"
							src="<?php echo esc_url( $this->get_item_avatar( $comment ) ); ?>"
							alt="<?php echo esc_attr( $comment_author ); ?>" />

						<?php } ?>
						
						<span class="mdc-list-item__text">

							<?php 
							printf(
								/* translators: 1: comment author, 2: post title. */
								_x( '%1$s on %2$s', 'comments widget link', 'wpmdc' ),
								$comment_author,
								get_the_title( $comment->comment_post_ID )
							); 

							if ( $instance['excerpts'] ) { ?>
								
								<span class="mdc-list-item__secondary-text"><?php 
								
									echo esc_html( strip_tags( $excerpt ) );

								?></span>

							<?php } ?>

						</span>

					</a>

				<?php }

			?></div>

			<?php 
			echo $args['after_widget'];

		}

	}

	/**
	 * Update.
	 * 
	 * Handles updating settings for the current Recent Comments widget instance.
	 *
	 * @since   0.0.1
	 * @param   array  $new_instance  New settings for this instance as input by the user.
	 * @param   array  $old_instance  Old settings for this instance.
	 * @return  array                 Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;

		$new_instance = wp_parse_args( $new_instance, array(
			'title'    => '', 
			'number'   => 5, 
			'excerpts' => false, 
			'graphics' => false, 
		) );

		$instance['title']  = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = absint( $new_instance['number'] );
		$instance['excerpts'] = boolval( $new_instance['excerpts'] );
		$instance['graphics'] = boolval( $new_instance['graphics'] );
		
		return $instance;
	}

	/**
	 * Outputs the settings form for the Recent Comments widget.
	 *
	 * @since   0.0.1
	 * @param   array  $instance  Current settings.
	 * @return  void 
	 */
	public function form( $instance ) {

		$instance = wp_parse_args( $instance, array( 
			'title'     => '',
			'number'    => 5,
			'excerpts'  => false, 
			'graphics'  => false, 
		) ); ?>

		<p>

			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php 

				esc_html_e( 'Title:', 'wpmdc' ); 

			?></label>
			
			<input 
			type="text" 
			class="widefat" 
			id="<?php echo $this->get_field_id( 'title' ); ?>" 
			name="<?php echo $this->get_field_name( 'title' ); ?>" 
			value="<?php echo esc_attr( $instance['title'] ); ?>" />

		</p>

		<p>

			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php 

				esc_html_e( 'Number:', 'wpmdc' ); 

			?></label>
			
			<input 
			type="number" 
			step="1" 
			min="1" 
			size="3"
			class="tiny-text" 
			id="<?php echo $this->get_field_id( 'number' ); ?>" 
			name="<?php echo $this->get_field_name( 'number' ); ?>" 
			value="<?php echo esc_attr( $instance['number'] ); ?>" />

			<small><?php 

				esc_html_e( 'The maximum number of comments to show.', 'wpmdc' ); 

			?></small>

		</p>

		<p>

			<input 
			type="checkbox" 
			id="<?php echo $this->get_field_id( 'excerpts' ); ?>" 
			name="<?php echo $this->get_field_name( 'excerpts' ); ?>" 
			value="1"
			<?php checked( boolval( $instance['excerpts'] ) ); ?> />

			<label for="<?php echo $this->get_field_id( 'excerpts' ); ?>"><?php 

				esc_html_e( 'Display excerpts', 'wpmdc' ); 

			?></label>

			<br/>

			<input 
			type="checkbox" 
			id="<?php echo $this->get_field_id( 'graphics' ); ?>" 
			name="<?php echo $this->get_field_name( 'graphics' ); ?>" 
			value="1"
			<?php checked( boolval( $instance['graphics'] ) ); ?> />

			<label for="<?php echo $this->get_field_id( 'graphics' ); ?>"><?php 

				esc_html_e( 'Display graphics', 'wpmdc' ); 

			?></label>
		
		</p>
		
	<?php }

}