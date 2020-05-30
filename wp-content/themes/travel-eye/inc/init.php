<?php
/**
 * Load required files.
 *
 * @package Travel_Eye
 */

/**
 * Include default theme options.
 */
require_once get_template_directory() . '/inc/customizer/default.php';

/**
 * Load helpers.
 */
require_once get_template_directory() . '/inc/helper/common.php';
require_once get_template_directory() . '/inc/helper/options.php';

/**
 * Load theme core functions.
 */
require_once get_template_directory() . '/inc/core.php';

/**
 * Load hooks.
 */
require_once get_template_directory() . '/inc/hook/structure.php';
require_once get_template_directory() . '/inc/hook/basic.php';
require_once get_template_directory() . '/inc/hook/custom.php';
require_once get_template_directory() . '/inc/hook/css.php';

/**
 * Load metabox.
 */
require_once get_template_directory() . '/inc/metabox.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Load TGM pluin activation file.
 */
require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/hook/tgm.php';

/**
 * Load Site Origin Bundle Hooks.
 */
require_once get_template_directory() . '/inc/hook/so-widgets.php';

/**
 * Load Site Origin Prebuilt Hooks.
 */
require_once get_template_directory() . '/inc/hook/builder-layouts.php';

/**
 * Load Theme SO Widgets.
 */
if ( class_exists( 'SiteOrigin_Widget' ) ) {

	// Theme widgets.
	$theme_widgets = array(
		'title',
		'team',
		'address',
		'social',
		'latest-news',
		'featured-trips',
		'booking-form',
		'advance-image-grid',
	);

	$template_dir = get_template_directory();

	foreach ( $theme_widgets as $widget ) {

		require_once $template_dir . '/inc/so-widgets/' . $widget . '/' . $widget . '.php';

	}
}
