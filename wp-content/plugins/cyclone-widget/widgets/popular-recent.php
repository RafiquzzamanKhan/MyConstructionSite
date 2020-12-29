<?php

// Register and load the widget
function cyclone_recent_popular_load_widget() {
    register_widget( 'cyclone_recent_popular_posts_widget' );
}
add_action( 'widgets_init', 'cyclone_recent_popular_load_widget' );
 
// Creating the widget 
class cyclone_recent_popular_posts_widget extends WP_Widget {
 
    function __construct() {
        parent::__construct(
         
        // Base ID of your widget
        'cyclone_recent_popular_posts_widget', 
         
        // Widget name will appear in UI
        esc_html__( 'Cyclone Widget Popular Recent Comment' , 'cyclone-widget'), 
         
        // Widget description
        array( 'description' => esc_html__( 'Layout Cyclone Widget Popular Recent Comment', 'cyclone-widget' ), ) 
        );
    }
 
    // Creating widget front-end
     
    public function widget( $args1, $instance ) {
        echo $args1['before_widget'];
        ?>
            <!-- tab section start -->
            <ul class="cyclone-tabs" role="tablist">
                <li role="presentation" class="active" id="popular_tab"><a href="javascript:void(0)" aria-controls="home" role="tab" data-toggle="tab"><?php esc_html_e( 'Popular' , 'cyclone-widget' ); ?></a></li>
                <li role="presentation" id="recent_tab"><a href="javascript:void(0)" aria-controls="profile" role="tab" data-toggle="tab"><?php esc_html_e( 'Recent' , 'cyclone-widget' ); ?></a></li>
                <li role="presentation" id="comment_tab"><a href="javascript:void(0)" aria-controls="messages" role="tab" data-toggle="tab"><?php esc_html_e( 'Comments' , 'cyclone-widget' ); ?></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="cyclone-post-widget">
                <div role="tabpanel" class="cyclone-post-widget-wrapper" id="home">
                    <?php
                    $selected_pop_post_num = $instance['number_of_popular_posts'];
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => $selected_pop_post_num,
                        'meta_key' => 'post_views',
                        'orderby' => 'meta_value_num',
                    );

