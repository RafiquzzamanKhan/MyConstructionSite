<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function faith_blog_widgets_init() {
	/**
	 * Main Sidebar
	 */
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'faith-blog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'faith-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="title-parent"><h4 class="widget-title">',
			'after_title'   => '</h4></div>',
		)
	);
	/**
	 * Sidebar Footer 1
	 */
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'faith-blog' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'faith-blog' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h4>',
			'after_title'   => '</h4></div>',
		)
	);
	/**
	 * Sidebar Footer 2
	 */
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'faith-blog' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'faith-blog' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h4>',
			'after_title'   => '</h4></div>',
		)
	);
	/**
	 * Sidebar Footer 3
	 */
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'faith-blog' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'faith-blog' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h4>',
			'after_title'   => '</h4></div>',
		)
	);
	/**
	 * Sidebar Footer 4
	 */
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'faith-blog' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'faith-blog' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h4>',
			'after_title'   => '</h4></div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Woocommerce Sidebar', 'faith-blog' ),
			'id'            => 'woocommerce-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'faith-blog' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="title-parent"><h4 class="widget-title">',
			'after_title'   => '</h4></div>',
		)
	);
}
add_action( 'widgets_init', 'faith_blog_widgets_init' );