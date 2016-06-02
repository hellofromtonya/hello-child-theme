/**
 * config.js - Configures the gulp tasks
 *
 * You will want to configure up the folder structures and theme settings.
 *
 * @package     KnowTheCodeGulp
 * @since       1.0.0
 * @author      hellofromTonya <hellofromtonya@knowthecode.io>
 * @link        http://hellofromtonya.com
 * @license     GNU General Public License 2.0+
 */

module.exports = function ( themeRoot ) {

	var themeSettings = {
		package: 'hello',
		domain: 'hellofromtonya.com',
	};


	/************************************
	 * Folder Structure
	 ***********************************/

	/**
	 * Assets folder - path to the location of all the assets,
	 * i.e. images, Sass, scripts, styles, etc.
	 *
	 * @type {String}
	 */
	var assetsDir = themeRoot + 'assets/';

	/**
	 * gulp folder - path to where the gulp utils and
	 * tasks are located.
	 *
	 * @type {String}
	 */
	var gulpDir = assetsDir + 'gulp/';

	/**
	 * Distribution folder - path to where the final build, distribution
	 * files will be located.
	 *
	 * @type {String}
	 */
	var distDir = assetsDir + 'dist/';

	/**
	 * Distribution folder - path to where the final build, distribution
	 * files will be located.
	 *
	 * @type {Object}
	 */
	var assetDirs = {
		css: assetsDir + 'css/',
		images: assetsDir + 'images/',
		sass: assetsDir + 'sass/',
		scripts: assetsDir + 'js/'
	}

	/**
	 * Distribution folder - path to where the final build, distribution
	 * files will be located.
	 *
	 * @type {Object}
	 */
	var paths = {
		css: ['./*.css', '!*.min.css'],
		images: [ assetDirs.images + '*', '!' + assetDirs.images + '*.svg' ],
		sass: assetDirs.sass + '**/*.scss',
		concatScripts: assetDirs.scripts + 'concat/*.js',
		scripts: [ assetDirs.scripts + '*.js', '!' + assetDirs.scripts + '*.min.js' ]
	};

	/**
	 * Distribution folder - path to where the final build, distribution
	 * files will be located.
	 *
	 * @type {Object}
	 */
	var distDirs = {
		root: themeRoot,
		css: distDir + 'css/',
		scripts: distDir + 'js/'
	};

	/************************************
	 * Theme Settings
	 ***********************************/

	var stylesSettings = {
		clean: {
			src : [ distDirs.css + "*.*", themeRoot + "style.css", themeRoot + "style.min.css" ]
		},
		postcss: {
			src: [ assetDirs.sass + '*.scss' ],
			dest: distDirs.css,
			autoprefixer: {
				browsers: [
					'last 2 versions',
					'ie 9',
					'ios 6',
					'android 4'
				]
			}
		},
		cssnano: {
			src: distDirs.css + "*.css",
			dest: distDirs.css,
		},
		cssfinalize: {
			run: false,
			src: [ distDirs.css + "style.css", distDirs.css + "style.min.css" ],
			dest: themeRoot
		}
	};

	var scriptsSettings = {
		clean: {
			src : [ distDirs.scripts + "*.*" ]
		},
		concat: {
			src: assetDirs.scripts + '/**/*.js',
			dest: distDirs.scripts,
			concatSrc: 'jquery.project.js',
		},
		minify: {
			src: distDirs.scripts + '*.js',
			dest: distDirs.scripts,
		}
	};

	var imageminSettings = {
		src: paths.images,
		dest: assetDirs.images
	}

	var watchSettings = {
		browserSync:	{
			open: false,             // Open project in a new tab?
			injectChanges: true,     // Auto inject changes instead of full reload
			proxy: themeSettings.domain,  // Use http://domainname.tld:3000 to use BrowserSync
			watchOptions: {
				debounceDelay: 1000  // Wait 1 second before injecting
			}
		}
	}


	/************************************
	 * Do not touch below this line.
	 *
	 * The following code assembles up the
	 * configuration object that is returned
	 * to gulpfile.js.
	 ***********************************/

	return {
		themeRoot: themeRoot,
		assetsDir: assetsDir,
		assetDirs: assetDirs,
		dist: distDirs,
		distDir: distDir,
		gulpDir: gulpDir,
		paths: paths,
		
		images: imageminSettings,
		scripts: scriptsSettings,
		styles: stylesSettings,
		watch: watchSettings
	};
};