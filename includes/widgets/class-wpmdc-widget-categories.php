<?php
/**
 * The WPMDC Widget Categories class.
 *
 * @package     wpmdc
 * @subpackage  includes
 */

/**
 * Core class used to implement a Categories widget.
 *
 * @since  0.0.1
 * @since  WP 2.8.0
 * @see    WP_Widget_Categories
 */
class WPMDC_Widget_Categories extends WP_Widget_Categories {

	/**
	 * Outputs the content for the current Categories widget instance.
	 *
	 * @since      WP 2.8.0
	 * @param      array     $args            Display arguments.
	 * @param      array     $instance        Settings for the current Categories widget instance.
	 * @param      void
	 */
	public function widget( $args, $instance ) {
		
		$instance = wp_parse_args( $instance, array(
			'title'                     => '', 
			'count'                     => false, 
			'hierarchical'              => false, 
			'dropdown'                  => false, 
			'wpmdc_widget_descriptions' => false, 
			'wpmdc_widget_graphics'     => false, 
		) );

		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Categories' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo $args['before_widget'];

		$cat_args = array(
			'orderby'      => 'name',
			'show_count'   => $instance['count'],
			'hierarchical' => $instance['hierarchical'],
		);

		if ( $instance['dropdown'] ) {
			
			$form_id = "{$this->id_base}-dropdown-{$this->number}";

			$dropdown_args = array_merge( $cat_args, array(
				'class'             => 'mdc-select__native-control', 
				'show_option_none'  => true, 
				'option_none_value' => '', 
			) ); ?>

			<form id="<?php echo esc_attr( $form_id ); ?>" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="GET">

				<div class="wpmdc-select mdc-select mdc-select--box">
				
					<?php 
					/**
					 * Filters the arguments for the Categories widget drop-down.
					 *
					 * @since  0.0.1
					 * @since  WP 2.8.0
					 * @since  WP 4.9.0             Added the `$instance` parameter.
					 * @param  array     $cat_args  An array of Categories widget drop-down arguments.
					 * @param  array     $instance  Array of settings for the current widget.
					 */
					wp_dropdown_categories( apply_filters( 'widget_categories_dropdown_args', $dropdown_args, $instance ) ); ?>

					<label class="mdc-floating-label"><?php 

						echo esc_attr( $title ); 

					?></label>

					<div class="mdc-line-ripple"></div>

				</div>

			</form>

			<?php 
			$this->print_form_scripts( $form_id );

		} else {

			$list_args = array_merge( $cat_args, array(
				'title_li'           => '',
				'use_desc_for_title' => ! $instance['wpmdc_widget_descriptions'],
				'walker'             => new WPMDC_Walker_Category( array(
					'display_descriptions' => $instance['wpmdc_widget_descriptions'],
					'display_graphics'     => $instance['wpmdc_widget_graphics'],
				) ),
			) );

			$list_classes = array(
				'wpmdc-list', 
				'mdc-list', 
			);

			if ( $instance['wpmdc_widget_descriptions'] ) {
				$list_classes[] = 'mdc-list--two-line';
			}

			if ( $instance['wpmdc_widget_graphics'] ) {
				$list_classes[] = 'mdc-list--avatar-list';
			} 

			if ( $title ) {
				echo $args['before_title'] . $title . $args['after_title'];
			} ?>

			<ul class="<?php echo esc_attr( implode( ' ', $list_classes ) ); ?>"><?php

				/**
				 * Filters the arguments for the Categories widget.
				 *
				 * @since  0.0.1
				 * @since  WP 2.8.0
				 * @since  WP 4.9.0             Added the `$instance` parameter.
				 * @param  array     $cat_args  An array of Categories widget options.
				 * @param  array     $instance  Array of settings for the current widget.
				 */
				wp_list_categories( apply_filters( 'widget_categories_args', $list_args, $instance ) );
	
			?></ul>

		<?php }

		echo $args['after_widget'];

	}

	public function print_form_scripts( $form_id ) { ?>

		<script type="text/javascript">
			/* <![CDATA[ */
			(function() {
				var form = document.getElementById( "<?php echo esc_js( $form_id ); ?>" );
				var dropdown = form.querySelector('select');
				<?php if ( is_customize_preview() ) { ?>
					dropdown.setAttribute('disabled', true);
				<?php } ?>
				var optionNone = dropdown.querySelector('option[value=""]');
				if (optionNone) {
					optionNone.setAttribute('disabled', true);
					optionNone.innerHTML = '';
				}
				function onCatChange() {
					if ( dropdown.options[ dropdown.selectedIndex ].value > 0 ) {
						form.submit();
					}
				}
				dropdown.onchange = onCatChange;
			})();
			/* ]]> */
		</script>

	<?php } 

	/**
	 * Handles updating settings for the current Categories widget instance.
	 *
	 * @since   0.0.1
	 * @since   WP 2.8.0
	 * @param   array     $new_instance  New settings for this instance as input by the user.
	 * @param   array     $old_instance  Old settings for this instance.
	 * @return  array                    Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		
		$instance = parent::update( $new_instance, $old_instance );

		$new_instance = wp_parse_args( $new_instance, array(
			'wpmdc_widget_descriptions' => false, 
			'wpmdc_widget_graphics'     => false, 
		) );

		$instance['wpmdc_widget_descriptions'] = boolval( $new_instance['wpmdc_widget_descriptions'] );
		$instance['wpmdc_widget_graphics'] = boolval( $new_instance['wpmdc_widget_graphics'] );

		return $instance;
	}

	/**
	 * Outputs the settings form for the Categories widget.
	 *
	 * @since  0.0.1
	 * @since  WP 2.8.0
	 * @param  array     $instance  Current settings.
	 */
	public function form( $instance ) {

		parent::form( $instance );

		$instance = wp_parse_args( $instance, array( 
			'wpmdc_widget_descriptions' => false, 
			'wpmdc_widget_graphics'     => false, 
		) ); ?>

		<div class="wpmdc-widget-form-controls">
			
			<p>

				<input 
				type="checkbox" 
				id="<?php echo $this->get_field_id( 'wpmdc_widget_descriptions' ); ?>" 
				name="<?php echo $this->get_field_name( 'wpmdc_widget_descriptions' ); ?>" 
				value="1"
				<?php checked( boolval( $instance['wpmdc_widget_descriptions'] ) ); ?> />

				<label for="<?php echo $this->get_field_id( 'wpmdc_widget_descriptions' ); ?>"><?php 

					esc_html_e( 'Display descriptions', 'wpmdc' ); 

				?></label>

				<br/>

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