<?php
// Register and load the widget
function cyclone_social_links() {
    register_widget( 'cyclone_social_links_news_widget' );
}
add_action( 'widgets_init', 'cyclone_social_links' );
 
// Creating the widget 
class cyclone_social_links_news_widget extends WP_Widget {
 
    function __construct() {
        parent::__construct(
         
        // Base ID of your widget
        'cyclone_social_links_news_widget', 
         
        // Widget name will appear in UI
        esc_html__( 'Cyclone Widget Social Links' , 'cyclone-widget'), 
         
        // Widget description
        array( 'description' => esc_html__( 'Layout Cyclone Widget Social Links', 'cyclone-widget' ), ) 
        );
    }
 
    // Creating widget front-end


     
    public function widget( $args, $instance ) {
        echo $args['before_widget'];         

        echo '<div class="title br-orange transform">';
            echo $args['before_title'] . esc_html( $instance['title'] )  . $args['after_title'];
        echo '</div>';
        echo '<div class="cyclone-widget">';
            if(! empty( $instance['facebook-link']) ){
                echo '<a href="'. esc_url( $instance['facebook-link'] ) . '" class="fa fa-facebook"></a>';
            }
            if(! empty( $instance['twitter-link']) ) {
                echo '<a href="'.esc_url($instance['twitter-link']).'" class="fa fa-twitter"></a>';
            }
            if(! empty( $instance['instagram-link'] )){
                echo '<a href="'.esc_url($instance['instagram-link']).'" class="fa fa-instagram"></a>';
            }
            if(! empty( $instance['yahoo-link'] )){
                echo '<a href="'.esc_url($instance['yahoo-link']).'" class="fa fa-yahoo"></a>';
            }
            if(! empty( $instance['youtube-link'] )){
                echo '<a href="'.esc_url($instance['youtube-link']).'" class="fa fa-youtube"></a>';
            }
            if(! empty( $instance['skype-link'] )){
                echo '<a href="'.esc_url( $instance['skype-link']).'" class="fa fa-skype"></a>';
            }
            if(! empty( $instance['google-plus-link'] )){
                echo '<a href="'.esc_url( $instance['google-plus-link']).'" class="fa fa-google-plus"></a>';
            }
            if(! empty( $instance['linkedin-link'] )){
                echo '<a href="'.esc_url( $instance['linkedin-link']) .'" class="fa fa-linkedin"></a>';
            }
            if(! empty( $instance['vimeo-link'] )){
                echo '<a href="'.esc_url( $instance['vimeo-link']).'" class="fa fa-vimeo"></a>';
            }
            if(! empty( $instance['dribbble-link'] )){
                echo '<a href="'.esc_url( $instance['dribbble-link']).'" class="fa fa-dribbble"></a>';
            }
            if(! empty( $instance['foursquare-link'] )){
                echo '<a href="'.esc_url( $instance['foursquare-link']).'" class="fa fa-foursquare"></a>';
            }
            if(! empty($instance['flickr-link'] )){
                echo '<a href="'.esc_url( $instance['flickr-link']).'" class="fa fa-flickr"></a>';
            }
            if(! empty($instance['reddit-link'] )){
                echo '<a href="'.esc_url( $instance['reddit-link']).'" class="fa fa-reddit"></a>';
            }
            if(! empty($instance['tumblr-link'] )){
                echo '<a href="'.esc_url( $instance['tumblr-link']).'" class="fa fa-tumblr"></a>';
            }
            if(! empty($instance['pinterest-link'] )){
                echo '<a href="'.esc_url( $instance['pinterest-link']).'" class="fa fa-pinterest"></a>';
            }
        echo '</div>';

        echo $args['after_widget'];

    }    
    // Widget Backend 
    public function form( $instance ) {
        $title = !empty( $instance[ 'title' ] ) ? esc_html( $instance[ 'title' ] ) : '';
        $facebook_link = !empty( $instance[ 'facebook-link' ] ) ? esc_html( $instance[ 'facebook-link' ] ) : '';
        $twitter_link = !empty($instance['twitter-link']) ? esc_html( $instance['twitter-link'] ) : '';
        $instagram_link = !empty($instance['instagram-link']) ? esc_html( $instance['instagram-link'] ): '';
        $yahoo_link = !empty($instance['yahoo-link']) ? esc_html( $instance['yahoo-link'] ): '';
        $youtube_link = !empty($instance['youtube-link']) ? esc_html( $instance['youtube-link'] ): '';
        $skype_link = !empty($instance['skype-link']) ? esc_html( $instance['skype-link'] ): '';
        $google_plus_link = !empty($instance['google-plus-link']) ? esc_html( $instance['google-plus-link']) : '';
        $linkedin_link = !empty($instance['linkedin-link']) ? esc_html( $instance['linkedin-link'] ): '';
        $vimeo_link = !empty($instance['vimeo-link']) ? esc_html( $instance['vimeo-link'] ): '';
        $dribbble_link = !empty($instance['dribbble-link']) ? esc_html( $instance['dribbble-link'] ): '';
        $foursquare_link = !empty($instance['foursquare-link']) ? esc_html( $instance['foursquare-link'] ): '';
        $flickr_link = !empty($instance['flickr-link']) ?esc_html(  $instance['flickr-link'] ): '';
        $reddit_link = !empty($instance['reddit-link']) ? esc_html( $instance['reddit-link']) : '';
        $tumblr_link = !empty($instance['tumblr-link']) ? esc_html( $instance['tumblr-link'] ): '';
        $pinterest_link = !empty($instance['pinterest-link']) ?esc_html(  $instance['pinterest-link'] ) : '';


        // Widget admin form
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Links Title:' , 'cyclone-widget' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' , 'cyclone-widget' )); ?>" type="text" value="<?php echo esc_attr( $title , 'cyclone-widget' ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'facebook-link' ) ); ?>"><?php esc_html_e( 'Facebook Link:' , 'cyclone-widget' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook-link' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook-link' , 'cyclone-widget' )); ?>" type="text" value="<?php echo esc_attr( $facebook_link , 'cyclone-widget' ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'twitter-link' ) ); ?>"><?php esc_html_e( 'Twitter Link:' , 'cyclone-widget' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter-link' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitter-link' , 'cyclone-widget' )); ?>" type="text" value="<?php echo esc_attr( $twitter_link , 'cyclone-widget' ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'instagram-link' ) ); ?>"><?php esc_html_e( 'Instagram Link:' , 'cyclone-widget' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram-link' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram-link' , 'cyclone-widget' )); ?>" type="text" value="<?php echo esc_attr( $instagram_link , 'cyclone-widget' ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'yahoo-link' ) ); ?>"><?php esc_html_e( 'Yahoo Link:' , 'cyclone-widget' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'yahoo-link' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'yahoo-link' , 'cyclone-widget' )); ?>" type="text" value="<?php echo esc_attr( $yahoo_link , 'cyclone-widget' ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'youtube-link' ) ); ?>"><?php esc_html_e( 'Youtube Link:' , 'cyclone-widget' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube-link' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube-link' , 'cyclone-widget' )); ?>" type="text" value="<?php echo esc_attr( $youtube_link , 'cyclone-widget' ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'skype-link' ) ); ?>"><?php esc_html_e( 'Skype Link:' , 'cyclone-widget' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'skype-link' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'skype-link' , 'cyclone-widget' )); ?>" type="text" value="<?php echo esc_attr( $skype_link , 'cyclone-widget' ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'google-plus-link' ) ); ?>"><?php esc_html_e( 'Google Plus Link:' , 'cyclone-widget' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'google-plus-link' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'google-plus-link' , 'cyclone-widget' )); ?>" type="text" value="<?php echo esc_attr( $google_plus_link , 'cyclone-widget' ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'linkedin-link' ) ); ?>"><?php esc_html_e( 'LinkedIn Link:' , 'cyclone-widget' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin-link' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'linkedin-link' , 'cyclone-widget' )); ?>" type="text" value="<?php echo esc_attr( $linkedin_link , 'cyclone-widget' ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'vimeo-link' ) ); ?>"><?php esc_html_e( 'Vimeo Link:' , 'cyclone-widget' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vimeo-link' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'vimeo-link' , 'cyclone-widget' )); ?>" type="text" value="<?php echo esc_attr( $vimeo_link , 'cyclone-widget' ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'dribbble-link' ) ); ?>"><?php esc_html_e( 'Dribbble Link:' , 'cyclone-widget' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'dribbble-link' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'dribbble-link' , 'cyclone-widget' )); ?>" type="text" value="<?php echo esc_attr( $dribbble_link , 'cyclone-widget' ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'foursquare-link' ) ); ?>"><?php esc_html_e( 'Foursquare Link:' , 'cyclone-widget' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'foursquare-link' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'foursquare-link' , 'cyclone-widget' )); ?>" type="text" value="<?php echo esc_attr( $foursquare_link , 'cyclone-widget' ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'flickr-link' ) ); ?>"><?php esc_html_e( 'Flickr Link:' , 'cyclone-widget' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'flickr-link' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'flickr-link' , 'cyclone-widget' )); ?>" type="text" value="<?php echo esc_attr( $flickr_link , 'cyclone-widget' ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'reddit-link' ) ); ?>"><?php esc_html_e( 'Reddit Link:' , 'cyclone-widget' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'reddit-link' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'reddit-link' , 'cyclone-widget' )); ?>" type="text" value="<?php echo esc_attr( $reddit_link , 'cyclone-widget' ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'tumblr-link' ) ); ?>"><?php esc_html_e( 'Tumblr Link:' , 'cyclone-widget' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tumblr-link' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'tumblr-link' , 'cyclone-widget' )); ?>" type="text" value="<?php echo esc_attr( $tumblr_link , 'cyclone-widget' ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'pinterest-link' ) ); ?>"><?php esc_html_e( 'Pinterest Link:' , 'cyclone-widget' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest-link' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'pinterest-link' , 'cyclone-widget' )); ?>" type="text" value="<?php echo esc_attr( $pinterest_link , 'cyclone-widget' ); ?>" />
        </p>

        <?php
    }
     
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['facebook-link'] = ( ! empty( $new_instance['facebook-link'] ) ) ? sanitize_text_field( $new_instance['facebook-link'] ) : '';
        $instance['twitter-link'] = ( ! empty( $new_instance['twitter-link'] ) ) ? sanitize_text_field( $new_instance['twitter-link'] ) : '';
        $instance['instagram-link'] = ( ! empty( $new_instance['instagram-link'] ) ) ? sanitize_text_field( $new_instance['instagram-link'] ) : '';
        $instance['yahoo-link'] = ( ! empty( $new_instance['yahoo-link'] ) ) ? sanitize_text_field( $new_instance['yahoo-link'] ) : '';
        $instance['youtube-link'] = ( ! empty( $new_instance['youtube-link'] ) ) ? sanitize_text_field( $new_instance['youtube-link'] ) : '';
        $instance['skype-link'] = ( ! empty( $new_instance['skype-link'] ) ) ? sanitize_text_field( $new_instance['skype-link'] ) : '';
        $instance['google-plus-link'] = ( ! empty( $new_instance['google-plus-link'] ) ) ? sanitize_text_field( $new_instance['google-plus-link'] ) : '';
        $instance['linkedin-link'] = ( ! empty( $new_instance['linkedin-link'] ) ) ? sanitize_text_field( $new_instance['linkedin-link'] ) : '';
        $instance['vimeo-link'] = ( ! empty( $new_instance['vimeo-link'] ) ) ? sanitize_text_field( $new_instance['vimeo-link'] ) : '';
        $instance['dribbble-link'] = ( ! empty( $new_instance['dribbble-link'] ) ) ? sanitize_text_field( $new_instance['dribbble-link'] ) : '';
        $instance['foursquare-link'] = ( ! empty( $new_instance['foursquare-link'] ) ) ? sanitize_text_field( $new_instance['foursquare-link'] ) : '';
        $instance['flickr-link'] = ( ! empty( $new_instance['flickr-link'] ) ) ? sanitize_text_field( $new_instance['flickr-link'] ) : '';
        $instance['reddit-link'] = ( ! empty( $new_instance['reddit-link'] ) ) ? sanitize_text_field( $new_instance['reddit-link'] ) : '';
        $instance['tumblr-link'] = ( ! empty( $new_instance['tumblr-link'] ) ) ? sanitize_text_field( $new_instance['tumblr-link'] ) : '';
        $instance['pinterest-link'] = ( ! empty( $new_instance['pinterest-link'] ) ) ? sanitize_text_field( $new_instance['pinterest-link'] ) : '';

        return $instance;
    }
} // Class wpb_widget ends here