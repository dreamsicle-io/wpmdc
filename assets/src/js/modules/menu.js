import { MDCMenu, MDCMenuFoundation } from '@material/menu/dist/mdc.menu';

export function wpmdcMenu(element) {
	if (element) {
		const toggles = element.id ? document.querySelectorAll(`*[data-for-menu="${element.id}"]`) : [];
		const anchor = element.getAttribute('data-menu-anchor');
		const MDCMenuInst = new MDCMenu(element);
		switch(anchor) {
			case 'top-end':
				MDCMenuInst.setAnchorCorner(MDCMenuFoundation.Corner.TOP_END);
				break;
			case 'bottom-start':
				MDCMenuInst.setAnchorCorner(MDCMenuFoundation.Corner.BOTTOM_START);
				break;
			case 'bottom-end':
				MDCMenuInst.setAnchorCorner(MDCMenuFoundation.Corner.BOTTOM_END);
				break;
			default:
				MDCMenuInst.setAnchorCorner(MDCMenuFoundation.Corner.TOP_START);
		}
		if (toggles) {
			toggles.forEach((toggle, i) => {
				toggle.addEventListener('click', (e) => {
					e.preventDefault();
					MDCMenuInst.open = ! MDCMenuInst.open;
				});
			});
		}
	}
}

export function wpmdcMenus(container = null) {
	container = container || document;
	const elements = container.querySelectorAll('.mdc-menu');
	if (elements) {
		elements.forEach((element, i) => {
			wpmdcMenu(element);
		});
	}
}
