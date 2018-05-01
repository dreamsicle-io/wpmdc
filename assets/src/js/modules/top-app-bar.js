import { MDCTopAppBar } from '@material/top-app-bar/dist/mdc.topAppBar';

export function wpmdcTopAppBar(element) {
	if (element) {
		MDCTopAppBar.attachTo(element);
	}
}

export function wpmdcTopAppBars(container = null) {
	container = container || document;
	const elements = container.querySelectorAll('.mdc-top-app-bar');
	if (elements) {
		elements.forEach((element, i) => {
			wpmdcTopAppBar(element);
		});
	}
}
