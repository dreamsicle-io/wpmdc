import { MDCChip, MDCChipSet } from '@material/chips/dist/mdc.chips';

export function wpmdcChip(element) {
	if (element) {
		MDCChip.attachTo(element);
	}
}

export function wpmdcChips(container = null) {
	container = container || document;
	const elements = container.querySelectorAll('.mdc-chip');
	if (elements) {
		elements.forEach((element, i) => {
			if (! element.parentNode.classList.contains('mdc-chip-set')) {
				wpmdcChip(element);
			}
		});
	}
}

export function wpmdcChipSet(element) {
	if (element) {
		MDCChipSet.attachTo(element);
	}
}

export function wpmdcChipSets(container = null) {
	container = container || document;
	const elements = container.querySelectorAll('.mdc-chip-set');
	if (elements) {
		elements.forEach((element, i) => {
			wpmdcChipSet(element);
		});
	}
}
