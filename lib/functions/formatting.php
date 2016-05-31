<?php

/**
 * Formatting
 *
 * @package     Hello\Functions
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        http://hellofromtonya.com/blog
 * @license     GNU General Public License 2.0+
 */
namespace Hello\Functions;

add_filter( 'genesis_breadcrumb_args', __NAMESPACE__ . '\change_breadcrumb_default_prefixes' );
/**
 * Change the breadcrumb default prefixes.
 *
 * @since 1.0.0
 *
 * @param array $defaults
 *
 * @return array
 */
function change_breadcrumb_default_prefixes( array $defaults ) {
	$defaults['labels']['tax']       = '';
	$defaults['labels']['post_type'] = '';

	return $defaults;
}

//add_filter( 'get_the_content_more_link', __NAMESPACE__ . '\modify_the_content_more_link', 10, 2 );
/**
 * Modify the content more_link.
 *
 * @since 1.0.0
 *
 * @param string $html
 * @param string $more_link_text
 *
 * @return string
 */
function modify_the_content_more_link( $html, $more_link_text ) {
	$html = str_replace( '&#x02026; ', '<p>', $html );
	$html = str_replace( '</a>', '</a></p>', $html );
	$html = str_replace( $more_link_text, 'Learn more', $html );

	return $html;
}
