'use-strict';

const pkg = require('./package.json');
const fs = require('fs');
const del = require('del');
const browserify = require('browserify');
const source = require('vinyl-source-stream');
const buffer = require('vinyl-buffer');
const gulp = require('gulp');
const debug = require('gulp-debug');
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const babel = require('babelify');
const uglify = require('gulp-uglify');
const imagemin = require('gulp-imagemin');
const rename = require('gulp-rename');
const wpPot = require('gulp-wp-pot');
const eslint = require('gulp-eslint');
const sassLint = require('gulp-sass-lint');

/**
 * Build SASS.
 *
 * Process:
 *	 1. Imports all SASS modules to file.
 *	 2. Compiles the SASS to CSS.
 *	 3. Minifies the file.
 *	 4. Adds all necessary vendor prefixes to CSS.
 *	 5. Renames the compiled file to *.min.css.
 *	 6. Writes sourcemaps to initial content.
 *	 7. Writes created files to the build directory.
 *	 8. Logs created files to the console.
 *
 * Run:
 *	 - Global command: `gulp build:sass`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp build:sass`.
 */
gulp.task('build:sass', function sassBuilder() {
	return gulp.src(['./assets/src/sass/**/*.s+(a|c)ss'])
		.pipe(sourcemaps.init({ loadMaps: true }))
		.pipe(sass({ includePaths: ['node_modules'], outputStyle: 'compressed', cascade: false })
			.on('error', function(err) { console.error(err); this.emit('end'); }))
		.pipe(autoprefixer({ browsers: ['last 5 versions', 'ie >= 9'] }))
		.pipe(rename({ suffix: '.min' }))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('./assets/dist/css'))
		.pipe(debug({ title: 'build:sass' }));
});

/**
 * Build Site JS.
 *
 * Process:
 *	 1. Imports JS modules to file. 
 *	 2. Transpiles the file with Babel.
 *	 3. Minifies the file.
 *	 4. Renames the compiled file to *.min.js.
 *	 5. Writes sourcemaps to initial content.
 *	 6. Writes created files to the build directory.
 *	 7. Logs created files to the console.
 *
 * Run:
 *	 - Global command: `gulp build:js:site`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp build:js:site`.
 */
gulp.task('build:js:site', function siteJsBuilder() {
	const bundler = browserify('./assets/src/js/site.js', { debug: true }).transform(babel, { presets: ['env'] });
	return bundler.bundle()
		.on('error', function(err) { console.error(err); this.emit('end'); })
		.pipe(source('site.js'))
		.pipe(buffer())
		.pipe(sourcemaps.init({ loadMaps: true }))
		.pipe(uglify())
		.pipe(rename({ suffix: '.min' }))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('./assets/dist/js'))
		.pipe(debug({ title: 'build:js:site' }));
});

/**
 * Build Admin JS.
 *
 * Process:
 *	 1. Imports JS modules to file. 
 *	 2. Transpiles the file with Babel.
 *	 3. Minifies the file.
 *	 4. Renames the compiled file to *.min.js.
 *	 5. Writes sourcemaps to initial content.
 *	 6. Writes created files to the build directory.
 *	 7. Logs created files to the console.
 *
 * Run:
 *	 - Global command: `gulp build:js:admin`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp build:js:admin`.
 */
gulp.task('build:js:admin', function adminJsBuilder() {
	const bundler = browserify('./assets/src/js/admin.js', { debug: true }).transform(babel, { presets: ['env'] });
	return bundler.bundle()
		.on('error', function(err) { console.error(err); this.emit('end'); })
		.pipe(source('admin.js'))
		.pipe(buffer())
		.pipe(sourcemaps.init({ loadMaps: true }))
		.pipe(uglify())
		.pipe(rename({ suffix: '.min' }))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('./assets/dist/js'))
		.pipe(debug({ title: 'build:js:admin' }));
});

/**
 * Build Login JS.
 *
 * Process:
 *	 1. Imports JS modules to file. 
 *	 2. Transpiles the file with Babel.
 *	 3. Minifies the file.
 *	 4. Renames the compiled file to *.min.js.
 *	 5. Writes sourcemaps to initial content.
 *	 6. Writes created files to the build directory.
 *	 7. Logs created files to the console.
 *
 * Run:
 *	 - Global command: `gulp build:js:login`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp build:js:login`.
 */
