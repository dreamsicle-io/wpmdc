<?php
/**
 * The WP Widget Pages class.
 *
 * @package    wpmdc
 * @subpackage includes
 */

/**
 * WPMDC Widget Posts.
 * 
 * Core class used to implement a Posts widget.
 *
 * @since  0.0.1
 * @see    WP_Widget
 */
class WPMDC_Widget_Posts extends WP_Widget {

	/**
	 * Construct.
	 * 
	 * Sets up a new Pages widget instance.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	public function __construct() {

		$widget_ops = array(
			'classname'                   => 'wpmdc-widget--posts',
			'description'                 => __( 'A list of your site\'s Posts.', 'wpmdc' ),
			'customize_selective_refresh' => true,
		);

		parent::__construct( 'wpmdc_widget_posts', __( 'Posts', 'wpmdc' ), $widget_ops );
		$this->alt_option_name = 'wpmdc_widget_posts';
	}

	public function get_item_icon( $post ) {
		switch ( $post->post_type ) {
			case 'page': 
				$icon = 'bookmark';
				break;
			default:
				$icon = 'library_books';
				break;
		}

		$icon = apply_filters( 'wpmdc_widget_posts_item_icon', $icon, $post );

		return $icon;
	}

	/**
	 * Widget.
	 * 
	 * Outputs the content for the current Pages widget instance.
	 *
	 * @since   0.0.1
	 * @param   array  $args      Display arguments.
	 * @param   array  $instance  Settings for the current Pages widget instance.
	 * @return  void 
	 */
	public function widget( $args, $instance ) {

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$instance = wp_parse_args( $instance, array(
			'title'     => '', 
			'post_type' => 'post',
			'sortby'    => 'menu_order', 
			'exclude'   => '', 
			'number'    => 5, 
			'excerpts'  => false, 
			'graphics'  => false, 
		) );

		$sortby = ! empty( $instance['sortby'] ) ? esc_attr( $instance['sortby'] ) : 'menu_order';

		if ( $sortby === 'comment_count' ) {
			$orderby = 'comment_count';
		} elseif ( $sortby === 'date' ) {
			$orderby = 'date modified';
		} elseif ( $sortby === 'modified' ) {
			$orderby = 'modified date';
		} elseif ( $sortby === 'menu_order' ) {
			$orderby = 'menu_order post_title';
		} elseif ( $sortby === 'post_title' ) {
			$orderby = 'post_title date';
		} else {
			$orderby = $sortby;
		}

		if ( ( $sortby === 'date' ) || ( $sortby === 'modified' ) || ( $sortby === 'comment_count' ) ) {
			$order = 'DESC';
		} else {
			$order = 'ASC';
		}

		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Posts', 'wpmdc' );

		/**
		 * Filters the widget title.
		 *
		 * @since  0.0.1
		 * @param  string  $title     The widget title. Default 'Pages'.
		 * @param  array   $instance  Array of settings for the current widget.
		 * @param  mixed   $id_base   The widget ID.
		 */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$excluded = explode( ',', intval( trim( $instance['exclude'] ) ) );

		$current = get_the_ID();

		if ( ! in_array( $current, $excluded ) ) {
			$excluded[] = $current;
		}

		$get_posts_args = array(
			'post__not_in'        => $excluded,
			'orderby'             => $orderby,
			'order'               => $order,
			'posts_per_page'      => ( $instance['number'] > 0 ) ? intval( $instance['number'] ) : 5,
			'post_type'           => esc_attr( $instance['post_type'] ),
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
		);

		/**
		 * Filters the arguments for the posts list.
		 *
		 * @since  0.0.1
		 * @param  array  $get_posts_args  An array of arguments to retrieve the pages list.
		 * @param  array  $instance        Array of settings for the current widget.
		 */
		$get_posts_args = apply_filters( 'wpmdc_widget_posts_get_posts_args', $get_posts_args, $instance );
		
		$posts = get_posts( $get_posts_args );

		if ( is_array( $posts ) && ! empty( $posts ) && ! is_wp_error( $posts ) ) {

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
				echo $args['before_title'] . $title . $args['after_title'];
			} ?>

			<div class="<?php echo esc_attr( implode( ' ', $list_classes ) ); ?>"><?php 

				foreach ( $posts as $post ) {

					if ( ! post_password_required( $post->ID ) ) {
						$excerpt = strip_tags( get_the_excerpt( $post->ID ) );
						// Fix the excerpt on customizer change. When the widget is 
						// updated in the customizer, the excerpt only shows when 
						// there is one explicitly set.
						$excerpt = ! empty( $excerpt ) ? $excerpt : apply_filters( 'the_excerpt', wp_trim_words( strip_tags( $post->post_content ) ) );
					} else {
						$excerpt = '';
					} ?>

					<a 
					href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" 
					title="<?php echo ! $instance['excerpts'] ? esc_attr( $excerpt ) : ''; ?>"
					class="mdc-list-item mdc-ripple-surface">

						<?php if ( $instance['graphics'] ) { ?>
							
							<span class="mdc-list-item__graphic">

								<i class="material-icons"><?php 

									echo esc_html( $this->get_item_icon( $post ) );

								?></i>

							</span>

						<?php } ?>
						
						<span class="mdc-list-item__text">
							
							<?php echo apply_filters( 'the_title', $post->post_title, $post->ID ); ?>
							
							<?php if ( $instance['excerpts'] ) { ?>
								
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
	 * Handles updating settings for the current Pages widget instance.
	 *
	 * @since   0.0.1
	 * @param   array  $new_instance  New settings for this instance as input by the user.
	 * @param   array  $old_instance  Old settings for this instance.
	 * @return  array                 Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;

		$new_instance = wp_parse_args( $new_instance, array(
			'title'     => '', 
			'post_type' => 'post',
			'sortby'    => '', 
			'exclude'   => '', 
			'number'    => 5, 
			'excerpts'  => false, 
			'graphics'  => false, 
		) );

		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['post_type'] = esc_attr( $new_instance['post_type'] );
		$instance['sortby'] = esc_attr( $new_instance['sortby'] );
		$instance['exclude'] = esc_attr( $new_instance['exclude'] );
		$instance['number'] = absint( $new_instance['number'] );
		$instance['excerpts'] = boolval( $new_instance['excerpts'] );
		$instance['graphics'] = boolval( $new_instance['graphics'] );

		return $instance;
	}

	/**
	 * Form.
	 * 
	 * Outputs the settings form for the Pages widget.
	 *
	 * @since   0.0.1
	 * @param   array  $instance  Current settings.
	 * @return  void 
	 */
	public function form( $instance ) {

		$instance = wp_parse_args( $instance, array( 
			'title'     => '',
			'post_type' => 'post',
			'sortby'    => 'menu_order',
			'exclude'   => '',
			'number'    => 5,
			'excerpts'  => false, 
			'graphics'  => false, 
		) ); 

		$post_types = get_post_types( array( 'public' => true ), 'objects' ); ?>

		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php 

				esc_html_e( 'Title:', 'wpmdc' ); 

			?></label>

			<input 
			type="text" 
			class="widefat" 
			id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
			value="<?php echo esc_attr( $instance['title'] ); ?>" />

		</p>

		<?php if ( is_array( $post_types ) && ! empty( $post_types ) && ! is_wp_error( $post_types ) ) { ?>

			<p>

				<label for="<?php echo esc_attr( $this->get_field_id( 'sortby' ) ); ?>"><?php 
					
					esc_html_e( 'Post type:', 'wpmdc' );

				?></label>

				<select 
				name="<?php echo esc_attr( $this->get_field_name( 'post_type' ) ); ?>" 
				id="<?php echo esc_attr( $this->get_field_id( 'post_type' ) ); ?>" 
				class="widefat">

					<?php foreach ( $post_types as $post_type ) {

						if ( $post_type->name !== 'attachment' ) { ?>
						
							<option 
							value="<?php echo esc_attr( $post_type->name ); ?>" 
							<?php selected( $instance['post_type'], $post_type->name ); ?>><?php 

								echo esc_html( $post_type->labels->name ); 

							?></option>
					
						<?php }

					} ?>

				</select>

			</p>

		<?php } ?>

		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php 

				esc_html_e( 'Number:', 'wpmdc' ); 

			?></label>

			<input 
			type="number" 
			min="1"
			step="1"  
			size="3"
			class="tiny-text" 
			id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" 
			value="<?php echo intval( $instance['number'] ); ?>" />

			<small><?php 

				esc_html_e( 'The maximum number of posts to show.', 'wpmdc' ); 

			?></small>

		</p>

		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'sortby' ) ); ?>"><?php 
				
				esc_html_e( 'Sort by:', 'wpmdc' );

			?></label>

			<select 
			name="<?php echo esc_attr( $this->get_field_name( 'sortby' ) ); ?>" 
			id="<?php echo esc_attr( $this->get_field_id( 'sortby' ) ); ?>" 
			class="widefat">
				<option value="menu_order" <?php selected( $instance['sortby'], 'menu_order' ); ?>><?php esc_html_e( 'Menu order', 'wpmdc' ); ?></option>
				<option value="post_title" <?php selected( $instance['sortby'], 'post_title' ); ?>><?php esc_html_e( 'Title', 'wpmdc' ); ?></option>
				<option value="date" <?php selected( $instance['sortby'], 'date' ); ?>><?php esc_html_e( 'Publish date', 'wpmdc' ); ?></option>
				<option value="modified" <?php selected( $instance['sortby'], 'modified' ); ?>><?php esc_html_e( 'Modified date', 'wpmdc' ); ?></option>
				<option value="comment_count" <?php selected( $instance['sortby'], 'comment_count' ); ?>><?php esc_html_e( 'Comment count', 'wpmdc' ); ?></option>
				<option value="ID" <?php selected( $instance['sortby'], 'ID' ); ?>><?php esc_html_e( 'ID', 'wpmdc' ); ?></option>
			</select>

		</p>

		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'exclude' ) ); ?>"><?php 

				esc_html_e( 'Exclude:', 'wpmdc' ); 

			?></label>

			<input 
			type="text" 
			value="<?php echo esc_attr( $instance['exclude'] ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'exclude' ) ); ?>" 
			id="<?php echo esc_attr( $this->get_field_id( 'exclude' ) ); ?>" 
			class="widefat" />

			<br />

			<small><?php 

				esc_html_e( 'Page IDs, separated by commas.', 'wpmdc' ); 

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