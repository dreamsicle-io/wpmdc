import { MDCIconButton } from '@material/icon-button/dist/mdc.iconButton';

export function wpmdcIconButton(element) {
	if (element) {
		MDCIconButton.attachTo(element);
	}
}

export function wpmdcIconButtons(container = null) {
	container = container || document;
	const elements = container.querySelectorAll('.mdc-icon-button');
	if (elements) {
		elements.forEach((element, i) => {
			wpmdcIconButton(element);
		});
	}
}
