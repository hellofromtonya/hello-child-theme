<?php
/**
 * Theme Runtime Configuration Parameters.
 *
 * These parameters initialize and setup the theme using the Theme Addon in Fulcrum.  You configure what you want
 * here.  Then Fulcrum takes care of calling the corresponding hooks and functions for you.  No need to write the
 * code over and over again, theme-to-them.  Nope, it's modular and DRY this way.
 *
 * @package     Hello
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        http://hellofromtonya.com
 * @license     GNU General Public License 2.0+
 */

namespace Hello;

return array(

	'theme_slug' => 'hello',
	'version'    => CHILD_THEME_VERSION,

	'load_min_stylesheet' => ! fulcrum_is_dev_environment(),

	/*===============================================================================================
	 * There are a lot of things that are not necessarily setup tasks.  These go in here.
	 *=============================================================================================*/
	'init_pre'            => array(

		/*===============================================================================================
		 * Do you have scripts in your theme? Then once you run gulp, they are concatenated and renamed
		 * as jquery.project.js along with a minified version.  You can enqueue them right here by
		 * uncommented this element.
		 *=============================================================================================*/
//		'enqueue_scripts'  => array(
//			'hello_js' => array(
//				'is_script' => true,
//				'handle'    => 'hello_js',
//				'config'    => array(
//					'file'    => get_stylesheet_directory_uri() . '/assets/dist/js/jquery.project.min.js',
//					'deps'    => array( 'jquery' ),
//					'version' => CHILD_THEME_VERSION,
//				),
//			),
//		),

		/*===============================================================================================
		 * Do you want to use Google fonts?  If yes, then uncomment this parameter and then add in
		 * the font families you want.
		 *=============================================================================================*/
		'google_fonts' => array(
			'handle'        => 'hello_google_fonts',
			'font_families' => array(
				'Playfair+Display',
				'Playball',
				'Source+Sans+Pro',
			),
		),

		/*===============================================================================================
		 * Customizing the login form is so easy.  All you need to do is specify a logo and the CSS file
		 * location.  This theme includes a login form stylesheet.  You can customize that file.
		 *=============================================================================================*/
		'login_form'   => array(
			'logo' => CHILD_THEME_URL . '/assets/images/hellofromtonya.jpg',
			'css'  => CHILD_THEME_DIR . '/assets/css/login-form.css',
		),

		/*===============================================================================================
		 * As you storing images in the assets file, you'll need to specify which one is the favicon.
		 *=============================================================================================*/
		'favicon'      => CHILD_THEME_URL . '/assets/images/favicon.jpg',
	),

	/*===============================================================================================
	 * Each of the following configuration parameters is loaded on the `genesis_setup` event hook.
	 * Just follow the instructions to customize your child theme.  Then let Fulcrum do the work for you.
	 *=============================================================================================*/
	'setup'               => array(

		/*===============================================================================================
		 * Genesis has a bunch of preconfigured layouts available for you.  You can unregister them here.
		 * Just comment out the ones you want to keep.
		 *=============================================================================================*/
		'genesis_unregister_layout' => array(
			'content-sidebar',
//			'sidebar-content',
			'content-sidebar-sidebar',
			'sidebar-content-sidebar',
			'sidebar-sidebar-content',
		),

		/*===============================================================================================
		 * We are always adding theme supports to customize our child themes. Right? Well you can configure
		 * them up here instead of having to call `add_theme_support` over and over again.  Fulcrum takes
		 * care of it for you.
		 *
		 * The key is the feature name and the value is what is passed to the `add_theme_support` function.
		 *=============================================================================================*/
		'add_theme_support'         => array(
			'html5'                        => array(
				'caption',
				'comment-form',
				'comment-list',
				'gallery',
				'search-form'
			),
			'genesis-responsive-viewport'  => null,
			'genesis-menus'                => array(
				'primary' => __( 'Main Nav', 'hello' ),
				'footer'  => __( 'Footer Nav', 'hello' ),
			),
			'genesis-structural-wraps'     => array(
				'footer',
				'footer-widgets',
				'header',
				'site-inner',
			),
//			'genesis_footer-widgets'       => 4,
		),

		/*===============================================================================================
		 * Want to add some sidebar widget areas? Excellent. Just configure them up right here.
		 *=============================================================================================*/
		'register_sidebars'            => array(
			array(
				'id'          => 'inpost',
				'name'        => __( 'In Post', 'hello' ),
				'description' => __( 'This is the inpost widget that displays right after the post content.', 'hello' ),
			),
		),

		/*===============================================================================================
		 * Genesis provides two different sidebars.  But maybe you don't want both of them.  You can
		 * unregister them here by adding the name of the sidebar into the array.  Comment it out if you
		 * want the sidebars.
		 *=============================================================================================*/
		'unregister_sidebars'          => array(
//				'sidebar',
			'sidebar-alt',
		),

		/*===============================================================================================
		 * Out-of-the-box, there's an "edit" link on the page (which drives me crazy).  You can
		 * disable it by setting this parameter to true.  If you want it in there, then just comment this
		 * parameter out.
		 *=============================================================================================*/
		'disable_edit_link'            => true,

		/*===============================================================================================
		 * List any of the page templates that you want to remove from the Genesis framework.
		 * In doing so, these templates will no longer appear in the Page templates dropdown
		 * in the back-end.
		 *=============================================================================================*/
		'remove_page_templates'        => array(
			'page_blog.php',
		),

		/*===============================================================================================
		 * If you want to enable shortcodes in
		 * the WordPress default text widget, then
		 * set this parameter to 'true'.
		 *=============================================================================================*/
		'do_shortcodes_in_text_widget' => true,

		/*========================================
		 * Add image sizes by specifying an array containing
		 * each image size you want to add into the site.
		 *
		 * For more information on what the parameters are
		 * @link https://developer.wordpress.org/reference/functions/add_image_size/
		 *=============================================================================================*/
//			'add_image_size'               => array(
//				'name' => array(
//					'width'  => 0,
//					'height' => 0,
//					'crop'   => false,
//				),
//			),
	),

);
