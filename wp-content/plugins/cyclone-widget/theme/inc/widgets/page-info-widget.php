<?php
class Travelers_Blog_Page_Widget extends WP_Widget {

    function __construct() {
        parent::__construct('Travelers_Blog_Page_Widget',esc_html__('Travelers Blog Author Widget', 'travelers_blog'), 
        array( 'description' => esc_html__( 'Display author widget.', 'travelers_blog' ) ) );
    }

    public function widget( $args, $instance ) {

        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }
    
        $postthumb_id = null;
        $con = null;
        $img_url = null;

        $travelers_blogID = !empty( $instance['page_list'] ) ? $instance['page_list'] : '';
        $title = !empty( $instance['title'] ) ? $instance['title'] : '';
        $facebook_url = !empty( $instance['facebook_url'] ) ? $instance['facebook_url'] : '';
        $instagram_url = !empty( $instance['instagram_url'] ) ? $instance['instagram_url'] : '';
        $twitter_url = !empty( $instance['twitter_url'] ) ? $instance['twitter_url'] : '';
        $excerpt_length = !empty( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : '';
        $content_type = !empty( $instance['content_type'] ) ? $instance['content_type'] : '';
        $read_more = !empty( $instance['read_more'] ) ? $instance['read_more'] : '';
        ?>
            
        <div class="widget">
            <?php 
            if(!empty($title)) :  ?>
                <div class="wg-title"> 
                    <h2 class="widget-title"><?php echo esc_html($title); ?></h2>
                </div>
                <?php 
            endif; ?>
          
            <div class="author-image">
                <a class="heading-styl" href="<?php the_permalink($travelers_blogID); ?>">
                    <?php echo wp_kses_post( get_the_post_thumbnail($travelers_blogID,'thumbnail') ); ?>
                </a>
            </div>
            <div class="author-content">
                <h4>
                    <a 
                    class="heading-styl" 
                    href="<?php the_permalink($travelers_blogID); ?>" 
                    title="<?php echo esc_attr(get_the_title($travelers_blogID)); ?>">
                    <?php echo esc_html(get_the_title($travelers_blogID)); ?></a>
                </h4>
                <?php 
                $travelers_sidebar_content = get_post_field('post_content', $travelers_blogID);
                if($content_type == 'Full') { ?>
                    <p class="content-styl"><?php echo wp_kses_post($travelers_sidebar_content); ?></p> 
                    <?php 
                } else { ?>

                    <p class="content-styl">
                        <?php 
                        $text = $travelers_sidebar_content;
                        $text = wp_trim_words( $text, $excerpt_length);
                        echo esc_html($text); ?>
                    </p>

                    <?php 
                    if(! empty($read_more)) { ?>
                        <a href="<?php the_permalink($travelers_blogID); ?>" class="btn-white btn-red content-styl">
                            <?php 
                            $travelers_label = get_theme_mod('layout2_button_label'); 
                            echo esc_html($read_more); ?>
                        </a>
                        <?php 
                    } 
                } ?>
                
                <ul class="header-social-links">
                    <?php 
                    if(!empty($facebook_url)) : ?>
                        <li><a href="<?php echo esc_url($facebook_url); ?>" rel="nofollow" target="_blank">
                        <i class="fa fa-facebook"></i></a>
                        </li>
                        <?php 
                    endif; ?>
                
                    <?php 
                    if(!empty($instagram_url)) : ?>
                        <li><a href="<?php echo esc_url($instagram_url); ?>" rel="nofollow" target="_blank">
                            <i class="fa fa-instagram"></i></a>
                        </li>
                        <?php 
                    endif; ?>
                
                    <?php 
                    if(!empty($twitter_url)) : ?>
                        <li><a href="<?php echo esc_url($twitter_url); ?>" rel="nofollow" target="_blank">
                        <i class="fa fa-twitter"></i></a>
                        </li>
                        <?php 
                    endif; ?>
                
                </ul>
            </div>
        </div>
        
        <?php 
    }

    public function form( $instance ) {

        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = esc_html__( 'Author Widget', 'travelers_blog' );
        }

        $content_type = ( ! empty($instance['content_type'])) ? $instance['content_type'] : '';
        $excerpt_length= ( ! empty($instance['excerpt_length'])) ? $instance['excerpt_length'] : '25';
        $facebook_url = ( ! empty($instance['facebook_url'])) ? $instance['facebook_url'] :'';
        $instagram_url = ( ! empty($instance['instagram_url'])) ? $instance['instagram_url']:'';
        $twitter_url = ( ! empty($instance['twitter_url'])) ? $instance['twitter_url']:'';
        $read_more = ( ! empty($instance['read_more'])) ? $instance['read_more']:'';
        $instance['page_list'] = isset($instance['page_list']) ? $instance['page_list'] : '';

