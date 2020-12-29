<?php
/* 
loading all core theme setting
* @since 1.0.0
*/


// load custom css and javascript
require get_template_directory() . '/ripplethemes/enqueue.php';

/**
 * 
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/ripplethemes/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/ripplethemes/template-tags.php';

/**
 * Template functions for theme.
 */
require get_template_directory() . '/ripplethemes/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/ripplethemes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/ripplethemes/jetpack.php';
}


// breadcrumbs setting
require get_template_directory() . '/ripplethemes/breadcrumbs/breadcrumbs.php';


// custom category control
require get_template_directory() . '/ripplethemes/customizer-settings/customizer-category-control.php';

// Widgets
require get_template_directory() . '/ripplethemes/widgets/sidebar-author-widget.php';
require get_template_directory() . '/ripplethemes/widgets/recent-widgets.php';


// Load all Hooks
require get_template_directory() . '/ripplethemes/hooks/otherspost.php';
require get_template_directory() . '/ripplethemes/hooks/socialicons.php';
require get_template_directory() . '/ripplethemes/hooks/breadcrumb.php';
require get_template_directory() . '/ripplethemes/hooks/related-post.php';
require get_template_directory() . '/ripplethemes/hooks/social-share.php';
require get_template_directory() . '/ripplethemes/hooks/categorysection.php';




// tgm
require get_template_directory() . '/ripplethemes/TGM-Plugin-Activation/tgm.php';







