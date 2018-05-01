import { wpmdcMobileAdminBarFix } from './modules/admin-bar';
import { wpmdcTopAppBars } from './modules/top-app-bar';
import { wpmdcTemporaryDrawers } from './modules/drawer';
import { wpmdcSelects } from './modules/select';
import { wpmdcRipples } from './modules/ripple';

document.addEventListener('DOMContentLoaded', () => {
	wpmdcMobileAdminBarFix();
	wpmdcTopAppBars();
	wpmdcTemporaryDrawers();
	wpmdcSelects();
	wpmdcRipples();
});
