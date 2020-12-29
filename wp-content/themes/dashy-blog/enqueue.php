<?php
function dashy_script() {

    // wp_enqueue_style('dashy_test_font', 'url', array(), null);
    global $dashy_theme_options;
	/*body  */
    wp_enqueue_style('dashy_body_font', '//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;0,800;1,400;1,600;1,700;1,800&display=swap', array(), null);
    /*heading  */
	wp_enqueue_style('dashy_heading_font', '//fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap', array(), null);
	
}
add_action( 'wp_enqueue_scripts', 'dashy_script' );