import { MDCCheckbox } from '@material/checkbox/dist/mdc.checkbox';
import { MDCFormField } from '@material/form-field/dist/mdc.formField';

export function wpmdcCheckbox(element) {
	if (element) {
		const MDCCheckboxInst = new MDCCheckbox(element);
		if (element.classList.contains('wpmdc-checkbox--start-indeterminate')) {
			MDCCheckboxInst.indeterminate = true;
		}
		const { parentNode } = element;
		if (parentNode.classList.contains('mdc-form-field')) {
			const MDCFormFieldInst = new MDCFormField(parentNode);
			MDCFormFieldInst.input = MDCCheckboxInst;
		}
	}
}

export function wpmdcCheckboxes(container = null) {
	container = container || document;
	const elements = container.querySelectorAll('.mdc-checkbox');
	if (elements) {
		elements.forEach((element, i) => {
			wpmdcCheckbox(element);
		});
	}
}
