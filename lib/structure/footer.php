<?php
/**
 * Footer structure customization.
 *
 * @package     Hello\Structure
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        http://hellofromtonya.com/blog
 * @license     GNU General Public License 2.0+
 */
namespace Hello\Structure;

add_action( 'genesis_after_footer', __NAMESPACE__ . '\render_scrollup' );
/**
 * Render out the scroll up feature
 *
 * @since  1.0.25
 *
 * @return void
 */
function render_scrollup() {
	include( __DIR__ . '/views/scrollup.php' );
}

// Add schema markup to Footer Navigation Menu.
add_filter( 'genesis_attr_nav-footer', 'genesis_attributes_nav' );

add_filter( 'wp_nav_menu_args', __NAMESPACE__ . '\footer_menu_args' );
/**
 * Reduce the footer navigation menu to one level depth.
 *
 * @since  1.0.0
 *
 * @param  array $args Existing footer menu args.
 *
 * @return array Amended footer menu args.
 */
function footer_menu_args( $args ) {

	if ( 'footer' !== $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;
}

add_filter( 'genesis_footer_creds_text', __NAMESPACE__ . '\do_footer_creds' );
/**
 * Change the footer text.
 *
 * @since  1.0.0
 *
 * @return string Footer credentials, as shortcodes.
 */
function do_footer_creds() {
	return 'Copyright [footer_copyright first="2016"] hellofromTonya &middot; All Rights Reserved';
}