<?php
    class Travelers_Blog_Show_Popular extends WP_Widget {

    function __construct() {
        parent::__construct('Travelers_Blog_Show_Popular',esc_html__('Travelers Blog Popular Posts', 'travelers-blog'), 
        array( 'description' => esc_html__( 'Display popular posts', 'travelers-blog' ) ) );
    }

    public function widget( $args, $instance ) {

        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        } 

        $title = '';
        $number_of_posts = '5';

        if( !empty($instance['title']) ) {
            $title = $instance['title'];
        }
        if( !empty($instance['number_of_posts']) ) {
            $number_of_posts = $instance['number_of_posts'];
        }

        $args    = array(
            'posts_per_page' => $number_of_posts,
            'orderby'=>'meta_value', 
            'meta_key'=>'post_views_count',
            'order'=>'DESC',
            'post_type'=>'post',
            'ignore_sticky_posts' => 1,
            'post_status'=>'publish'
        );
        $myposts = new WP_Query( $args );
        $count=1; ?>
        
        <div class="widget">
            <?php 
            if(!empty($title)) :  ?>
                <h2 class="widget-title"><?php echo esc_html($title); ?></h2>
                <?php 
            endif; ?>

            <?php
            if( $myposts->have_posts() ): 
                while ( $myposts->have_posts() ) : $myposts->the_post(); 
                    global $post;
                    $travelers_blog_postID = $post->ID; ?>
                    <div class="popular-item">
                        <div class="popular-content">
                            <span class="item-no heading-styl">
                                <?php echo esc_html(sprintf('%02d', esc_html($count))); ?>        
                            </span>
                            <ul>
                                <li>
                                    <a class="heading-styl" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <?php 
                                        $travelers_blog_len = 35; 
                                        travelers_blog_truncated_title_len($travelers_blog_postID,$travelers_blog_len); ?>
                                    </a>
                                </li>
                            </ul> 
                    
                            <div class="author-detail content-styl">
                                <?php travelers_blog_get_author_detail(); ?>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $count++;  
                endwhile; 
            endif;
            wp_reset_postdata(); ?>
        </div>
          
        <?php 
    }

    // Widget Backend 
    public function form( $instance ) {

        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = esc_html__( 'Popular Posts', 'travelers-blog' );
        }

        $number_of_posts = ( ! empty($instance['number_of_posts'] )) ? $instance['number_of_posts'] : "4"; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
                <?php esc_html_e('Title:','travelers-blog'); ?>
            </label> 
            <input 
            class="widefat" 
            id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" 
            name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" 
            type="text" 
            value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>    
            <label for="<?php echo esc_attr($this->get_field_id( 'number_of_posts' )); ?>">
                <?php esc_html_e('Number of  Posts:','travelers-blog'); ?>
            </label>
            <input 
            type="number" 
            class="widefat" 
            name="<?php echo esc_attr($this->get_field_name('number_of_posts')); ?>"  
            min="2" 
            max="6" 
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
function travelers_blog_popular() {
    register_widget( 'Travelers_Blog_Show_Popular' );
}
add_action( 'widgets_init', 'travelers_blog_popular' );