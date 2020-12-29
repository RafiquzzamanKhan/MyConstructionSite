<?php
/**
 * dashy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dashy
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'dashy_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dashy_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on dashy, use a find and replace
		 * to change 'dashy' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'dashy', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'dashy' ),
				'footer-menu' => esc_html__( 'Footer','dashy' )
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'dashy_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

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
		add_theme_support( 'align-wide' );
	}
endif;
add_action( 'after_setup_theme', 'dashy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dashy_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'dashy_content_width', 640 );
}
add_action( 'after_setup_theme', 'dashy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dashy_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'dashy' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dashy' ),
			'before_widget' => '<section id="%1$s" class="widget sidebar-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="sidebar-title"><h3 class="widget-title">',
			'after_title'   => '</h3></div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer1', 'dashy' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'dashy' ),
			'before_widget' => '<section id="%1$s" class="widget sidebar-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="sidebar-title"><h3 class="widget-title">',
			'after_title'   => '</h3></div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer2', 'dashy' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'dashy' ),
			'before_widget' => '<section id="%1$s" class="widget sidebar-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="sidebar-title"><h3 class="widget-title">',
			'after_title'   => '</h3></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer3', 'dashy' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'dashy' ),
			'before_widget' => '<section id="%1$s" class="widget sidebar-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="sidebar-title"><h3 class="widget-title">',
			'after_title'   => '</h3></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer4', 'dashy' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'dashy' ),
			'before_widget' => '<section id="%1$s" class="widget sidebar-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="sidebar-title"><h3 class="widget-title">',
			'after_title'   => '</h3></div>',
		)
	);
}
add_action( 'widgets_init', 'dashy_widgets_init' );





// load all core requirements
require get_template_directory() . '/ripplethemes/ripplecore.php';