                    $popular_posts = new WP_Query( $args );
                    if( $popular_posts->have_posts() ):
                        while( $popular_posts->have_posts() ): $popular_posts->the_post();
                            global $post;
                            $comments_count = wp_count_comments($post->ID);
                            ?>
                            <div class="item-list">
                                <?php 
                                if( has_post_thumbnail() ){ ?>
                                    <article class="widget_post_thumnail">
                                        <a href="<?php the_permalink(); ?>">
                                        <?php
                                            the_post_thumbnail( 'thumbnail' );
                                            $no_image = false;
                                        ?>
                                        </a>
                                    </article>
                                    <?php 
                                } else {
                                    $no_image = true;
                                }
                                ?>
                                <article class="<?php echo ( $no_image ? "no_thumbnail_post" : "widget_post_title" ); ?>">
                                    <h5><a href="<?php the_permalink(); ?>"><?php echo esc_html(wp_trim_words( get_the_title(), 8, '...' )); ?></a></h5>
                                    <span><a href="<?php echo esc_url(home_url()); ?>/<?php echo date( 'Y/m' , strtotime( get_the_date() ) ); ?>"><i class="fa fa-calendar"></i><?php echo esc_html( get_the_date() ); ?></a>  | <a href="<?php the_permalink(); ?>/#respond"><i class="fa fa-comments"></i><?php echo esc_html($comments_count->total_comments); ?></a></span>
                                </article>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
                <div role="tabpanel" class="cyclone-post-widget-wrapper" id="profile">
                    <?php
                    $selected_recent_post_num = $instance['number_of_recent_posts'];
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => $selected_recent_post_num,
                        'ignore_sticky_posts' => 1
                    );
                    
                    $popular_posts = new WP_Query( $args );
                    if( $popular_posts->have_posts() ):
                        while( $popular_posts->have_posts() ): $popular_posts->the_post();
                            $comments_count = wp_count_comments($post->ID);                   
                            ?>
                            <div class="item-list">
                                <?php 
                                if( has_post_thumbnail() ){?>
                                    <article class="widget_post_thumnail">
                                        <a href="<?php the_permalink(); ?>">
                                        <?php             
                                            the_post_thumbnail( 'thumbnail' );
                                            $no_image1 = false;
                                        ?>
                                        </a>
                                    </article>
                                    <?php
                                } else {
                                    $no_image1 = true;
                                }
                                ?>
                                <article class="<?php echo( $no_image1 ? "no_thumbnail_post" : "widget_post_title"); ?>">
                                    <h5>
                                        <a href="<?php the_permalink(); ?>"><?php echo esc_html(wp_trim_words( get_the_title(), 8, '...' ));?></a>
                                    </h5>
                                    <span>
                                        <a href="<?php echo esc_url(home_url()); ?>/<?php echo date( 'Y/m' , strtotime( get_the_date() ) ); ?>"><i class="fa fa-calendar"></i><?php echo esc_html( get_the_date() ); ?></a>  | <a href="<?php the_permalink(); ?>/#respond"><i class="fa fa-comments"></i><?php echo esc_html($comments_count->total_comments); ?></a>
                                    </span>
                                </article>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
                
                <div role="tabpanel" class="tab-pane" id="messages">
                    <?php
                    $args = array(
                        'status' => 'approve',
                        'number' => '3',
                    );
                    $comments = get_comments($args);
                    foreach($comments as $comment) :
                        ?>
                        <div class="item-list">
                            <article class="posted_comments">
                                <div class="wrap"><?php echo esc_html($comment->comment_author); ?></div>
                                    <p><span class="comment_on">on</span><a href="<?php echo esc_url(get_comment_link($comment)); ?>"><?php echo ' ' . esc_html(get_the_title( $comment->comment_post_ID)); ?></a></p>
                            </article>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <!-- </article> -->
            <!-- tab section end -->
        <?php
        echo $args1['after_widget'];
    }    
    // Widget Backend 
    public function form( $instance ) {

        $popular_selected = !empty($instance['number_of_popular_posts']) ? sanitize_text_field( $instance['number_of_popular_posts'] ) : '';
        $recent_selected = !empty($instance['number_of_recent_posts']) ? sanitize_text_field( $instance['number_of_recent_posts'] ) : '';
        $popular_posts = !empty( $instance[ 'number_of_popular_posts' ] ) ?  sanitize_text_field( $instance[ 'number_of_popular_posts' ] ) : '';
        $recent_posts = !empty( $instance[ 'number_of_recent_posts' ] ) ? sanitize_text_field( $instance[ 'number_of_recent_posts' ] ) : '';
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number_of_popular_posts' ) ); ?>"><?php esc_html_e( 'Select number of popular posts:' , 'cyclone-widget' ); ?></label> 
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number_of_popular_posts' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_of_popular_posts' ) ); ?>">
                <?php
                cyclone_custom_widget_drop_down_limit(10,$popular_selected);
                ?>               
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number_of_recent_posts' ) ); ?>"><?php esc_html_e( 'Select number of recent posts:' , 'cyclone-widget' ); ?></label> 
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number_of_recent_posts' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_of_recent_posts' ) ); ?>">
                <?php
                cyclone_custom_widget_drop_down_limit(10,$recent_selected);
                ?>               
            </select>
        </p>
        <?php        
    }
     
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['number_of_popular_posts'] = ( ! empty( $new_instance['number_of_popular_posts'] ) ) ? sanitize_text_field( $new_instance['number_of_popular_posts'] ) : '';
        $instance['number_of_recent_posts'] = ( ! empty($new_instance['number_of_recent_posts'] ) ) ? sanitize_text_field( $new_instance['number_of_recent_posts'] ) : '';
        return $instance;
    }
} // Class wpb_widget ends here