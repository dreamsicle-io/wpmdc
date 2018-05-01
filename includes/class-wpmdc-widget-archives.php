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
 * @since  WP 0.0.1
 * @since  WP 2.8.0
 * @since  WP 4.4.0            Parent class changed.
 * @see    WP_Widget_Archives
 */
class WPMDC_Widget_Archives extends WP_Widget_Archives {

	/**
	 * Outputs the content for the current Archives widget instance.
	 *
	 * @since   WP 0.0.1
	 * @since   WP 2.8.0
	 * @param   array     $args      Widget display arguments.
	 * @param   array     $instance  Settings for the current widget instance.
	 * @return  void
	 */
	public function widget( $args, $instance ) {

		$instance = wp_parse_args( $instance, array(
			'title'                     => '', 
			'dropdown'                  => false, 
			'count'                     => false, 
			'wpmdc_widget_graphics'     => false, 
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
			 * @since 2.8.0
			 * @since 4.9.0 Added the `$instance` parameter.
			 *
			 * @see wp_get_archives()
			 *
			 * @param array $args     An array of Archives widget drop-down arguments.
			 * @param array $instance Settings for the current Archives widget instance.
			 */
			$dropdown_args = apply_filters( 'widget_archives_dropdown_args', $dropdown_args, $instance );

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

			if ( $instance['wpmdc_widget_graphics'] ) {
				$list_classes[] = 'mdc-list--avatar-list';
			}

			$list_args = array(
				'type'            => 'monthly',
				'format'          => 'custom', 
				'before'          => $instance['wpmdc_widget_graphics'] ? 'today' : '', 
				'show_post_count' => $instance['count'],
			);

			/**
			 * Filters the arguments for the Archives widget.
			 *
			 * @since  WP 2.8.0
			 * @since  WP 4.9.0             Added the `$instance` parameter.
			 * @param  array     $args      An array of Archives option arguments.
			 * @param  array     $instance  Array of settings for the current widget.
			 */
			$list_args = apply_filters( 'widget_archives_args', $list_args, $instance ); 

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
	 * @since   WP 2.8.0
	 * @param   array     $new_instance  New settings for this instance as input by the user via WP_Widget_Archives::form().
	 * @param   array     $old_instance  Old settings for this instance.
	 * @return  array                      Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		
		$instance = parent::update( $new_instance, $old_instance );

		$new_instance = wp_parse_args( $new_instance, array(
			'wpmdc_widget_graphics'     => false, 
		) );

		$instance['wpmdc_widget_graphics'] = boolval( $new_instance['wpmdc_widget_graphics'] );

		return $instance;

	}

	/**
	 * Outputs the settings form for the Archives widget.
	 *
	 * @since   WP 2.8.0
	 * @param   array     $instance  Current settings.
	 * @return  void
	 */
	public function form( $instance ) {
		
		parent::form( $instance );

		$instance = wp_parse_args( $instance, array( 
			'wpmdc_widget_graphics'     => false, 
		) ); ?>

		<div class="wpmdc-widget-form-controls">
			
			<p>

				<input 
				type="checkbox" 
				id="<?php echo $this->get_field_id( 'wpmdc_widget_graphics' ); ?>" 
				name="<?php echo $this->get_field_name( 'wpmdc_widget_graphics' ); ?>" 
				value="1"
				<?php checked( boolval( $instance['wpmdc_widget_graphics'] ) ); ?> />

				<label for="<?php echo $this->get_field_id( 'wpmdc_widget_graphics' ); ?>"><?php 

					esc_html_e( 'Display graphics', 'wpmdc' ); 

				?></label>
			
			</p>

		</div>
		
	<?php }

}