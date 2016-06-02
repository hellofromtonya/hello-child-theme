<?php

/**
 * Header structure customization.
 *
 * Put your header structure customization stuff in here.
 *
 * @package     Hello\Structure
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        http://hellofromtonya.com/blog
 * @license     GNU General Public License 2.0+
 */
namespace Hello\Structure;

add_action( 'genesis_before', __NAMESPACE__ . '\render_fullpage_menu_container' );
/**
 * Render the full page menu container right after the `<body>` tag.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_fullpage_menu_container() {
	include( 'views/menu-container.php' );
}

add_action( 'genesis_header_right', __NAMESPACE__ . '\render_hamburger_into_header_nav' );
/**
 * Render the hamburger into header right.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_hamburger_into_header_nav() {
	include( 'views/header-nav.php' );
}

remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
add_action( 'genesis_site_title', __NAMESPACE__ . '\render_site_title_area' );
/**
 * Render out the site title area HTML.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_site_title_area() {
	$url = trailingslashit( home_url() );
	
	include( 'views/site-title.php' );
}
