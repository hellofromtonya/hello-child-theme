<?php
/**
 * Post structure customization.
 *
 * @package     Hello\Structure
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        http://hellofromtonya.com/blog
 * @license     GNU General Public License 2.0+
 */

namespace Hello\Structure;

add_action( 'genesis_setup', __NAMESPACE__ . '\unregister_post_structures' );
/**
 * Unregister all of the archive events.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_post_structures() {
	// Remove Genesis archive pagination (Genesis pagination settings still apply).
	remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );

	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
}

add_action( 'genesis_before_loop', __NAMESPACE__ . '\change_breadcrumb_from_single_posts', 1 );
/**
 * Let's remove the breadcrumb from single posts, as it's just not needed
 * (and frankly it's darn confusing with the terms in it).
 *
 * @since 1.0.0
 *
 * @return void
 */
function change_breadcrumb_from_single_posts() {
	if ( ! is_single() || get_post_type() != 'post' ) {
		return;
	}

	remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
}

add_filter( 'genesis_noposts_text', '__return_empty_string' );

/**
 * Add Prev/Next to bottom of the singles.
 *
 * @since 1.0.0
 *
 * @param string $post_type
 *
 * @return void
 */
function add_post_prev_next_to_singles( $post_type ) {
	if ( ! is_single() || ! in_array( $post_type, array( 'post', 'lab' ) ) ) {
		return;
	}

	$previous = get_previous_post();
	$next = get_next_post();

	include( __DIR__ . '/views/single-navigation.php' );
}
