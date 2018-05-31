import { MDCIconToggle } from '@material/icon-toggle/dist/mdc.iconToggle';

function wpmdcHandleIconToggleUpdate(optionName, isOn) {
	console.log(optionName, isOn);
}

export function wpmdcIconToggle(element) {
	if (element) {
		MDCIconToggle.attachTo(element);
		const optionName = element.getAttribute('data-wpmdc-option-name');
		if (optionName) {
			element.addEventListener('MDCIconToggle:change', (e) => {
				const { isOn } = e.detail;
				wpmdcHandleIconToggleUpdate(optionName, isOn);
			});
		}
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
