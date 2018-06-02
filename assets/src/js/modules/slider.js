import { MDCSlider } from '@material/slider/dist/mdc.slider';

export function wpmdcSlider(element) {
	if (element) {
		MDCSlider.attachTo(element);
	}
}

export function wpmdcSliders(container = null) {
	container = container || document;
	const elements = container.querySelectorAll('.mdc-slider');
	if (elements) {
		elements.forEach((element, i) => {
			wpmdcSlider(element);
		});
	}
}
