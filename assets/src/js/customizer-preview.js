const { jQuery, wp } = window;
import { wpmdcSelects } from './modules/select';
import { wpmdcRipples } from './modules/ripple';

(function($) {

	// Must be bound on document ready, 
	// to allow for instantiation of customizer.
	$(document).ready(() => {

		/**
		 * Events: 
		 *     'widget-added'
		 *     'widget-updated'
		 *     'sidebar-updated'
		 *     'customize-preview-menu-refreshed'
		 *     'partial-content-moved'
		 */

		wp.customize.selectiveRefresh.bind('widget-updated', (e) => {
			const { widgetId, widgetIdParts } = e;
			const widget = document.getElementById(widgetId);
			// Update Nav Menu Widget
			if (widgetIdParts.idBase === 'nav_menu') {
				wpmdcRipples(widget);
			} else if (widgetIdParts.idBase === 'wpmdc_widget_pages') {
				wpmdcRipples(widget);
			} else if (widgetIdParts.idBase === 'wpmdc_widget_posts') {
				wpmdcRipples(widget);
			} else if (widgetIdParts.idBase === 'wpmdc_widget_comments') {
				wpmdcRipples(widget);
			} else if (widgetIdParts.idBase === 'archives') {
				wpmdcSelects(widget);
				wpmdcRipples(widget);
			} else if (widgetIdParts.idBase === 'categories') {
				wpmdcSelects(widget);
				wpmdcRipples(widget);
			}
		});

	});

})(jQuery);
