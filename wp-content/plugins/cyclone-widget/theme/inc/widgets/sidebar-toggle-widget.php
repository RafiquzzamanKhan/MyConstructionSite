<?php
class Travelers_blog_Sidebar_Widget_Extended extends WP_Widget {

    function __construct() {
        parent::__construct('Travelers_blog_Sidebar_Widget_Extended',esc_html__('Travelers Blog Popular/Recent posts', 'travelers-blog'), 
        array( 'description' => esc_html__( 'Display popular and recent posts', 'travelers-blog' ) ) );
    }

    public function widget( $args, $instance ) {

        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        } ?>

        <div class="widget" data-ref="container-1">
    
            <div class="category-sidebar">
                <ul class="post-category">
                    <li class="filter heading-styl" data-filter=".popular-post">
                        <?php  
                        $title1 = ( ! empty($instance['title'] )) ? esc_html($instance['title']) :
                        esc_html__('Popular Posts','travelers-blog');
                        echo esc_html($title1); ?>
                    </li>
                    <li class="filter heading-styl" data-filter=".recent-post">
                        <?php  
                        $title2 = ( ! empty($instance['title2'] )) ? esc_html($instance['title2']) :
                        esc_html__('Recent Posts','travelers-blog');
                        echo esc_html($title2); ?>
                    </li>
                </ul>
            </div>
            <div class="item-sidebar">
                <div class="author-sidebar">

                    <div class="popular-post mix">
                  
                        <?php 
                        $postthumb_id = null;
                        $con = null;
                        $img_url = null;

                        $post_author = !empty( $instance['post_author'] ) ? $instance['post_author'] : '';
                        $post_date = !empty( $instance['post_date'] ) ? $instance['post_date'] : '';
                        $post_comment = !empty( $instance['post_comment'] ) ? $instance['post_comment'] : '';
                        $number_of_posts = !empty( $instance['number_of_posts'] ) ? $instance['number_of_posts'] : '';
                        $instance['toggle_title2'] = "Recent Posts";

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
                        $count=1; 

                        while ( $myposts->have_posts() ) : $myposts->the_post(); 

                            global $post;
                            $travelers_blog_post_id = $post->ID; ?>
                            
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
                                            travelers_blog_truncated_title_len($travelers_blog_post_id,$travelers_blog_len); ?>
                                            </a>
                                        </li>
                                    </ul> 
                            
                                    <div class="author-detail content-styl">
                                        <?php travelers_blog_get_author_detail_sidebar($post_author,$post_date,$post_comment); ?>
                                    </div>
                                </div>
                            </div>

                            <?php $count++; 

                        endwhile; wp_reset_postdata(); ?>

                    </div>

                    <div class="recent-post clearfix mix">                        

                        <?php 
                        $postthumb_id = null;
                        $con = null;
                        $img_url = null;

                        $post_author = !empty( $instance['post_author'] ) ? $instance['post_author'] : '';
                        $post_date = !empty( $instance['post_date'] ) ? $instance['post_date'] : '';
                        $post_comment = !empty( $instance['post_comment'] ) ? $instance['post_comment'] : '';
                        $number_of_posts = !empty( $instance['number_of_posts'] ) ? $instance['number_of_posts'] : '';

                        $travelers_blog_args = array(
                            'post_type'=> 'post',
                            'post_status' => 'publish',
                            'order'    => 'DESC',
                            'posts_per_page' =>$number_of_posts
                        );

                        $travelers_blog_result = new WP_Query( $travelers_blog_args );

                        if ( $travelers_blog_result-> have_posts() ) :

                            while ( $travelers_blog_result->have_posts() ) : $travelers_blog_result->the_post(); 

                                global $post;
                                $travelers_blog_post_id = $post->ID; ?>

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

                                        <h4><a class="heading-styl" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                
                                        <?php 

                                        if( has_post_thumbnail() ) {
                                            $travelers_blog_len = 35;
                                        } else {
                                            $travelers_blog_len = 70;
                                        }

                                        travelers_blog_truncated_title_len($travelers_blog_post_id,$travelers_blog_len); ?></a></h4>

                                    </div>

                                    <div class="author-detail content-styl">
                                        <?php travelers_blog_get_author_detail_sidebar($post_author,$post_date,$post_comment); ?>
                                    </div>

                                </div>

                                <?php 

                            endwhile; 

                        endif; 

                        wp_reset_postdata(); ?>

                    </div>

                </div>

            </div>
        </div>
          
