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

/**
 * Launch the child theme
 */
$hello = \Fulcrum\Addon\init_theme( __DIR__ . '/config/theme.php' );

/**
 * Let's load in all the files
 */
require_once( __DIR__ . '/lib/functions/autoload.php' );

/**
 * Now we can launch Genesis
 */
include_once( get_template_directory() . '/lib/init.php' );
