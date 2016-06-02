<?php
/**
 * Comments structure customization.
 *
 * @package     Hello\Structure
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        http://hellofromtonya.com/blog
 * @license     GNU General Public License 2.0+
 */
namespace Hello\Structure;

add_filter( 'comment_form_defaults', __NAMESPACE__ . '\customize_comments_form_defaults' );
function customize_comments_form_defaults( $parameters ) {
	$parameters['title_reply'] = __( 'What do you think?', 'hello' );



	return $parameters;
}