<?php
/**
 * The WPMDC Nav Menu Widget Class.
 *
 * @package     wpmdc
 * @subpackage  includes
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Widget Nav Menu.
 *
 * @since  0.0.1
 * @since  WP 3.0.0
 * @since  WP 4.4.0           Parent changed.
 * @see    WP_Nav_Menu_Widget This class extends the WP_Nav_Menu_widget class.
 */
class WPMDC_Widget_Nav_Menu extends WP_Nav_Menu_Widget {

	/**
	 * Update.
	 * 
	 * Handles updating settings for the current Navigation 
	 * Menu widget instance.
	 *
	 * @since   0.0.1
	 * @since   WP 3.0.0
	 * @param   array     $new_instance  New settings for this instance as input by the user.
	 * @param   array     $old_instance  Old settings for this instance.
	 * @return  array                    Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = parent::update( $new_instance, $old_instance );

		$new_instance = wp_parse_args( $new_instance, array(
			'wpmdc_menu_widget_descriptions' => false, 
			'wpmdc_menu_widget_graphics'     => false, 
		) );

		$instance['wpmdc_menu_widget_descriptions'] = boolval( $new_instance['wpmdc_menu_widget_descriptions'] );
		$instance['wpmdc_menu_widget_graphics'] = boolval( $new_instance['wpmdc_menu_widget_graphics'] );

		return $instance;
	}

	/**
	 * Form. 
	 * 
	 * Outputs the settings form for the Navigation Menu widget.
	 *
	 * @since  0.0.1
	 * @since  WP 3.0.0
	 * @param  array     Current settings.
	 */
	public function form( $instance ) {
		
		parent::form( $instance );

		$instance = wp_parse_args( $instance, array( 
			'wpmdc_menu_widget_descriptions' => false, 
			'wpmdc_menu_widget_graphics'     => false, 
		) ); ?>

		<div class="wpmdc-widget-form-controls" <?php echo empty( wp_get_nav_menus() ) ? 'style="display:none;"' : ''; ?>>
			
			<p>

				<input 
				type="checkbox" 
				id="<?php echo $this->get_field_id( 'wpmdc_menu_widget_descriptions' ); ?>" 
				name="<?php echo $this->get_field_name( 'wpmdc_menu_widget_descriptions' ); ?>" 
				value="1"
				<?php checked( boolval( $instance['wpmdc_menu_widget_descriptions'] ) ); ?> />

				<label for="<?php echo $this->get_field_id( 'wpmdc_menu_widget_descriptions' ); ?>"><?php 

					esc_html_e( 'Display descriptions', 'wpmdc' ); 

				?></label>

				<br/>

				<input 
				type="checkbox" 
				id="<?php echo $this->get_field_id( 'wpmdc_menu_widget_graphics' ); ?>" 
				name="<?php echo $this->get_field_name( 'wpmdc_menu_widget_graphics' ); ?>" 
				value="1"
				<?php checked( boolval( $instance['wpmdc_menu_widget_graphics'] ) ); ?> />

				<label for="<?php echo $this->get_field_id( 'wpmdc_menu_widget_graphics' ); ?>"><?php 

					esc_html_e( 'Display graphics', 'wpmdc' ); 

				?></label>
			
			</p>

		</div>
		
	<?php }
}