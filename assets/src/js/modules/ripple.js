import { MDCRipple } from '@material/ripple/dist/mdc.ripple';

export function wpmdcRipple(element) {
	if (element) {
		MDCRipple.attachTo(element);
	}
}

export function wpmdcRipples(container = null) {
	container = container || document;
	const elements = container.querySelectorAll('.mdc-ripple-surface');
	if (elements) {
		elements.forEach((element, i) => {
			wpmdcRipple(element);
		});
	}
}
