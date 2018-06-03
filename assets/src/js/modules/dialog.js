import { MDCDialog } from '@material/dialog/dist/mdc.dialog';

export function wpmdcDialog(element) {
	if (element) {
		const toggles = element.id ? document.querySelectorAll(`*[data-for-dialog="${element.id}"]`) : [];
		const MDCDialogInst = new MDCDialog(element);
		if (toggles) {
			toggles.forEach((toggle, i) => {
				toggle.addEventListener('click', (e) => {
					e.preventDefault();
					if (MDCDialogInst.open) {
						MDCDialogInst.hide();
					} else {
						MDCDialogInst.show();
					}
				});
			});
		}
	}
}

export function wpmdcDialogs(container = null) {
	container = container || document;
	const elements = container.querySelectorAll('.mdc-dialog');
	if (elements) {
		elements.forEach((element, i) => {
			wpmdcDialog(element);
		});
	}
}
