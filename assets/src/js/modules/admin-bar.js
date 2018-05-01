/**
 * Force fixed admin bar without throwing Theme Check errors ;). 
 *
 * @since 0.0.1
 * @return {void} 
 */
export function wpmdcMobileAdminBarFix() {
	const styleEl = document.createElement('STYLE');
	const styles = document.createTextNode('#wpadminbar { position: fixed; }');
	styleEl.setAttribute('type', 'text/css');
	styleEl.appendChild(styles);
	document.querySelector('head').appendChild(styleEl);
}