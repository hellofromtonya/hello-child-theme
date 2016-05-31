<?php

/**
 * File autoloader
 * 
 * We could use Composer, but it feels a bit heavy for the number of files we need to load up.  As this is procedural
 * and not OOP, we can handle loading the files directly right here in this file.  Now to add more files to be loaded,
 * well shucks you can do that right here.  A function is provided for each folder.
 * 
 * Resist the temptation to add widgets, custom post types, taxonomies, and/or shortcodes in your theme.  Those features
 * go into a plugin and not in your theme.  If you put them here, I want you to picture me shaking my head back and
 * forth.  Come on....I taught you better than that.
 *
 * @package     Hello\Functions
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        http://hellofromtonya.com/blog
 * @license     GNU General Public License 2.0+
 */
namespace Hello\Functions;

/**
 * Load function files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function load_function_files() {
	include( __DIR__ . '/formatting.php' );
}

/**
 * Load structure files.
 *
 * You specify which structure files you want to load in the `$files` array.  Just
 * uncomment the ones you want and comment out the ones you don't.
 *
 * @since 1.0.0
 *
 * @return void
 */
function load_structure_files() {
	$folder = CHILD_THEME_DIR . '/lib/structure/';
	$files  = array(
//		'archive',
//		'comments',
		'footer',
//		'header',
//		'menu',
		'post',
//		'search',
	);

	foreach ( $files as $file ) {
		include( $folder . $file . '.php' );
	}
}

load_function_files();
load_structure_files();
