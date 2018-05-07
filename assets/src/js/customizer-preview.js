const { jQuery, wp } = window;
import { wpmdcSelects } from './modules/select';
import { wpmdcRipples } from './modules/ripple';

(function($) {

	// Must be bound on document ready, 
	// to allow for instantiation of customizer.
	$(document).ready(() => {

		const widgetsWithRipples = [
			'nav_menu', 
			'wpmdc_widget_pages', 
			'wpmdc_widget_posts', 
			'wpmdc_widget_comments', 
			'wpmdc_widget_archives', 
			'wpmdc_widget_terms', 
		];

		const widgetsWithSelects = [
			'wpmdc_widget_archives', 
			'wpmdc_widget_terms', 
		];

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
			const { idBase } = widgetIdParts;
			const widget = document.getElementById(widgetId);
			if (widgetsWithRipples.indexOf(idBase) !== -1) {
				wpmdcRipples(widget);
			}
			if (widgetsWithSelects.indexOf(idBase) !== -1) {
				wpmdcSelects(widget);
			}
			
		});

	});

})(jQuery);
