import { MDCRadio } from '@material/radio/dist/mdc.radio';
import { MDCFormField } from '@material/form-field/dist/mdc.formField';

export function wpmdcRadio(element) {
	if (element) {
		const MDCRadioInst = new MDCRadio(element);
		const { parentNode } = element;
		if (parentNode.classList.contains('mdc-form-field')) {
			const MDCFormFieldInst = new MDCFormField(parentNode);
			MDCFormFieldInst.input = MDCRadioInst;
		}
	}
}

export function wpmdcRadios(container = null) {
	container = container || document;
	const elements = container.querySelectorAll('.mdc-radio');
	if (elements) {
		elements.forEach((element, i) => {
			wpmdcRadio(element);
		});
	}
}
