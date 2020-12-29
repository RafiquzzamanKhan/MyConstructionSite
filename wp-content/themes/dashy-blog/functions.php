<?php
/* Write your awesome functions below */

register_sidebar(
    array(
        'name'          => esc_html__( 'Featured Posts Widgets Area', 'dashy-blog' ),
        'id'            => 'featured_posts',
        'description'   => esc_html__( 'Add widgets here.', 'dashy-blog' ),
        'before_widget' => '<section id="%1$s" class="widget sidebar-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="sidebar-title"><h3 class="widget-title">',
        'after_title'   => '</h3></div>',
    )
);


require get_stylesheet_directory() . '/widgets/featured.php';
require get_stylesheet_directory().'/enqueue.php';




