import { MDCIconToggle } from '@material/icon-toggle/dist/mdc.iconToggle';

export function wpmdcIconToggle(element) {
	if (element) {
		MDCIconToggle.attachTo(element);
	}
}

export function wpmdcIconToggles(container = null) {
	container = container || document;
	const elements = container.querySelectorAll('.mdc-icon-toggle');
	if (elements) {
		elements.forEach((element, i) => {
			wpmdcIconToggle(element);
		});
	}
}
