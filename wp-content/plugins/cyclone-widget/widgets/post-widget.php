<?php

// Register and load the widget
function cyclone_post_load_widget() {
    register_widget( 'cyclone_custom_post_widget' );
}
add_action( 'widgets_init', 'cyclone_post_load_widget' );
 
// Creating the widget 
class cyclone_custom_post_widget extends WP_Widget {
 
    function __construct() {
        parent::__construct(
         
        // Base ID of your widget
        'cyclone_custom_post_widget', 
         
        // Widget name will appear in UI
        esc_html__( 'Cyclone Custom Post Widget' , 'cyclone-widget'), 
         
        // Widget description
        array( 'description' => esc_html__( 'Custom Post Widget Layout', 'cyclone-widget' ), ) 
        );
    }
 
    // Creating widget front-end
     
    public function widget( $args1, $instance ) {
        echo $args1['before_widget'];
        $post_thumnail = $instance['your_checkbox_var'];
        $hide_show_date = $instance[ 'hide_show_date' ];
        echo $args1['before_title'] . esc_html( $instance['title'] ) . $args1['after_title'];
        ?>
        <div class="cyclone-post-widget">
            <div class="cyclone-post-widget-wrapper" >
                <?php
                $selected_pop_post_num = $instance['number_of_popular_posts'];
                $post_orderby = $instance['post_orderby'];
                $orderby = $post_orderby == 'rand' ? 'rand' : 'date';
                $meta_key = $post_orderby == 'meta_value_num' ? 'post_views' : '';
                // echo $orderby;
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => $selected_pop_post_num,
                    'meta_key' =>  $meta_key,
                    'orderby' => $orderby,
                    'order' => $post_orderby,
                    'ignore_sticky_posts' => 1
                );

                $popular_posts = new WP_Query( $args );
                if( $popular_posts->have_posts() ):
                    while( $popular_posts->have_posts() ): $popular_posts->the_post();
                        global $post;
                        $comments_count = wp_count_comments($post->ID);
                        ?>
                        <div class="item-list">
                            <?php 
                            if( $post_thumnail == 'on' ): ?>
                                <article class="widget_post_thumnail">
                                    <a href="<?php the_permalink(); ?>">
                                    <?php
                                    the_post_thumbnail( 'thumbnail' );
                                    ?>
                                    </a>
                                </article>
                                <?php 
                            endif;
                            ?>
                            <article class="<?php echo ( $post_thumnail == 'on' && has_post_thumbnail() ? "widget_post_title" : "no_thumbnail_post" ); ?>">
                                <h5><a href="<?php the_permalink(); ?>"><?php echo esc_html(wp_trim_words( get_the_title(), 8, '...' )); ?></a></h5>
                                <span>
                                    <?php if( $hide_show_date == 'on' ): ?>
                                        <a href="<?php echo esc_url(home_url()); ?>/<?php echo date( 'Y/m' , strtotime( get_the_date() ) ); ?>"><i class="fa fa-calendar"></i><?php echo esc_html( get_the_date() ); ?></a> | 
                                    <?php endif;?>
                                      <a href="<?php the_permalink(); ?>#respond"><i class="fa fa-comments"></i><?php echo esc_html($comments_count->total_comments); ?></a></span>
                            </article>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    <?php
    echo $args1['after_widget'];
    }    
    // Widget Backend 
    public function form( $instance ) {

        $title = !empty( $instance[ 'title' ] ) ? esc_html( $instance[ 'title' ] ) : '';
        $popular_posts = !empty( $instance[ 'number_of_popular_posts' ] ) ? esc_html( $instance[ 'number_of_popular_posts' ] ) : '';
        $your_checkbox_var = !empty($instance[ 'your_checkbox_var' ]) ? 'on' : '';
        $hide_show_date = !empty($instance[ 'hide_show_date' ]) ? 'on' : '';
        $selected = !empty($instance['post_orderby']) ? esc_html( $instance['post_orderby'] ) : 'ASC';
        ?>
         <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Widget Title:' , 'cyclone-widget' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' , 'cyclone-widget' )); ?>" type="text" value="<?php echo esc_attr( $title , 'cyclone-widget' ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number_of_popular_posts' ) ); ?>"><?php esc_html_e( 'Select number of posts:' , 'cyclone-widget' ); ?></label> 
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number_of_popular_posts' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_of_popular_posts' ) ); ?>">
                <?php
                cyclone_custom_widget_drop_down_limit(10,$popular_posts);
                ?>               
            </select>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'post_orderby' ) ); ?>"><?php esc_html_e( 'Orderby:' , 'cyclone-widget' ); ?></label> 
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'post_orderby' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_orderby' ) ); ?>">

                <option value="ASC" <?php selected($selected, 'ASC'); ?>><?php esc_html_e( 'ASC' , 'cyclone-widget' ) ?></option>
                <option value="DESC" <?php selected($selected, 'DESC'); ?>><?php esc_html_e( 'DESC' , 'cyclone-widget' ) ?></option>
                <option value="rand" <?php selected($selected, 'rand'); ?>><?php esc_html_e( 'Rand' , 'cyclone-widget' ) ?></option>
                <option value="meta_value_num" <?php selected($selected, 'meta_value_num'); ?>><?php esc_html_e( 'Popular' , 'cyclone-widget' ) ?></option>      

            </select>
        </p>

        <p>
            <input class="checkbox your_checkbox_var" type="checkbox" <?php checked( $your_checkbox_var, 'on' ); ?> id="<?php echo $this->get_field_id( 'your_checkbox_var' ); ?>" name="<?php echo $this->get_field_name( 'your_checkbox_var' ); ?>" /> <?php esc_html_e( 'Shows Post Thumbnail' , 'cyclone-widget' ) ?>
        </p>

        <p>
            <input class="checkbox hide_show_date" type="checkbox" <?php checked( $hide_show_date, 'on' ); ?> id="<?php echo $this->get_field_id( 'hide_show_date' ); ?>" name="<?php echo $this->get_field_name( 'hide_show_date' ); ?>" /> <?php esc_html_e( 'Shows Posts Date' , 'cyclone-widget' ) ?>
        </p>
        <?php        
    }
     
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();

        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

        $instance['number_of_popular_posts'] = ( ! empty( $new_instance['number_of_popular_posts'] ) ) ? sanitize_text_field( $new_instance['number_of_popular_posts'] ) : '';

        $instance['post_orderby'] = ( ! empty( $new_instance['post_orderby'] ) ) ? sanitize_text_field( $new_instance['post_orderby'] ) : '';

        $instance[ 'your_checkbox_var' ] =  !empty( $new_instance[ 'your_checkbox_var' ] ) ? sanitize_text_field( $new_instance[ 'your_checkbox_var' ] ) : '';

        $instance[ 'hide_show_date' ] = !empty( $new_instance[ 'hide_show_date' ] ) ? sanitize_text_field( $new_instance[ 'hide_show_date' ] ) : '';

        return $instance;
    }
} // Class wpb_widget ends here