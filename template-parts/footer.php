<?php
/**
 * The theme footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package     wpmdc
 * @subpackage  template-parts
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

?>

			</div><!-- #content -->

			<?php get_template_part( 'template-parts/colophon' ); ?>

		</div><!-- #site -->

		<?php wp_footer(); ?>

</body>
</html>
