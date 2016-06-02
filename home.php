<?php

/**
 * Posts Page template
 *
 * I'm doing a template here because I want to grab the contents from the page and display
 * it at the top as a greeting to welcome visitors.
 *
 * @package     Hello\Functions
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        http://hellofromtonya.com/blog
 * @license     GNU General Public License 2.0+
 */

namespace Hello;

add_action( 'genesis_before_content_sidebar_wrap', __NAMESPACE__ . '\render_contents' );
/**
 * Render the contents out to the browser.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_contents() {
	$page_for_posts = get_page_for_posts();
	if ( ! $page_for_posts ) {
		return;
	}
	$contents = prepare_contents_for_render( $page_for_posts );
	$title    = get_the_title( $page_for_posts );

	include( 'lib/views/posts-page.php' );
}
/**
 * Get the page for posts object
 *
 * @since 1.0.0
 *
 * @return WP_Post|null
 */
function get_page_for_posts() {
	$post_id = get_option( 'page_for_posts' );
	
	return get_post( $post_id );
}
/**
 * Prepare the contents for rendering, which includes sanitizing it,
 * since it's not running through filtering, and running the shortcodes.
 *
 * @since 1.0.0
 *
 * @param \WP_Post $page_for_posts Post object
 *
 * @return string Returns the clean HTML
 */
function prepare_contents_for_render( \WP_Post $page_for_posts ) {
	$content = wp_kses_post( $page_for_posts->post_content );
	$content = do_shortcode( $page_for_posts->post_content );
	
	return wpautop( $content );
}

genesis();