gulp.task('build:js:login', function loginJsBuilder() {
	const bundler = browserify('./assets/src/js/login.js', { debug: true }).transform(babel, { presets: ['env'] });
	return bundler.bundle()
		.on('error', function(err) { console.error(err); this.emit('end'); })
		.pipe(source('login.js'))
		.pipe(buffer())
		.pipe(sourcemaps.init({ loadMaps: true }))
		.pipe(uglify())
		.pipe(rename({ suffix: '.min' }))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('./assets/dist/js'))
		.pipe(debug({ title: 'build:js:login' }));
});

/**
 * Build Customizer Preview JS.
 *
 * Process:
 *	 1. Imports JS modules to file. 
 *	 2. Transpiles the file with Babel.
 *	 3. Minifies the file.
 *	 4. Renames the compiled file to *.min.js.
 *	 5. Writes sourcemaps to initial content.
 *	 6. Writes created files to the build directory.
 *	 7. Logs created files to the console.
 *
 * Run:
 *	 - Global command: `gulp build:js:customizer-preview`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp build:js:customizer-preview`.
 */
gulp.task('build:js:customizer-preview', function customizerPreviewJsBuilder() {
	const bundler = browserify('./assets/src/js/customizer-preview.js', { debug: true }).transform(babel, { presets: ['env'] });
	return bundler.bundle()
		.on('error', function(err) { console.error(err); this.emit('end'); })
		.pipe(source('customizer-preview.js'))
		.pipe(buffer())
		.pipe(sourcemaps.init({ loadMaps: true }))
		.pipe(uglify())
		.pipe(rename({ suffix: '.min' }))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('./assets/dist/js'))
		.pipe(debug({ title: 'build:js:customizer-preview' }));
});

/**
 * Build Customizer Controls JS.
 *
 * Process:
 *	 1. Imports JS modules to file. 
 *	 2. Transpiles the file with Babel.
 *	 3. Minifies the file.
 *	 4. Renames the compiled file to *.min.js.
 *	 5. Writes sourcemaps to initial content.
 *	 6. Writes created files to the build directory.
 *	 7. Logs created files to the console.
 *
 * Run:
 *	 - Global command: `gulp build:js:customizer-controls`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp build:js:customizer-controls`.
 */
gulp.task('build:js:customizer-controls', function customizerControlsJsBuilder() {
	const bundler = browserify('./assets/src/js/customizer-controls.js', { debug: true }).transform(babel, { presets: ['env'] });
	return bundler.bundle()
		.on('error', function(err) { console.error(err); this.emit('end'); })
		.pipe(source('customizer-controls.js'))
		.pipe(buffer())
		.pipe(sourcemaps.init({ loadMaps: true }))
		.pipe(uglify())
		.pipe(rename({ suffix: '.min' }))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('./assets/dist/js'))
		.pipe(debug({ title: 'build:js:customizer-controls' }));
});

/**
 * Build All JS.
 *
 * Process:
 *	 1. Runs the `build:js:site` task. 
 *	 2. Runs the `build:js:admin` task. 
 *	 3. Runs the `build:js:customizer-preview` task. 
 *	 3. Runs the `build:js:customizer-controls` task. 
 *
 * Run:
 *	 - Global command: `gulp build:js`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp build:js`.
 */
gulp.task('build:js', gulp.series('build:js:site', 'build:js:admin', 'build:js:login', 'build:js:customizer-preview', 'build:js:customizer-controls'));

/**
 * Build localization files for translations.
 *
 * Process:
 *	 1. Reads php files for WordPress localization functions. 
 *	 2. Processes values related to this package's text domain. 
 *	 3. Writes created .pot file to the localization directory.
 *	 4. Logs created files to the console.
 *
 * Run:
 *	 - Global command: `gulp build:pot`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp build:pot`.
 */
gulp.task('build:pot', function potBuilder() {
	return gulp.src(['./**/*.php'])
		.pipe(wpPot({ domain: pkg.name })
			.on('error', function(err) { console.error(err); this.emit('end'); }))
		.pipe(gulp.dest('./languages/' + pkg.name + '.pot'))
		.pipe(debug({ title: 'build:pot' }));
});

/**
 * Build Images.
 *
 * Process:
 *	 1. Process and optimize all images. 
 *	 3. Writes optimized images to the build directory.
 *	 4. Logs created files to the console.
 *
 * Run:
 *	 - Global command: `gulp build:images`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp build:images`.
 */
gulp.task('build:images', function imageBuilder() {
	return gulp.src(['./assets/src/images/**/*.+(jpg|jpeg|png|svg|gif)'])
		.pipe(imagemin()
			.on('error', function(err) { console.error(err); this.emit('end'); }))
		.pipe(gulp.dest('./assets/dist/images'))
		.pipe(debug({ title: 'build:images' }));
});