        <?php 
    }

    public function form( $instance ) {

        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = esc_html__( 'Popular Posts', 'travelers-blog' );
        }
        
        if ( isset( $instance[ 'title2' ] ) ) {
            $title2 = $instance[ 'title2' ];
        } else {
            $title2 = esc_html__( 'Recent Posts', 'travelers-blog' );
        }

        $number_of_posts= (!empty($instance['number_of_posts'] )) ? $instance['number_of_posts'] : "4";
        $post_author = (!empty($instance['post_author'] )) ? $instance['post_author'] : "";
        $post_date = (!empty($instance['post_date'] )) ? $instance['post_date'] : "";
        $post_comment = (!empty($instance['post_comment'] )) ? $instance['post_comment'] : "";
        $read_more = (!empty($instance['read_more'] )) ? $instance['read_more'] : ""; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
                <?php esc_html_e('Popular Post Title:','travelers-blog'); ?>
            </label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title2' )); ?>">
                <?php esc_html_e('Recent Post Title:','travelers-blog'); ?>
            </label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title2' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title2' )); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>" />
        </p>

        <p>    
            <label for="<?php echo esc_attr($this->get_field_id( 'number_of_posts' )); ?>">
                <?php esc_html_e('Number of  Posts:','travelers-blog'); ?>
            </label>
            <input type="number" class="widefat" name="<?php echo esc_attr($this->get_field_name('number_of_posts')); ?>"  min="2" max="6" 
            value="<?php echo esc_attr( $number_of_posts ); ?>" >
        </p>

        <p>    
            <label for="<?php echo esc_attr($this->get_field_id( 'post_author' )); ?>">
                <?php esc_html_e('Author:','travelers-blog'); ?>
            </label> 
            <select class='widefat' id="<?php echo esc_attr($this->get_field_id('post_author')); ?>"
                name="<?php echo esc_attr( $this->get_field_name('post_author')); ?>" type="text">
                <option value='Show' <?php echo ($post_author=='Show')?'selected':''; ?>>
                    <?php esc_html_e('Show','travelers-blog'); ?>
                </option>
                <option value='Hide' <?php echo ($post_author=='Hide')?'selected':''; ?>>
                    <?php esc_html_e('Hide','travelers-blog'); ?>
                </option>
            </select>
        </p>

        <p>    
            <label for="<?php echo esc_attr($this->get_field_id( 'post_date' )); ?>">
                <?php esc_html_e('Date:','travelers-blog'); ?>
            </label>
            <select class='widefat' id="<?php echo esc_attr($this->get_field_id('post_date')); ?>"
                name="<?php echo esc_attr( $this->get_field_name('post_date')); ?>" type="text">
                <option value='Show' <?php echo ($post_date=='Show')?'selected':''; ?>>
                    <?php esc_html_e('Show','travelers-blog'); ?>
                </option>
                <option value='Hide' <?php echo ($post_date=='Hide')?'selected':''; ?>>
                    <?php esc_html_e('Hide','travelers-blog'); ?>
                </option>
            </select>
        </p>

        <p>    
            <label for="<?php echo esc_attr($this->get_field_id( 'post_comment' )); ?>">
              <?php esc_html_e('Comment:','travelers-blog'); ?>
            </label> 
            <select class='widefat' id="<?php echo esc_attr($this->get_field_id('post_comment')); ?>"
                name="<?php echo esc_attr( $this->get_field_name('post_comment')); ?>" type="text">
                <option value='Show' <?php echo ($post_comment=='Show')?'selected':''; ?>>
                    <?php esc_html_e('Show','travelers-blog'); ?>
                </option>
                <option value='Hide' <?php echo ($post_comment=='Hide')?'selected':''; ?>>
                    <?php esc_html_e('Hide','travelers-blog'); ?>
                </option>
            </select>
        </p>
        <?php 
    }

    public function update( $new_instance, $old_instance ) {
        
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? esc_html( $new_instance['title'] ) : '';
        $instance['title2'] = ( ! empty( $new_instance['title2'] ) ) ? esc_html( $new_instance['title2'] ) : '';
        $instance['number_of_posts'] = ( ! empty( $new_instance['number_of_posts']) ) ? esc_html( $new_instance['number_of_posts'] ) : '';
        $instance['post_author'] = ( ! empty( $new_instance['post_author']) ) ? esc_html( $new_instance['post_author'] ) : '';
        $instance['post_date'] = ( ! empty( $new_instance['post_date']) ) ? esc_html( $new_instance['post_date'] ) : '';
        $instance['post_comment'] = ( ! empty( $new_instance['post_comment']) ) ? esc_html( $new_instance['post_comment'] ) : '';

        return $instance;

    }

} 

function travelers_blog_widget_sidebar_extended() {
    register_widget( 'Travelers_blog_Sidebar_Widget_Extended' );
}
add_action( 'widgets_init', 'travelers_blog_widget_sidebar_extended' );