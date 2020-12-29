<?php
function dashy_scripts() {
	global $dashy_theme_options;
	/*body  */
    wp_enqueue_style('dashy-body', '//fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap', array(), null);
    /*heading  */
	wp_enqueue_style('dashy-heading-font', '//fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap', array(), null);
	
	wp_enqueue_style('dashy-great-font', '//fonts.googleapis.com/css2?family=Great+Vibes&display=swap', array(), null);

	wp_enqueue_style( 'dashy-allmin', get_template_directory_uri().'/assets/css/all.min.css', array() );

	wp_enqueue_style( 'dashy-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_style_add_data( 'dashy-style-rtl', 'rtl', 'replace' );

	wp_enqueue_script( 'dashy-allmin', get_template_directory_uri() . '/assets/js/all.min.js', array('jquery'), _S_VERSION, true );


	wp_enqueue_script( 'dashy-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'dashy-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dashy_scripts' );