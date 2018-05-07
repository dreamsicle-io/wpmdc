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

	}

	public function manage_comment_form_fields( $fields ) {

		if ( get_theme_support( 'html5', 'comment-form' ) ) {

			$req = boolval( get_option( 'require_name_email' ) );
		    $commenter = wp_get_current_commenter();
			$commenter = wp_parse_args( $commenter, array( 
				'comment_author'       => '', 
				'comment_author_email' => '', 
				'comment_author_url'   => '', 
			) );

		    $fields['author'] = wpmdc_get_component( new WPMDC_Text_Field( array( 
		    	'mod'         => 'fullwidth', 
		    	'type'        => 'text', 
		    	'name'        => 'author', 
		    	'id'          => 'comment_author', 
		    	'value'       => $commenter['comment_author'], 
		    	'label'       => _x( 'Name', 'comment author field label', 'wpmdc' ), 
		    	'helper_text' => _x( 'A name is required.', 'comment author field helper text', 'wpmdc' ), 
		    	'required'    => $req, 
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
		    	'required'    => $req, 
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

			$fields['comment_field'] = '';

		}

		return $fields;
	}

}