/**
 * Build Package Stylesheet Header.
 *
 * Process:
 *	 1. Prepares the necessary data from the package.json file. 
 *	 2. Writes the required style.css file with formatted header comment.
 *
 * Expected output: 
 *   Theme Name:  ...
 *   Theme URI:   ...
 *   Author:      ...
 *   Author URI:  ...
 *   Description: ...
 *   Version:     ...
 *   License:     ...
 *   License URI: ...
 *   Text Domain: ...
 *   Tags:        ...
 *
 * Run:
 *	 - Global command: `gulp build:package:style`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp build:package:style`.
 */
gulp.task('build:package:style', function packageStyleBuilder(done) {
	const data = {
		'Theme Name': pkg.name || '', 
		'Theme URI': pkg.homepage || '', 
		'Author': pkg.author.name || '', 
		'Author URI': pkg.author.url || '', 
		'Description': pkg.description || '', 
		'Version': pkg.version || '', 
		'License': pkg.license || '', 
		'License URI': 'LICENSE', 
		'Text Domain': pkg.name || '', 
		'Tags': (pkg.keywords.length > 0) ? pkg.keywords.join(', ') : '', 
	};
	var contents = '/*!\n';
	for (var key in data) {
		contents += key + ': ' + data[key] + '\n';
	}
	contents += '*/\n';
	return fs.writeFile('./style.css', contents, done);
});

/**
 * Build Package README.
 *
 * Process:
 *	 1. Prepares the necessary data from the package.json file. 
 *	 2. Writes the README.md file formatted for WP Theme Repo. 
 *
 * Expected output: 
 *   Contributors:      ...
 *   Version:           ...
 *   Requires at least: ...
 *   Tested up to:      ...
 *   License:           ...
 *   License URI:       ...
 *   Tags:              ...
 *
 * Run:
 *	 - Global command: `gulp build:package:readme`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp build:package:readme`.
 */
gulp.task('build:package:readme', function packageReadmeBuilder(done) {
	var contributorNames = pkg.author.name ? [pkg.author.name] : [];
	if (pkg.contributors && pkg.contributors.length > 0) {
		pkg.contributors.map(function(contributor, i) {
			contributorNames.push(contributor.name);
		});
	}
	const data = {
		'Contributors': (contributorNames.length > 0) ? contributorNames.join(', ') : '', 
		'Version': pkg.version || '', 
		'Requires at least': pkg.wordpress.versionRequired || '', 
		'Tested up to': pkg.wordpress.versionTested || '', 
		'License': pkg.license || '', 
		'License URI': 'LICENSE', 
		'Tags': (pkg.keywords.length > 0) ? pkg.keywords.join(', ') : '', 
	};
	var contents = '# ' + pkg.name + '\n\n';
	for (var key in data) {
		contents += '**' + key + ':** ' + data[key] + '\n';
	}
	contents += '\n## Description\n\n' + pkg.description + '\n';
	return fs.writeFile('./README.md', contents, done);
});

/**
 * Build Package.
 *
 * Process:
 *	 1. Runs the `build:package:style` task. 
 *	 2. Runs the `build:package:readme` task. 
 *
 * Run:
 *	 - Global command: `gulp build:package`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp build:package`.
 */
gulp.task('build:package', gulp.series('build:package:style', 'build:package:readme'));

/**
 * Build all assets.
 *
 * Process:
 *	 1. Runs the `build:package` task.
 *	 2. Runs the `build:sass` task.
 *	 3. Runs the `build:js` task.
 *	 4. Runs the `build:pot` task.
 *	 5. Runs the `build:images` task.
 *
 * Run:
 *	 - Global command: `gulp build`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp build`.
 *	 - NPM script: `npm run build`.
 */
gulp.task('build', gulp.series('build:package', 'build:pot', 'build:sass', 'build:js', 'build:images'));

/**
 * Clean package Files.
 *
 * Process:
 *	 1. Deletes the default style.css file containing generated theme header.
 *	 2. Deletes the README.md file containing generated documentation.
 *
 * Run:
 *	 - Global command: `gulp clean:package`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp clean:package`.
 */
gulp.task('clean:package', function packageCleaner(done) {
	return del(['./README.md', 'style.css'], done);
});

/**
 * Clean build CSS.
 *
 * Process:
 *	 1. Deletes the CSS build directory.
 *
 * Run:
 *	 - Global command: `gulp clean:css`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp clean:css`.
 */
gulp.task('clean:css', function cssCleaner(done) {
	return del(['./assets/dist/css'], done);
});

