<?php

function travelers_blog_getPostViews($postID){
    $count_key = esc_html__('post_views_count','travelers-blog');
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return esc_html__('0 View','travelers-blog');
    }
    return esc_html__($count.' Views','travelers_blog');
}

function travelers_blog_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

add_action( 'travelers_blog_before_title_detail_page', 'travelers_blog_show_post_count' );

function travelers_blog_show_post_count($post_id){ 

    $travelers_blog_show_hide_count = get_theme_mod('show_hide_count'); 

    if( $travelers_blog_show_hide_count ) : ?>
 
    	<a class="tag tag-blue tag-black">
            <i class="fa fa-eye"></i>
            <?php 
            echo esc_html(travelers_blog_getPostViews( $post_id )); 
            ?>
        </a>

        <?php

    endif; 
    
}

add_action( 'travelers_blog_before_body', 'travelers_blog_set_view_count' );
function travelers_blog_set_view_count( $post_id ){
    travelers_blog_setPostViews( $post_id ); 
}