        $oldpage =  $instance['page_list'];
        $page_list =  $instance['page_list']; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
                <?php esc_html_e('Title:','travelers-blog'); ?>
            </label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>    
            <label for="<?php echo esc_attr($this->get_field_id( 'page_list' )); ?>">
                <?php esc_html_e('Page:','travelers-blog'); ?>
            </label> 
            <select  class="widefat" id="<?php echo esc_attr($this->get_field_id('page_list')); ?>" name="<?php echo esc_attr($this->get_field_name('page_list')); ?>">
                <?php 
                $pages = get_pages();  
                foreach ( $pages as $page ) { ?>
                    <option <?php selected($instance['page_list'], esc_html(get_the_title($page->ID)));?> value="<?php echo esc_attr($page->ID); ?>" <?php if($oldpage == $page->ID){echo "selected";}?>>
                        <?php 
                        echo esc_html(get_the_title($page->ID)); ?>
                    </option>
                    <?php 
                } ?>
            </select>
        </p>

        <p>    
            <label for="<?php echo esc_attr($this->get_field_id( 'content_type' )); ?>">
                <?php esc_html_e('Content Type:','travelers-blog'); ?>
            </label>
            <select 
            class='widefat' 
            id="<?php echo esc_attr($this->get_field_id('content_type')); ?>"
            name="<?php echo esc_attr( $this->get_field_name('content_type')); ?>" 
            type="text">
                <option value='Excerpt' <?php echo ($content_type=='Excerpt') ? 'selected':''; ?>>
                    <?php esc_html_e('Excerpt','travelers-blog'); ?>
                </option>
                <option value='Full' <?php echo ($content_type=='Full')?'selected':''; ?>>
                    <?php esc_html_e('Full','travelers-blog'); ?>
                </option>
            </select>
        </p>

        <p>    
            <label for="<?php echo esc_attr($this->get_field_id( 'excerpt_length' )); ?>">
                <?php esc_html_e('Excerpt Length:','travelers-blog'); ?>
            </label>
            <input 
            type="number" 
            class="widefat" 
            name="<?php echo esc_attr($this->get_field_name('excerpt_length')); ?>" 
            min="10" 
            max="30" 
            value="<?php echo esc_attr( $excerpt_length ); ?>" >
        </p>
      
        <p>   
            <label for="<?php echo esc_attr($this->get_field_id( 'read_more' )); ?>">
                <?php esc_html_e('Read More Text:','travelers-blog'); ?>
            </label> 
            <input 
            type="text" 
            class="widefat" 
            id="<?php echo esc_attr($this->get_field_id( 'read_more' )); ?>" 
            name="<?php echo esc_attr($this->get_field_name( 'read_more' )); ?>"  
            value="<?php echo esc_attr( $read_more ); ?>" />
        </p>

        <p>    
            <label for="<?php echo esc_attr($this->get_field_id( 'facebook_url' )); ?>">
                <?php esc_html_e('Facebook Url:','travelers-blog'); ?>
            </label> 
            <input 
            type="text" 
            class="widefat" 
            id="<?php echo esc_attr($this->get_field_id( 'facebook_url' )); ?>" 
            name="<?php echo esc_attr($this->get_field_name( 'facebook_url' )); ?>"  
            value="<?php echo esc_url( $facebook_url ); ?>" />
        </p>

        <p>    
            <label for="<?php echo esc_attr($this->get_field_id( 'instagram_url' )); ?>">
                <?php esc_html_e('Instagram Url:','travelers-blog'); ?>
            </label>
            <input 
            type="text" 
            class="widefat" 
            id="<?php echo esc_attr($this->get_field_id( 'instagram_url' )); ?>" 
            name="<?php echo esc_attr($this->get_field_name( 'instagram_url' )); ?>"  
            value="<?php echo esc_url( $instagram_url ); ?>" />
        </p>

        <p>    
            <label for="<?php echo esc_attr($this->get_field_id( 'twitter_url' )); ?>">
                <?php esc_html_e('Twitter Url:','travelers-blog'); ?>
            </label> 
            <input 
            type="text" 
            class="widefat" 
            id="<?php echo esc_attr($this->get_field_id( 'twitter_url' )); ?>" 
            name="<?php echo esc_attr($this->get_field_name( 'twitter_url' )); ?>"  
            value="<?php echo esc_url( $twitter_url ); ?>" />
        </p>

        <?php 
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? esc_html( $new_instance['title'] ) : '';
        $instance['content_type'] = ( ! empty( $new_instance['content_type'] ) ) ? esc_html( $new_instance['content_type'] ) : '';
        $instance['excerpt_length'] = ( ! empty( $new_instance['excerpt_length'] ) ) ? esc_html( $new_instance['excerpt_length'] ) : '';
        $instance['read_more'] = ( ! empty( $new_instance['read_more'] ) ) ? esc_html( $new_instance['read_more'] ) : '';
        $instance['facebook_url'] = ( ! empty( $new_instance['facebook_url'] ) ) ? esc_html( $new_instance['facebook_url'] ) : '';
        $instance['instagram_url'] = ( ! empty( $new_instance['instagram_url'] ) ) ? esc_html( $new_instance['instagram_url'] ) : '';
        $instance['twitter_url'] = ( ! empty( $new_instance['twitter_url'] ) ) ? esc_html( $new_instance['twitter_url'] ) : '';
        $instance['page_list'] = ( ! empty( $new_instance['page_list'] ) ) ? esc_html( $new_instance['page_list'] ) : '';

        return $instance;
    }
}

add_action( 'widgets_init', 'travelers_blog_page' );
function travelers_blog_page() {
    register_widget( 'Travelers_Blog_Page_Widget' );
}