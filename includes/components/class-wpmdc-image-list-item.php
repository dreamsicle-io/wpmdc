<?php
/**
 * WPMDC Image List Item Class.
 *
 * @package    wpmdc
 * @subpackage includes/components/templates
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Image List Item.
 *
 * @since  0.0.1 
 */
class WPMDC_Image_List_Item extends WPMDC_Component {

	/**
	 * Construct.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	function __construct( $args = array() ) {

		$uniqid = $this->get_uniqid();

		$this->arg_types = array(
			'id'     => 'string', 
			'image'  => 'string', 
			'label'  => 'string', 
			'href'   => 'string', 
			'target' => 'string', 
			'rel'    => 'string', 
			'aspect' => array( '', 'square', '3-2' ), 
		);

		$this->default_args = array(
			'id'     => $uniqid, 
			'image'  => get_stylesheet_directory_uri() . '/screenshot.png', 
			'label'  => '', 
			'href'   => '', 
			'target' => '', 
			'rel'    => '', 
			'aspect' => '', 
		);

		parent::__construct( $args );

	}

	public function render_image() {

		if ( ! empty( $this->args['aspect'] ) ) { ?>

			<div class="mdc-image-list__image-aspect-container"><?php 

				if ( ! empty( $this->args['image'] ) ) { ?>

					<div 
					class="mdc-image-list__image" 
					style="background-image:url('<?php echo esc_url( $this->args['image'] ); ?>');"></div>

				<?php } 

			?></div>

		<?php } elseif ( ! empty( $this->args['image'] ) ) { ?>

			<img 
			class="mdc-image-list__image" 
			src="<?php echo esc_url( $this->args['image'] ); ?>" />

		<?php }
	
	}

	public function render_internal_elements() {

		$this->render_image();

		if ( ! empty( $this->args['label'] ) ) { ?>

			<div class="mdc-image-list__supporting">

				<span class="mdc-image-list__label"><?php 

					echo esc_html( $this->args['label'] );

				?></span>

			</div>

		<?php }

	}

	/**
	 * Render.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	public function render() {

		if ( self::has_errors( $this->errors ) ) { 
			self::render_errors( $this->errors ); 
			return; 
		}

		$container_class = self::parse_classes( array(
			'wpmdc-image-list-item'                                              => true, 
			'mdc-image-list__item'                                               => true, 
			'wpmdc-image-list-item--aspect-' . esc_attr( $this->args['aspect'] ) => ! empty( $this->args['aspect'] ), 
		) );

		if ( ! empty( $this->args['href'] ) ) {

			$link_attrs = self::parse_attrs( array(
				'target="' . esc_attr( $this->args['target'] ) . '"' => ! empty( $this->args['target'] ), 
				'rel="' . esc_attr( $this->args['rel'] ) . '"'       => ! empty( $this->args['rel'] ), 
			) ); ?>

			<a 
			href="<?php echo esc_url( $this->args['href'] ); ?>"
			id="<?php echo esc_attr( $this->args['id'] ); ?>"
			class="<?php echo esc_attr( $container_class ); ?>"
			<?php echo $link_attrs; ?>><?php 

				$this->render_internal_elements();

			?></a>

		<?php } else { ?>

			<li 
			id="<?php echo esc_attr( $this->args['id'] ); ?>"
			class="<?php echo esc_attr( $container_class ); ?>"><?php 

				$this->render_internal_elements();

			?></li>

		<?php }

	}

}
