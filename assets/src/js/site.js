import { wpmdcMobileAdminBarFix } from './modules/admin-bar';
import { wpmdcTopAppBars } from './modules/top-app-bar';
import { wpmdcTemporaryDrawers } from './modules/drawer';
import { wpmdcTextFields } from './modules/text-field';
import { wpmdcSelects } from './modules/select';
import { wpmdcRipples } from './modules/ripple';
import { wpmdcRadios } from './modules/radio';
import { wpmdcCheckboxes } from './modules/checkbox';
import { wpmdcSliders } from './modules/slider';
import { wpmdcDialogs } from './modules/dialog';
import { wpmdcMenus } from './modules/menu';
import { wpmdcTabs, wpmdcTabBars, wpmdcTabBarScrollers } from './modules/tabs';
import { wpmdcChips, wpmdcChipSets } from './modules/chips';
import { wpmdcIconToggles } from './modules/icon-toggle';
import { wpmdcLinearProgresses } from './modules/linear-progress';
// import { wpmdcIconButtons } from './modules/icon-button';

(function() {

	wpmdcMobileAdminBarFix();

	document.addEventListener('DOMContentLoaded', () => {
		wpmdcLinearProgresses();
		wpmdcTopAppBars();
		wpmdcTemporaryDrawers();
		wpmdcTextFields();
		wpmdcSelects();
		wpmdcCheckboxes();
		wpmdcRadios();
		wpmdcRipples();
		wpmdcTabBarScrollers();
		wpmdcTabBars();
		wpmdcTabs();
		wpmdcChipSets();
		wpmdcChips();
		wpmdcSliders();
		wpmdcDialogs();
		wpmdcMenus();
		wpmdcIconToggles();
		// wpmdcIconButtons();
	});

})();


