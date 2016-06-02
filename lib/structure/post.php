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

remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
add_action( 'genesis_entry_header', 'genesis_post_info', 8 );
add_filter( 'genesis_post_info', __NAMESPACE__ . '\date_only_for_post_info' );
/**
 * Change the post info to only display the little ole date.
 *
 * @since 1.0.0
 *
 * @return string
 */
function date_only_for_post_info() {
	return '[post_date] | [post_categories before=""]';
}

remove_all_actions('genesis_entry_footer');

add_action( 'genesis_entry_header', __NAMESPACE__ . '\render_post_featured_image', 11 );
/**
 * Render out the post's featured image on singles.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_post_featured_image() {
	if ( ! is_single() ) {
		return;
	}

	the_post_thumbnail( 'full' );
}

add_filter( 'the_content_more_link', __NAMESPACE__ . '\change_the_read_more_link' );
add_filter( 'get_the_content_more_link', __NAMESPACE__ . '\change_the_read_more_link' );
/**
 * Change the Read More Link HTML Markup and content.
 *
 * @since 1.0.0
 *
 * @param string $html
 *
 * @return string
 */
function change_the_read_more_link( $html ) {
	$html = change_read_more_text( $html, __( 'Continue reading', 'hello' ) );

	if ( doing_filter( 'get_the_content_more_link' ) ) {
		$html = strip_off_read_more_opening_dots( $html );
		return '</p><p>' . $html;
	}

	return sprintf( '<p>%s</p>', $html );
}

/**
 * Strips off the read more link's opening dot pattern.
 *
 * @since 1.0.0
 *
 * @param string $html
 * @param string $dots Dots pattern to strip off
 *
 * @return string
 */
function strip_off_read_more_opening_dots( $html, $dots = '&#x02026; ' ) {
	return substr( $html, strlen( $dots ) );
}

/**
 * Replace the read more text from the Genesis default text of '[Read more...]' to
 * the new specified replacement text.
 *
 * @since 1.0.0
 *
 * @param string $html Read more link HTML
 * @param string $replacement_text Replacement text
 *
 * @return string
 */
function change_read_more_text( $html, $replacement_text ) {
	$text_to_replace = __( '[Read more...]', 'hello' );

	return str_replace( $text_to_replace, $replacement_text, $html );
}

add_action( 'genesis_after_entry', __NAMESPACE__ . '\add_post_prev_next_to_singles', 9 );
/**
 * Add Prev/Next to bottom of the singles.
 *
 * @since 1.0.0
 *
 * @param string $post_type
 *
 * @return void
 */
function add_post_prev_next_to_singles() {
	if ( ! is_single() ) {
		return;
	}

	$previous = get_previous_post();
	$next = get_next_post();

	include( 'views/single-navigation.php' );
}

add_action( 'genesis_after_entry', __NAMESPACE__ . '\render_inpost_widget_area', 7 );
/**
 * Description.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_inpost_widget_area() {
	if ( ! is_single() ) {
		return;
	}

	genesis_widget_area( 'inpost', array(
		'before' => '<div class="inpost"><div class="wrap">',
		'after'  => '</div></div>',
	) );
}
