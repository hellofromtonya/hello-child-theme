<?php

/**
 * Stop and say "Hello"
 *
 * @package     Hello
 * @since       1.0.1
 * @author      hellofromTonya
 * @link        http://hellofromtonya.com/blog
 * @license     GNU General Public License 2.0+
 */
namespace Hello;

$child_theme = wp_get_theme();

/**
 * Define all of the constants
 */
define( 'CHILD_THEME_NAME', $child_theme->Name );
define( 'CHILD_THEME_URL', get_stylesheet_directory_uri() );
define( 'CHILD_THEME_VERSION', $child_theme->Version );

if ( ! defined( 'CHILD_THEME_DIR' ) ) {
	define( 'CHILD_THEME_DIR', get_stylesheet_directory() );
}
define( 'CHILD_DIST_URL', get_stylesheet_directory_uri() . '/assets/dist/' );

/**
 * Let's load in all the files
 */
require_once( __DIR__ . '/lib/functions/autoload.php' );

/**
 * Launch the child theme
 */
\Fulcrum\Addon\init_theme( __DIR__ . '/config/theme.php' );

/**
 * Now we can launch Genesis
 */
include_once( get_template_directory() . '/lib/init.php' );
