import { MDCTextField } from '@material/textfield/dist/mdc.textField';

export function wpmdcTextField(element) {
	if (element) {
		MDCTextField.attachTo(element);
	}
}

export function wpmdcTextFields(container = null) {
	container = container || document;
	const elements = container.querySelectorAll('.mdc-text-field');
	if (elements) {
		elements.forEach((element, i) => {
			wpmdcTextField(element);
		});
	}
}