/**
 * Clean build JS.
 *
 * Process:
 *	 1. Deletes the JS build directory.
 *
 * Run:
 *	 - Global command: `gulp clean:js`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp clean:js`.
 */
gulp.task('clean:js', function jsCleaner(done) {
	return del(['./assets/dist/js'], done);
});

/**
 * Clean localization build files.
 *
 * Process:
 *	 1. Deletes the localization build directory.
 *
 * Run:
 *	 - Global command: `gulp clean:pot`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp clean:pot`.
 */
gulp.task('clean:pot', function potCleaner(done) {
	return del(['./languages/*.pot'], done);
});

/**
 * Clean build images.
 *
 * Process:
 *	 1. Deletes the images build directory.
 *
 * Run:
 *	 - Global command: `gulp clean:images`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp clean:images`.
 */
gulp.task('clean:images', function imagesCleaner(done) {
	return del(['./assets/dist/images'], done);
});

/**
 * Clean build assets.
 *
 * Process: 
 *	 1. Deletes the build directory.
 *	 2. Deletes the localization directory.
 *
 * Run:
 *	 - Global command: `gulp clean`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp clean`.
 *	 - NPM script: `npm run clean`.
 */
gulp.task('clean', function cleaner(done) {
	return del(['./assets/dist', './languages/*.pot', './README.md', 'style.css'], done);
});

/**
 * Lint all SCSS files.
 *
 * Process:
 *	 1. Lints all SCSS and SASS files. 
 *	 2. Logs the linting errors to the console.
 *	 3. Logs processed files to the console. 
 *
 * Run:
 *	 - Global command: `gulp lint:sass`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp lint:sass`.
 */
gulp.task('lint:sass', function sassLinter() {
	return gulp.src(['./assets/src/sass/**/*.s+(a|c)ss'])
		.pipe(sassLint()
			.on('error', function(err) { console.error(err); this.emit('end'); }))
		.pipe(sassLint.format())
		.pipe(debug({ title: 'lint:sass' }));
});

/**
 * Lint all JS files.
 *
 * Process:
 *	 1. Lints all JS files. 
 *	 2. Logs the linting errors to the console.
 *	 3. Logs processed files to the console. 
 *
 * Run:
 *	 - Global command: `gulp lint:js`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp lint:js`.
 */
gulp.task('lint:js', function jsLinter() {
	return gulp.src(['./assets/src/js/**/*.js'])
		.pipe(eslint()
			.on('error', function(err) { console.error(err); this.emit('end'); }))
		.pipe(eslint.format())
		.pipe(debug({ title: 'lint:js' }));
});

/**
 * Lint all assets.
 *
 * Process:
 *	 1. Runs the `lint:sass` task. 
 *	 2. Runs the `lint:js` task. 
 *
 * Run:
 *	 - Global command: `gulp lint`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp lint`.
 *	 - NPM script: `npm run lint`.
 */
gulp.task('lint', gulp.series('lint:sass', 'lint:js'));

/**
 * Watch source files and build on change.
 *
 * Process:
 *	 1. Runs the `build:package` task when the package.json file changes.
 *	 2. Runs the `build:pot` task when the source php changes.
 *	 3. Runs the `lint:sass` and `build:sass` tasks when the source SASS changes.
 *	 4. Runs the `lint:js` and `build:js` tasks when the source JS changes.
 *	 5. Runs the `build:images` task when the source images change.
 * 
 * Run: 
 *	 - Global command: `gulp watch`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp watch`.
 *	 - NPM script: `npm run watch`.
 */
gulp.task('watch', function watcher() {
	gulp.watch(['./package.json'], gulp.series('build:package'));
	gulp.watch(['./**/*.php', '!./node_modules/**', '!./assets/**', '!./languages/**'], gulp.series('build:pot'));
	gulp.watch(['./assets/src/sass/**/*.s+(a|c)ss'], gulp.series('lint:sass', 'build:sass'));
	gulp.watch(['./assets/src/js/**/*.js'], gulp.series('lint:js', 'build:js'));
	gulp.watch(['./assets/src/images/**/*.+(jpg|jpeg|png|svg|gif)'], gulp.series('build:images'));
});

/**
 * Build all assets (default task). 
 *
 * Process:
 *	 1. Runs the `lint` task.
 *	 2. Runs the `build` task.
 *	 3. Runs the `watch` task.
 * 
 * Run: 
 *	 - Global command: `gulp`.
 *	 - Local command: `node ./node_modules/gulp/bin/gulp`.
 *	 - NPM script: `npm start`.
 */
gulp.task('default', gulp.series('lint', 'build', 'watch'));
