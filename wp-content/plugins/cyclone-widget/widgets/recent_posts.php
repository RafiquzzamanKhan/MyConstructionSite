<?php

// Register and load the widget
function cyclone_recent_posts_load_widget() {
    register_widget( 'cyclone_recent_posts_widget' );
}
add_action( 'widgets_init', 'cyclone_recent_posts_load_widget' );
 
// Creating the widget 
class cyclone_recent_posts_widget extends WP_Widget {
 
    function __construct() {
        parent::__construct(
         
        // Base ID of your widget
        'cyclone_recent_posts_widget', 
         
        // Widget name will appear in UI
        esc_html__( 'Cyclone Recent Posts Widget' , 'cyclone-widget'), 
         
        // Widget description
        array( 'description' => esc_html__( 'Cyclone Recent Posts Widget layout', 'cyclone-widget' ), ) 
        );
    }
 
    // Creating widget front-end
     
    public function widget( $args1, $instance ) {

        echo $args1['before_widget'];
        echo $args1['before_title'] . esc_html__( 'Lastest Posts' , 'cyclone-widget' ) . $args1['after_title']; 
        $selected_recent_post_num = $instance['number_of_recent_posts'];
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $selected_recent_post_num,
            'ignore_sticky_posts' => 1
        );
        
        $popular_posts = new WP_Query( $args );
        if( $popular_posts->have_posts() ): ?>
            <div class="blog-list-widget">
                <div class="list-group">
                    <div class="slider single-item">
                         <?php
                        while( $popular_posts->have_posts() ): $popular_posts->the_post();
                            global $post;
                            $img_url = get_the_post_thumbnail_url( $post->ID, 'thumbnail' );
                                          ?>
                            <div>
                                <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="<?php echo esc_url($img_url); ?>" alt="" class="img-fluid float-left">
                                        <div class="lastest_content">
                                            <h5 class="mb-1 cyclone_recent_widget_title"><?php the_title(); ?></h5>
                                            <small><i class="fa fa-calendar"></i> <?php echo esc_html( get_the_date() ); ?></small>
                                        </div>
                                    </div>
                                </a>
                            </div>         
                            <?php
                        endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
             </div><!-- end blog-list -->
            <?php
        endif;
        ?>
        <?php
        echo $args1['after_widget'];
    }    
    // Widget Backend 
    public function form( $instance ) {

        $recent_selected = !empty($instance['number_of_recent_posts']) ? esc_html( $instance['number_of_recent_posts'] ) : '';
        $recent_posts = !empty( $instance[ 'number_of_recent_posts' ] ) ? esc_html( $instance[ 'number_of_recent_posts' ] ) : '';
        ?>
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
        $instance['number_of_recent_posts'] = ( ! empty($new_instance['number_of_recent_posts'] ) ) ? sanitize_text_field( $new_instance['number_of_recent_posts'] ) : '';
        return $instance;
    }
} // Class wpb_widget ends here