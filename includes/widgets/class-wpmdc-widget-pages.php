<?php
/**
 * The WP Widget Pages class.
 *
 * @package    wpmdc
 * @subpackage includes
 */

/**
 * WPMDC Widget Pages.
 * 
 * Core class used to implement a Pages widget.
 *
 * @since 0.0.1
 * @see   WP_Widget
 */
class WPMDC_Widget_Pages extends WP_Widget {

	/**
	 * Construct.
	 * 
	 * Sets up a new Pages widget instance.
	 *
	 * @since 0.0.1
	 */
	public function __construct() {

		$widget_ops = array(
			'classname'                   => 'wpmdc-widget--pages',
			'description'                 => __( 'A list of your site\'s Pages.', 'wpmdc' ),
			'customize_selective_refresh' => true,
		);

		parent::__construct( 'wpmdc_widget_pages', __( 'Pages', 'wpmdc' ), $widget_ops );
		$this->alt_option_name = 'wpmdc_widget_pages';
	}

	/**
	 * Widget.
	 * 
	 * Outputs the content for the current Pages widget instance.
	 *
	 * @since   0.0.1
	 * @param   array  $args      Display arguments including.
	 * @param   array  $instance  Settings for the current Pages widget instance.
	 * @return  void
	 */
	public function widget( $args, $instance ) {

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$instance = wp_parse_args( $instance, array(
			'title'    => '', 
			'sortby'   => '', 
			'exclude'  => '', 
			'excerpts' => false, 
			'graphics' => false, 
		) );

		$sortby = ! empty( $instance['sortby'] ) ? esc_attr( $instance['sortby'] ) : 'menu_order';

		if ( $sortby === 'date' ) {
			$sort_column = 'date, modified';
		} elseif ( $sortby === 'modified' ) {
			$sort_column = 'modified, date';
		} elseif ( $sortby === 'menu_order' ) {
			$sort_column = 'menu_order, post_title';
		} elseif ( $sortby === 'post_title' ) {
			$sort_column = 'post_title, date';
		} else {
			$sort_column = $sortby;
		}

		if ( ( $sortby === 'date' ) || ( $sortby === 'modified' ) || ( $sortby === 'comment_count' ) ) {
			$sort_order = 'desc';
		} else {
			$sort_order = 'asc';
		}

		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Pages', 'wpmdc' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$list_args = array(
			'echo'        => false,
			'title_li'    => '',
			'sort_order'  => $sort_order, 
			'sort_column' => $sort_column,
			'exclude'     => $instance['exclude'], 
			'walker'      => new WPMDC_Walker_Page( array(
				'display_descriptions' => $instance['excerpts'], 
				'display_graphics'     => $instance['graphics'], 
			) ), 
		);

		/**
		 * Filters the arguments for the Pages widget.
		 *
		 * @since   0.0.1
		 * @param   array  $args      An array of arguments to retrieve the pages list.
		 * @param   array  $instance  Array of settings for the current widget.
		 * @return  void 
		 */
		$list_args = apply_filters( 'wpmdc_widget_pages_list_args', $list_args, $instance );

		$output = wp_list_pages( $list_args );

		if ( ! empty( $output ) ) {

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

			<ul class="<?php echo esc_attr( implode( ' ', $list_classes ) ); ?>"><?php 

				echo $output; 

			?></ul>

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
			'title'    => '', 
			'sortby'   => '', 
			'exclude'  => '', 
			'excerpts' => false, 
			'graphics' => false, 
		) );

		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['sortby'] = esc_attr( $new_instance['sortby'] );
		$instance['exclude'] = esc_attr( $new_instance['exclude'] );
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
			'sortby'   => 'menu_order',
			'title'    => '',
			'exclude'  => '',
			'excerpts' => false, 
			'graphics' => false, 
		) ); ?>

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