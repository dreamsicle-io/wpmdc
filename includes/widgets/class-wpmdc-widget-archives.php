<?php
/**
 * The WPMDC Widet Archives class.
 *
 * @package     wpmdc
 * @subpackage  includes
 * 
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Widet Archives.
 * 
 * Core class used to implement the Archives widget.
 *
 * @since  0.0.1
 * @since  WP 2.8.0
 * @since  WP 4.4.0            Parent class changed.
 * @see    WP_Widget_Archives
 */
class WPMDC_Widget_Archives extends WP_Widget {

	/**
	 * Construct. 
	 * 
	 * Sets up a new Archives widget instance.
	 *
	 * @since 0.0.1
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'wpmdc-widget--archives',
			'description'                 => __( 'A monthly archive of your site&#8217;s Posts.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'wpmdc_widget_archives', __( 'Archives', 'wpmdc' ), $widget_ops );
		$this->alt_option_name = 'wpmdc_widget_archives';
	}

	/**
	 * Widget.
	 * 
	 * Outputs the content for the current Archives widget instance.
	 *
	 * @since   0.0.1
	 * @param   array     $args      Widget display arguments.
	 * @param   array     $instance  Settings for the current widget instance.
	 * @return  void
	 */
	public function widget( $args, $instance ) {

		$instance = wp_parse_args( $instance, array(
			'title'    => '', 
			'dropdown' => false, 
			'count'    => false, 
			'graphics' => false, 
		) );

		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Archives', 'wpmdc' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo $args['before_widget'];

		if ( $instance['dropdown'] ) {

			$dropdown_id = $this->id_base . '-dropdown-' . $this->number;

			$dropdown_args = array(
				'type'            => 'monthly',
				'format'          => 'option',
				'show_post_count' => $instance['count'],
			);

			/**
			 * Filters the arguments for the Archives widget drop-down.
			 *
			 * @since 0.0.1
			 * @since WP 2.8.0
			 * @since WP 4.9.0 Added the `$instance` parameter.
			 *
			 * @see wp_get_archives()
			 *
			 * @param array $args     An array of Archives widget drop-down arguments.
			 * @param array $instance Settings for the current Archives widget instance.
			 */
			$dropdown_args = apply_filters( 'wpmdc_widget_archives_dropdown_args', $dropdown_args, $instance );

			switch ( $dropdown_args['type'] ) {
				case 'yearly':
					$default_option = __( 'Select Year', 'wpmdc' );
					break;
				case 'monthly':
					$default_option = __( 'Select Month', 'wpmdc' );
					break;
				case 'daily':
					$default_option = __( 'Select Day', 'wpmdc' );
					break;
				case 'weekly':
					$default_option = __( 'Select Week', 'wpmdc' );
					break;
				default:
					$default_option = __( 'Select Post', 'wpmdc' );
					break;
			} ?>

			<div class="wpmdc-select mdc-select mdc-select--box">

				<select 
				id="<?php echo esc_attr( $dropdown_id ); ?>" 
				name="archive-dropdown" 
				class="mdc-select__native-control"
				onchange="document.location.href=this.options[this.selectedIndex].value;"
				<?php echo is_customize_preview() ? 'disabled' : ''; ?>>

					<option value="" disabled selected></option>
					<?php wp_get_archives( $dropdown_args ); ?>

				</select>

				<label class="mdc-floating-label"><?php 

					echo esc_attr( $title ); 

				?></label>

			  	<div class="mdc-line-ripple"></div>

			</div>

		<?php } else { 

			$list_classes = array(
				'wpmdc-list', 
				'mdc-list', 
			);

			if ( $instance['graphics'] ) {
				$list_classes[] = 'mdc-list--avatar-list';
			}

			$list_args = array(
				'type'            => 'monthly',
				'format'          => 'custom', 
				'before'          => $instance['graphics'] ? 'today' : '', 
				'show_post_count' => $instance['count'],
			);

			/**
			 * Filters the arguments for the Archives widget.
			 *
			 * @since  0.0.1
			 * @since  WP 2.8.0
			 * @since  WP 4.9.0             Added the `$instance` parameter.
			 * @param  array     $args      An array of Archives option arguments.
			 * @param  array     $instance  Array of settings for the current widget.
			 */
			$list_args = apply_filters( 'wpmdc_widget_archives_list_args', $list_args, $instance ); 

			if ( ! empty( $title ) ) {

				echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
			
			} ?>

			<ul class="<?php echo esc_attr( implode( ' ', $list_classes ) ); ?>"><?php
				
				wp_get_archives( $list_args );

			?></ul>

		<?php }

		echo $args['after_widget'];

	}

	/**
	 * Handles updating settings for the current Archives widget instance.
	 *
	 * @since   0.0.1
	 * @since   WP 2.8.0
	 * @param   array     $new_instance  New settings for this instance as input by the user via WP_Widget_Archives::form().
	 * @param   array     $old_instance  Old settings for this instance.
	 * @return  array                      Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		
		$instance = parent::update( $new_instance, $old_instance );

		$new_instance = wp_parse_args( $new_instance, array(
			'title'    => '', 
			'count'    => false, 
			'dropdown' => false, 
			'graphics' => false, 
		) );

		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['count'] = boolval( $new_instance['count'] );
		$instance['dropdown'] = boolval( $new_instance['dropdown'] );
		$instance['graphics'] = boolval( $new_instance['graphics'] );

		return $instance;

	}

	/**
	 * Outputs the settings form for the Archives widget.
	 *
	 * @since   0.0.1
	 * @param   array     $instance  Current settings.
	 * @return  void
	 */
	public function form( $instance ) {
		
		parent::form( $instance );

		$instance = wp_parse_args( $instance, array( 
			'title'    => '', 
			'count'    => false, 
			'dropdown' => false, 
			'graphics' => false, 
		) ); ?>

		<p>

			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php 

				esc_html_e( 'Title:', 'wpmdc' ); 

			?></label>

			<input 
			class="widefat" 
			id="<?php echo $this->get_field_id( 'title' ); ?>" 
			name="<?php echo $this->get_field_name( 'title' ); ?>" 
			type="text" 
			value="<?php echo esc_attr( $title ); ?>" />

		</p>
		
		<p>

			<input  
			type="checkbox"
			class="checkbox"
			id="<?php echo $this->get_field_id( 'dropdown' ); ?>" 
			name="<?php echo $this->get_field_name( 'dropdown' ); ?>"
			<?php checked( boolval( $instance['dropdown'] ) ); ?>  />

			<label for="<?php echo $this->get_field_id( 'dropdown' ); ?>"><?php 

				esc_html_e( 'Display as dropdown', 'wpmdc' ); 

			?></label>

			<br/>

			<input 
			type="checkbox"
			class="checkbox" 
			id="<?php echo $this->get_field_id( 'count' ); ?>" 
			name="<?php echo $this->get_field_name( 'count' ); ?>"
			<?php checked( boolval( $instance['count'] ) ); ?>  />

			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php 

				esc_html_e( 'Show post counts' ); 

			?></label>

		</p>
			
		<p>

			<input 
			type="checkbox" 
			class="checkbox" 
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