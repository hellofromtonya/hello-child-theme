<?php
/**
 * Description
 *
 * @package     Hello\Functions
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        http://hellofromtonya.com
 * @license     GNU General Public License 2.0+
 */
namespace Hello\Functions;

add_filter( 'genesis_attr_taxonomy-archive-description', __NAMESPACE__ . '\add_fullpage_title_to_attributes', 20 );
add_filter( 'genesis_attr_entry-title', __NAMESPACE__ . '\add_fullpage_title_to_attributes', 20 );
/**
 * Add the `fullpage-title` class attribute
 *
 * @since 1.0.0
 *
 * @param array $attributes Existing attributes.
 *
 * @return array Amended attributes.
 */
function add_fullpage_title_to_attributes( array $attributes ) {
	if ( doing_filter( 'genesis_attr_entry-title' ) && ! is_single() ) {
		return $attributes;
	}

	$attributes['class'] .= ' fullpage-title';

	return $attributes;

}