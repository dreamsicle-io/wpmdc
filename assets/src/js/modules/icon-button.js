import { MDCIconButton } from '@material/icon-button/dist/mdc.iconButton';

function wpmdcHandleIconButtonUpdate(optionName, isOn) {
	console.log(optionName, isOn);
}

export function wpmdcIconButton(element) {
	if (element) {
		MDCIconButton.attachTo(element);
		const optionName = element.getAttribute('data-wpmdc-option-name');
		if (optionName) {
			element.addEventListener('MDCIconButton:change', (e) => {
				const { isOn } = e.detail;
				wpmdcHandleIconButtonUpdate(optionName, isOn);
			});
		}
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
