import { MDCLinearProgress } from '@material/linear-progress/dist/mdc.linearProgress';

export function wpmdcLinearProgress(element) {
	if (element) {
		const MDCLinearProgressInst = new MDCLinearProgress(element);
		const progress = element.getAttribute('data-progress');
		const buffer = element.getAttribute('data-buffer');
		if (progress) {
			MDCLinearProgressInst.progress = parseFloat(progress);
		}
		if (buffer) {
			MDCLinearProgressInst.buffer = parseFloat(buffer);
		}
	}
}

export function wpmdcLinearProgresses(container = null) {
	container = container || document;
	const elements = container.querySelectorAll('.mdc-linear-progress');
	if (elements) {
		elements.forEach((element, i) => {
			wpmdcLinearProgress(element);
		});
	}
}
