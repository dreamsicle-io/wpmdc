import { MDCSelect } from '@material/select/dist/mdc.select';

export function wpmdcSelect(element) {
	if (element) {
		MDCSelect.attachTo(element);
	}
}

export function wpmdcSelects(container = null) {
	container = container || document;
	const elements = container.querySelectorAll('.mdc-select');
	if (elements) {
		elements.forEach((element, i) => {
			wpmdcSelect(element);
		});
	}
}
