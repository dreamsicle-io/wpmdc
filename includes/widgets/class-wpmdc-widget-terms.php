<?php
/**
 * The WPMDC Widget Terms class.
 *
 * @package     wpmdc
 * @subpackage  includes
 */

/**
 * WPMDC Widget Terms.
 * 
 * Core class used to implement a Categories widget.
 *
 * @since  0.0.1
 * @see    WP_Widget
 */
class WPMDC_Widget_Terms extends WP_Widget {

	/**
	 * Sets up a new Categories widget instance.
	 *
	 * @since  0.0.1
	 */
	public function __construct() {
		
		$widget_ops = array(
			'classname'                   => 'wpmdc-widget--terms',
			'description'                 => __( 'A list or dropdown of your sit\'s taxonomy terms.', 'wpmdc' ),
			'customize_selective_refresh' => true,
		);

		parent::__construct( 'wpmdc_widget_terms', _x( 'Terms', 'wpmdc' ), $widget_ops );
		
		$this->alt_option_name = 'wpmdc_widget_terms';
	
	}

	/**
	 * Outputs the content for the current Categories widget instance.
	 *
	 * @since  0.0.1
	 * @param  array  $args      Display arguments.
	 * @param  array  $instance  Settings for the current Categories widget instance.
	 * @param  void
	 */
	public function widget( $args, $instance ) {
		
		$instance = wp_parse_args( $instance, array(
			'title'        => '', 
			'count'        => false, 
			'hierarchical' => false, 
			'dropdown'     => false, 
			'descriptions' => false, 
			'graphics'     => false, 
		) );

		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Terms', 'wpmdc' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$cat_args = array(
			'orderby'      => 'name',
			'show_count'   => $instance['count'],
			'hierarchical' => $instance['hierarchical'],
		);

		echo $args['before_widget'];

		if ( $instance['dropdown'] ) {
			
			$form_id = $this->id_base . '-dropdown-' . $this->number;

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
					wp_dropdown_categories( apply_filters( 'wpmdc_widget_terms_dropdown_args', $dropdown_args, $instance ) ); ?>

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
				'use_desc_for_title' => ! boolval( $instance['descriptions'] ),
				'walker'             => new WPMDC_Walker_Category( array(
					'display_descriptions' => boolval( $instance['descriptions'] ),
					'display_graphics'     => boolval( $instance['graphics'] ),
				) ),
			) );

			$list_classes = array(
				'wpmdc-list', 
				'mdc-list', 
			);

			if ( $instance['descriptions'] ) {
				$list_classes[] = 'mdc-list--two-line';
			}

			if ( $instance['graphics'] ) {
				$list_classes[] = 'mdc-list--avatar-list';
			} 

			if ( $title ) {
				echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
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
				wp_list_categories( apply_filters( 'wpmdc_widget_terms_list_args', $list_args, $instance ) );
	
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

		$new_instance = wp_parse_args( $new_instance, array(
			'title'        => '', 
			'count'        => false, 
			'hierarchical' => false, 
			'dropdown'     => false, 
			'descriptions' => false, 
			'graphics'     => false, 
		) );

		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['count'] = boolval( $new_instance['count'] );
		$instance['hierarchical'] = boolval( $new_instance['hierarchical'] );
		$instance['dropdown'] = boolval( $new_instance['dropdown'] );
		$instance['descriptions'] = boolval( $new_instance['descriptions'] );
		$instance['graphics'] = boolval( $new_instance['graphics'] );

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

		$instance = wp_parse_args( $instance, array( 
			'title'        => '', 
			'count'        => false, 
			'hierarchical' => false, 
			'dropdown'     => false, 
			'descriptions' => false, 
			'graphics'     => false, 
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

			<input 
			type="checkbox" 
			class="checkbox" 
			id="<?php echo $this->get_field_id( 'dropdown' ); ?>" 
			name="<?php echo $this->get_field_name( 'dropdown' ); ?>" 
			<?php checked( boolval( $instance['dropdown'] ) ); ?> />

			<label for="<?php echo $this->get_field_id( 'dropdown' ); ?>"><?php 

				esc_html_e( 'Display as dropdown', 'wpmdc' ); 

			?></label>

			<br />

			<input 
			type="checkbox" 
			class="checkbox" 
			id="<?php echo $this->get_field_id( 'count' ); ?>" 
			name="<?php echo $this->get_field_name( 'count' ); ?>" 
			<?php checked( boolval( $instance['count'] ) ); ?> />

			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php 

				esc_html_e( 'Show post counts', 'wpmdc' ); 

			?></label>

			<br />

			<input 
			type="checkbox" 
			class="checkbox" 
			id="<?php echo $this->get_field_id( 'hierarchical' ); ?>" 
			name="<?php echo $this->get_field_name( 'hierarchical' ); ?>" 
			<?php checked( boolval( $instance['hierarchical'] ) ); ?> />

			<label for="<?php echo $this->get_field_id( 'hierarchical' ); ?>"><?php 

				esc_html_e( 'Show hierarchy', 'wpmdc' ); 

			?></label>

		</p>
			
		<p>

			<input 
			type="checkbox" 
			class="checkbox" 
			id="<?php echo $this->get_field_id( 'descriptions' ); ?>" 
			name="<?php echo $this->get_field_name( 'descriptions' ); ?>" 
			value="1"
			<?php checked( boolval( $instance['descriptions'] ) ); ?> />

			<label for="<?php echo $this->get_field_id( 'descriptions' ); ?>"><?php 

				esc_html_e( 'Display descriptions', 'wpmdc' ); 

			?></label>

			<br/>

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