/**
 * watch.js - Builds the distribution JavaScript and jQuery files
 *
 * @package     KnowTheCodeGulp
 * @since       1.0.0
 * @author      hellofromTonya <hellofromtonya@knowthecode.io>
 * @link        http://hellofromtonya.com
 * @license     GNU General Public License 2.0+
 */

'use strict';

module.exports = function ( gulp, plugins, config ) {

	/**
	 * Handles the browserSync and watch tasks.
	 *
	 * @since 1.0.1
	 */
	gulp.task( 'watch', function ( callback ) {

		// Kick off BrowserSync.
		plugins.browserSync( config.watch.browserSync );

		// Run tasks when files change.
		gulp.watch( config.paths.sass, ['styles'] );
		gulp.watch( config.paths.scripts, ['scripts'] );
		gulp.watch( config.paths.concatScripts, ['scripts'] );
	});
};