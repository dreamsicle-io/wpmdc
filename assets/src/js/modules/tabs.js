import { MDCTabBar, MDCTabBarScroller, MDCTab } from '@material/tabs/dist/mdc.tabs';

export function wpmdcTab(element) {
	if (element) {
		MDCTab.attachTo(element);
	}
}

export function wpmdcTabs(container = null) {
	container = container || document;
	const elements = container.querySelectorAll('.mdc-tab');
	if (elements) {
		elements.forEach((element, i) => {
			if (! element.parentNode.classList.contains('mdc-tab-bar')) {
				wpmdcTab(element);
			}
		});
	}
}

export function wpmdcTabBar(element) {
	if (element) {
		MDCTabBar.attachTo(element);
	}
}

export function wpmdcTabBars(container = null) {
	container = container || document;
	const elements = container.querySelectorAll('.mdc-tab-bar:not(.mdc-tab-bar-scroller__scroll-frame__tabs)');
	if (elements) {
		elements.forEach((element, i) => {
			wpmdcTabBar(element);
		});
	}
}

export function wpmdcTabBarScroller(element) {
	if (element) {
		MDCTabBarScroller.attachTo(element);
	}
}

export function wpmdcTabBarScrollers(container = null) {
	container = container || document;
	const elements = container.querySelectorAll('.mdc-tab-bar-scroller');
	if (elements) {
		elements.forEach((element, i) => {
			wpmdcTabBarScroller(element);
		});
	}
}
