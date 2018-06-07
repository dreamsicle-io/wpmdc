<?php 
/**
 * The WPMDC Comments Class.
 *
 * @package    wpmdc
 * @subpackage includes
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Comments.
 *
 * @since  0.0.1 
 */
class WPMDC_Comments {

	/**
	 * Construct.
	 *
	 * @since   0.0.1
	 * @return  void
	 */
	function __construct() {

	}

	/**
	 * Initialize.
	 *
	 * @since   0.0.1
	 * @return  void
	 */
	public function init() {

		add_filter( 'comment_form_fields', array( $this, 'manage_comment_form_fields' ), 10 );
		add_filter( 'comment_form_submit_button', array( $this, 'manage_comment_form_submit' ), 10, 2 );

	}

	public function manage_comment_form_fields( $fields ) {

		if ( get_theme_support( 'html5', 'comment-form' ) ) {

			$require_name_email = boolval( get_option( 'require_name_email' ) );
		    $commenter = wp_get_current_commenter();
			$commenter = wp_parse_args( $commenter, array( 
				'comment_author'       => '', 
				'comment_author_email' => '', 
				'comment_author_url'   => '', 
			) );
			$cookie_consent  = ! empty( $commenter['comment_author_email'] );

		    $fields['author'] = wpmdc_get_component( new WPMDC_Text_Field( array( 
		    	'mod'         => 'fullwidth', 
		    	'type'        => 'text', 
		    	'name'        => 'author', 
		    	'id'          => 'comment_author', 
		    	'value'       => $commenter['comment_author'], 
		    	'label'       => _x( 'Name', 'comment author field label', 'wpmdc' ), 
		    	'helper_text' => _x( 'A name is required.', 'comment author field helper text', 'wpmdc' ), 
		    	'required'    => $require_name_email, 
		    	'icon'        => 'account_circle', 
		    ) ) );

			$fields['email'] = wpmdc_get_component( new WPMDC_Text_Field( array( 
				'mod'         => 'fullwidth', 
		    	'type'        => 'email', 
		    	'name'        => 'email', 
		    	'id'          => 'comment_email', 
		    	'value'       => $commenter['comment_author_email'], 
		    	'label'       => _x( 'Email', 'comment email field label', 'wpmdc' ), 
		    	'helper_text' => _x( 'A valid email address is required. This will never be published.', 'comment email field helper text', 'wpmdc' ), 
		    	'required'    => $require_name_email, 
		    	'icon'        => 'email', 
		    ) ) );

			$fields['url'] = wpmdc_get_component( new WPMDC_Text_Field( array( 
				'mod'         => 'fullwidth', 
		    	'type'        => 'url', 
		    	'name'        => 'url', 
		    	'id'          => 'comment_url', 
		    	'value'       => $commenter['comment_author_url'], 
		    	'label'       => _x( 'Website / Profile', 'comment url field label', 'wpmdc' ), 
		    	'helper_text' => _x( 'Enter an optional website or social profile url. This will be published.', 'comment url field helper text', 'wpmdc' ), 
		    	'icon'        => 'public'
		    ) ) );

			$fields['comment'] = wpmdc_get_component( new WPMDC_Text_Field( array( 
				'mod'         => 'fullwidth', 
		    	'type'        => 'textarea', 
		    	'name'        => 'comment', 
		    	'id'          => 'comment', 
		    	'value'       => '', 
		    	'required'    => true, 
		    	'label'       => _x( 'Comment', 'comment field label', 'wpmdc' ), 
		    	'helper_text' => _x( 'Enter a comment and join the conversation. This will be published.', 'comment field helper text', 'wpmdc' ), 
		    ) ) );

		    $fields['cookies'] = wpmdc_get_component( new WPMDC_Switch( array( 
		    	'name'    => 'wp-comment-cookies-consent', 
		    	'id'      => 'wp-comment-cookies-consent', 
		    	'value'   => 'yes', 
		    	'checked' => $cookie_consent, 
		    	'label'   => _x( 'Save my name, email, and website in this browser for the next time I comment.', 'comment cookies field label', 'wpmdc' ), 
		    ) ) );

		}

		return $fields;
	}

	public function manage_comment_form_submit( $submit, $args ) {

		if ( get_theme_support( 'html5', 'comment-form' ) ) {

			$args = wp_parse_args( $args, array( 
				'id_submit'    => '', 
				'name_submit'  => '', 
				'label_submit' => '', 
			) );

		    $submit = wpmdc_get_component( new WPMDC_Button( array( 
		    	'mod'  => 'raised', 
		    	'type' => 'submit', 
		    	'id'   => $args['id_submit'], 
		    	'name' => $args['name_submit'], 
		    	'text' => $args['label_submit'], 
		    	'icon' => 'send', 
		    ) ) );

		}

		return $submit;
	}

}
