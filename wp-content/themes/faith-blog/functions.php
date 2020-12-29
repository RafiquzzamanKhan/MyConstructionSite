<?php
/**
 * faith_blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package faith based blog
 */
if ( ! function_exists( 'faith_blog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function faith_blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on faith_blog, use a find and replace
		 * to change 'faith-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'faith-blog', get_template_directory() . '/languages' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'faith-blog-thumbnail-mobile', 350, 350, true );
		add_image_size( 'faith-blog-list-thumbnail', 380, 360, true );
		add_image_size( 'faith-blog-grid-thumbnail', 380, 320, true );
		add_image_size( 'faith-blog-thumbnail-medium', 770, 433.13, true );
		add_image_size( 'faith-blog-thumbnail-large', 1200, 675, true );
		add_image_size( 'faith-blog-thumbnail-featured', 930, 650, true );
		add_image_size( 'faith-blog-header-full', 1920, 1080, true );
		add_image_size( 'faith-blog-latest-post-widget-thumb', 120, 120, true );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__( 'Primary', 'faith-blog' ),
				'footer-menu' => esc_html__( 'Footer Menu', 'faith-blog' ),
			)
		);
		add_theme_support( 'woocommerce' );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters(
				'faith_blog_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'editor-styles' );
		add_theme_support( 'wp-block-styles' );
		add_editor_style('css/bootstra.css');
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		// This variable is intended to be overruled from themes.
		// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		$GLOBALS['content_width'] = apply_filters( 'faith_blog_content_width', 640 );
	}
endif;
add_action( 'after_setup_theme', 'faith_blog_setup' );


/**
 * Register widgets
 */
require get_template_directory() . '/inc/register-widgets.php';
/**
 * Enqueue scripts
 */
require get_template_directory() . '/inc/enqueue-scripts.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * faith_blog Comment Template.
 */
require get_template_directory() . '/inc/comment-template.php';

/**
 * faith_blog sanitize functions.
 */
require get_template_directory() . '/inc/sanitize-functions.php';

/**
 * Checkout Fields
 */
require get_template_directory() . '/inc/checkout-fields.php';
/**
 * Recent Post Widget
 */
require get_template_directory() . '/inc/widgets/recent-post.php';
/**
 * TGM plugin Activation
 */
require get_template_directory() . '/inc/tgm/required-plugin.php';

if (class_exists('woocommerce')) {
	require get_template_directory() . '/inc/woocommerce-modification.php';
}
