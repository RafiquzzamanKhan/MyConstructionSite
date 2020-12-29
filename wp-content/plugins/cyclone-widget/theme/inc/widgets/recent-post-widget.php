<?php
    class Travelers_Blog_Show_Recent extends WP_Widget {

    function __construct() {
        parent::__construct('Travelers_Blog_Show_Recent',esc_html__('Travelers Blog Recent Posts', 'travelers-blog'), 
        array( 'description' => esc_html__( 'Display recent posts', 'travelers-blog' ) ) );
    }

    public function widget( $args, $instance ) {

        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        } 

        $title = !empty( $instance['title'] ) ? $instance['title'] : '';
        $number_of_posts = !empty( $instance['number_of_posts'] ) ? $instance['number_of_posts'] : '';

        $travelers_blog_args = array(
            'post_type'=> 'post',
            'post_status' => 'publish',
            'order'    => 'DESC',
            'ignore_sticky_posts' => 1,
            'posts_per_page' =>$number_of_posts
        );

        $travelers_blog_result = new WP_Query( $travelers_blog_args );

        if ( $travelers_blog_result-> have_posts() ) : ?>

            <div class="widget clearfix">
        
                <?php 
                if(!empty($title)) :  ?>
                    <h2 class="widget-title"><?php echo esc_html($title); ?></h2>
                    <?php 
                endif; ?>
              
                <?php 

                while ( $travelers_blog_result->have_posts() ) : $travelers_blog_result->the_post(); 
                    
                    global $post;
                    $travelers_blog_pageID = $post->ID; ?>

                    <div class="recent-item">

                        <?php 
                        if(has_post_thumbnail()) { ?>
                  
                            <div class="recent-image">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </div>
                            <?php 
                            $travelers_blog_class = "recent-content"; 
                        } else { 

                            $travelers_blog_class = "recent-content recent-content-text"; 

                        } ?>

                        <div class="<?php echo esc_attr($travelers_blog_class); ?>">
                    
                            <?php travelers_blog_get_first_category(); ?>

                            <h4>
                                <a class="heading-styl" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        
                                <?php

                                if( has_post_thumbnail() ) {
                                    $travelers_blog_len = 35;
                                } else {
                                    $travelers_blog_len = 70;
                                }

                                travelers_blog_truncated_title_len($travelers_blog_pageID,$travelers_blog_len); ?>
                                </a>
                            </h4>

                        </div>

                        <div class="author-detail content-styl">
                            <?php travelers_blog_get_author_detail(); ?>
                        </div>
                
                    </div>

                    <?php 

                endwhile; ?>

            </div>

            <?php

        endif; 

        wp_reset_postdata(); 

    }

    // Widget Backend 
    public function form( $instance ) {

        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = esc_html__( 'Recent Posts', 'travelers-blog' );
        }

        $number_of_posts = ( ! empty($instance['number_of_posts'])) ? $instance['number_of_posts'] : "4";
        ?>


        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
                <?php esc_html_e('Title:','travelers-blog'); ?>
            </label> 
            <input 
            class="widefat" 
            id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" 
            name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" 
            type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>    
            <label for="<?php echo esc_attr($this->get_field_id( 'number_of_posts' )); ?>">
                <?php esc_html_e('Number of  Posts:','travelers-blog'); ?>
            </label>
            <input 
            type="number" 
            class="widefat" 
            name="<?php echo esc_attr($this->get_field_name('number_of_posts')); ?>"  min="2" max="6" 
            value="<?php echo esc_attr( $number_of_posts ); ?>" >
        </p>

        <?php 

    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
    
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? esc_html( $new_instance['title'] ) : '';
        $instance['number_of_posts'] = ( ! empty( $new_instance['number_of_posts'] )) ? esc_html( $new_instance['number_of_posts'] ) : '';

        return $instance;
    }

} 

// Register and load the widget
function travelers_blog_recent() {
    register_widget( 'Travelers_Blog_Show_Recent' );
}
add_action( 'widgets_init', 'travelers_blog_recent' );