<?php
/**
 * WPMDC Theme Options Class.
 *
 * @package wpmdc
 * @subpackage includes
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Options.
 *
 * @since  0.0.1 
 */
class WPMDC_Options {

	public $icon_toggle_fields = array();

	/**
	 * Construct.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	function __construct() {

		$fields = array(
			array(
				'name'    => 'wpmdc_icon_toggle_user_field_test', 
				'id'      => 'wpmdc_icon_toggle_user_field_test', 
				'title'   => _x( 'Test Icon Toggle User Field', 'test icon toggle user field title', 'wpmdc' ), 
				'label'   => _x( 'Enable Option', 'test icon toggle user field label', 'wpmdc' ), 
			), 
		);

		$this->icon_toggle_fields = apply_filters( 'wpmdc_icon_toggle_user_fields', $fields );

	}

	/**
	 * Initialize.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	public function init() {

		add_action( 'show_user_profile', array( $this, 'manage_icon_toggle_user_fields' ), 10 );
		add_action( 'edit_user_profile', array( $this, 'manage_icon_toggle_user_fields' ), 10 );
		add_action( 'rest_pre_insert_user', array( $this, 'manage_icon_toggle_user_fields_rest' ), 10, 2 );

	}

	public function manage_icon_toggle_user_fields_rest( $user, $request ) {

		if ( is_array( $this->icon_toggle_fields ) && ! empty( $this->icon_toggle_fields ) ) {

			foreach ( $this->icon_toggle_fields as $field ) {

				$field = wp_parse_args( $field, array(
	    			'name' => '', 
	    		) );

				$user[$field['name']] = boolval( $request[$field['name']] );

			}
		}

		return $user;

	}

	/**
	 * Manage Icon Toggle User Fields.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	public function manage_icon_toggle_user_fields( $user ) {

		if ( is_array( $this->icon_toggle_fields ) && ! empty( $this->icon_toggle_fields ) ) { ?>
	    
		    <h3><?php 

		    	esc_html_e( 'WPMDC Icon Toggle User Fields' ); 

		    ?></h3>

		    <p class="description"><?php 

		    	esc_html_e( 'These settings were rendered for use as admin counterparts for WPMDC Icon Toggle components.', 'wpmdc' );

		    ?></p>

		    <table class="form-table">

		    	<?php 
		    	foreach ( $this->icon_toggle_fields as $field ) {

		    		$field = wp_parse_args( $field, array(
		    			'name'        => '', 
		    			'id'          => uniqid( 'wpmdc_icon_toggle_user_field_' ), 
		    			'label'       => '', 
		    			'value'       => '1', 
		    			'description' => '', 
		    		) );

		    		if ( ! empty( $field['name'] ) ) { ?>

					    <tr>

					        <th>

					        	<span><?php 

					        		echo esc_html( $field['title'] );

					        	?></span>

					        </th>

					        <td>

					        	<label>

						            <input 
						            type="checkbox" 
						            name="<?php echo esc_attr( $field['name'] ); ?>" 
						            id="<?php echo esc_attr( $field['id'] ); ?>" 
						            value="<?php echo esc_attr( $field['value'] ); ?>"
						            <?php checked( boolval( get_the_author_meta( $field['name'], $user->ID ) ) ); ?> />

						            <span><?php 

						            	echo esc_html( $field['label'] );

						            ?></span>

						        </label>

						        <?php if ( ! empty( $field['description'] ) ) { ?>

						            <br />

						            <span class="description"><?php 

						            	echo wp_kses_post( $field['description'] ); 

						            ?></span>

						        <?php } ?>
					        
					        </td>

					    </tr>

					<?php }

				} ?>

		    </table>

		<?php }

	}

}
