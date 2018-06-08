<?php
/**
 * WPMDC Dialog Class.
 *
 * @package    wpmdc
 * @subpackage includes/components
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * WPMDC Dialog.
 *
 * @since  0.0.1 
 */
class WPMDC_Dialog extends WPMDC_Component {

	/**
	 * Construct.
	 *
	 * @since   0.0.1
	 * @return  void 
	 */
	function __construct( $args = array() ) {

		$this->arg_types = array(
			'id'             => 'string', 
			'title'          => 'string', 
			'body'           => 'string', 
			'cancel_text'    => 'string', 
			'accept_text'    => 'string', 
			'footer_buttons' => 'array', 
			'scrollable'     => 'boolean', 
			'class'          => 'string', 
		);

		$this->default_args = array(
			'id'             => $this->get_uniqid(), 
			'title'          => _x( 'Dialog', 'dialog component default title', 'wpmdc' ), 
			'body'           => '', 
			'cancel_text'    => _x( 'Cancel', 'dialog component default cancel text', 'wpmdc' ), 
			'accept_text'    => _x( 'Accept', 'dialog component default accept text', 'wpmdc' ),
			'scrollable'     => false, 
			'class'          => '', 
		);

		parent::__construct( $args );

	}

	public function render() {

		if ( self::has_errors( $this->errors ) ) { 
			self::render_errors( $this->errors ); 
			return; 
		}

		$class = self::parse_classes( array(
			'wpmdc-dialog'                   => true, 
			'mdc-dialog'                     => true, 
			esc_attr( $this->args['class'] ) => ! empty( $this->args['class'] ), 
		) );

		$body_class = self::parse_classes( array(
			'mdc-dialog__body'             => true, 
			'mdc-dialog__body--scrollable' => $this->args['scrollable'], 
		) ); ?>

		<aside 
		role="alertdialog"
		id="<?php echo esc_attr( $this->args['id'] ); ?>"
		class="<?php echo esc_attr( $class ); ?>"role="alertdialog"
		aria-labelledby="<?php echo esc_attr( $this->args['id'] ); ?>_title"
		aria-describedby="<?php echo esc_attr( $this->args['id'] ); ?>_description">
		
			<div class="mdc-dialog__surface">

				<header class="mdc-dialog__header">

					<h2 
					id="<?php echo esc_attr( $this->args['id'] ); ?>_title" 
					class="mdc-dialog__header__title"><?php 

						echo esc_html( $this->args['title'] );

					?></h2>

				</header>

				<section 
				id="<?php echo esc_attr( $this->args['id'] ); ?>_description" 
				class="<?php echo esc_attr( $body_class ); ?>"><?php 

					echo wp_kses_post( $this->args['body'] );

				?></section>

				<footer class="mdc-dialog__footer">

					<?php if ( ! empty( $this->args['cancel_text'] ) ) { ?> 

						<button 
						type="button" 
						class="mdc-button mdc-dialog__footer__button mdc-dialog__footer__button--cancel"><?php 

							echo esc_html( $this->args['cancel_text'] ); 

						?></button>

					<?php } ?>

					<?php if ( ! empty( $this->args['accept_text'] ) ) { ?>

						<button 
						type="button" 
						class="mdc-button mdc-dialog__footer__button mdc-dialog__footer__button--accept mdc-dialog__action"><?php 

							echo esc_html( $this->args['accept_text'] ); 

						?></button>

					<?php } ?>
						
				</footer>

			</div>
			
			<div class="mdc-dialog__backdrop"></div>

		</aside>

	<?php }

}
