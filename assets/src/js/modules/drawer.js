import { MDCTemporaryDrawer } from '@material/drawer/dist/mdc.drawer';

export function wpmdcTemporaryDrawer(element) {
	if (element) {
		const toggles = element.id ? document.querySelectorAll(`*[data-for-drawer="${element.id}"]`) : [];
		const MDCTemporaryDrawerInst = new MDCTemporaryDrawer(element);
		if (toggles) {
			toggles.forEach((toggle, i) => {
				toggle.addEventListener('click', (e) => {
					e.preventDefault();
					MDCTemporaryDrawerInst.open = ! MDCTemporaryDrawerInst.open;
				});
			});
		}
	}
}

export function wpmdcTemporaryDrawers(container = null) {
	container = container || document;
	const elements = container.querySelectorAll('.mdc-drawer--temporary');
	if (elements) {
		elements.forEach((element, i) => {
			wpmdcTemporaryDrawer(element);
		});
	}
}
