<?php

   /*
   Plugin Name: Cyclone Widget
   Text Domain: cyclone-widget
   Description: This plugin is to extend the theme functinality
   Version: 0.4
   Author: Cyclone Themes
   Author URI: https://cyclonethemes.com
   License: GPL2
   */

add_action( 'wp_enqueue_scripts', 'cyclone_widgets' );

function cyclone_widgets(){

    wp_enqueue_style('font-awesome', plugin_dir_url( __FILE__ ) .'/icons/font-awesome/css/font-awesome.min.css');

    wp_enqueue_style('cyclone_widgets_style-css', plugin_dir_url( __FILE__ ) .'/css/style.css');

    wp_enqueue_script( 'instagram', plugin_dir_url( __FILE__ ) . '/js/instagram.min.js', array('jquery'),array(),true );

    wp_enqueue_script( 'cyclone_widgets_custom-js', plugin_dir_url( __FILE__ ) . '/js/custom.js', array(),array(),false );

}

// Get theme details
$theme = wp_get_theme();

/**
 * For Themes
 */

switch ( $theme->get( 'TextDomain' ) ) {

    case 'travelers-blog':
        /**
        * For Travelers Blog Theme
        */
        require plugin_dir_path( __FILE__ ) . 'theme/cyclone-functions.php';
        require plugin_dir_path( __FILE__ ) . 'theme/inc/widgets/page-info-widget.php';
        require plugin_dir_path( __FILE__ ) . 'theme/inc/widgets/popular-post-widget.php';
        require plugin_dir_path( __FILE__ ) . 'theme/inc/widgets/recent-post-widget.php';
        require plugin_dir_path( __FILE__ ) . 'theme/inc/widgets/sidebar-toggle-widget.php';
        break;

    default:
        require plugin_dir_path( __FILE__ ) . 'widgets/insta_widget.php';
        require plugin_dir_path( __FILE__ ) . 'widgets/popular-recent.php';
        require plugin_dir_path( __FILE__ ) . 'widgets/post-widget.php';
        require plugin_dir_path( __FILE__ ) . 'widgets/recent_posts.php';
        require plugin_dir_path( __FILE__ ) . 'widgets/social_links.php';
        break;

}

function cyclone_custom_widget_drop_down_limit($limit=10,$select=null){

	for ( $i=1; $i < $limit; $i++) { 
		echo '<option ';
		selected( $select, $i);
		echo ' value="' . absint($i) . '">' . absint($i)  . '</option>';
	}

}

add_action( 'get_header' , 'cyclone_widget_posts_add_views' );
function cyclone_widget_posts_add_views(){

   if( is_single() ){

        global $post;
        $post_id = $post->ID;

        $views = get_post_meta( $post_id, 'post_views' , true );

        if( empty( $views ) ){
            update_post_meta( $post_id, 'post_views', 1 );
        } else {
            update_post_meta( $post_id, 'post_views', ( $views + 1 ) );
        }

   }

}

// [cyclone-instragram title="foo-value" insta_user_id="asdf"]
add_shortcode( 'cyclone-instragram', 'cyclone_page_instagram' );
function cyclone_page_instagram( $atts ) {
    $a = shortcode_atts( array(
        'title' => '',
        'insta_user_id' => '',
        'insta_username' => '',
        'insta_access_token' => '',
        'no_of_pic_to_show' => '',
    ), $atts );

    echo '<section class="section instagram_section"><div class="instagram-wrapper clearfix text-center">';

    if ( ! empty( $a['title'] ) )
        echo '<h3><a target="_blank" href="' . esc_url( 'https://instagram.com/' . $a['insta_username'] ) . '">' . esc_html( $a['title'] ) . ' @' . esc_html( $a['insta_username'] ) . '</a></h3>';

    $id = 'instagram_' . rand(0,9999);
    echo '<div id="' . esc_html($id) . '" class="instagram_page instagram_shortcode"></div>'; 
    ?>

        <script>

            jQuery(document).ready(function() {

                jQuery('#<?php echo $id; ?>').on('didLoadInstagram', function(event, response) {
                   
                   var id = jQuery(this);

                   jQuery.each(response.data, function (i, currProgram) {
                      id.append( '<div><a target="_blank" href="' + jQuery(this)[0].link + '"><img src="' + jQuery(this)[0].images.thumbnail.url + '"></a></div>' );
                   });

                });

                jQuery('#<?php echo $id; ?>').instagram({
                   count: <?php echo ( !empty( $a['no_of_pic_to_show'] ) ? esc_html( $a['no_of_pic_to_show'] ) : '' ); ?>,
                   clientId: "<?php echo ( !empty( $a['insta_user_id'] ) ? esc_html( $a['insta_user_id'] ) : '' ); ?>",
                   accessToken: "<?php echo ( !empty( $a['insta_access_token'] ) ? esc_html( $a['insta_access_token'] ) : '' ); ?>"
                });

            });

        </script>

    </div>

    </section>

    <?php

}

add_action( 'init', 'cyclone_setting', 1000 );
function cyclone_setting(){

    if ( class_exists( 'kirki' ) ) {

        Kirki::add_field( 'fire-blog', array(
            'type'     => 'textarea',
            'settings' => 'insta_shortcode',
            'label'    => esc_html__( 'Enter Shortcode for Instagram' ,'fire-blog' ),
            'description' => 'eg. <code>[ cyclone-instragram title="Follow Us on Instagram" insta_user_id="YOUR_INSTAGRAM_USER_ID" insta_username="YOUR_INSTAGRAM_USERNAME" insta_access_token="YOUR_INSTAGRAM_TOKEN" no_of_pic_to_show="20" ]</code>',
            'section'  => 'general',
            'default'  => '',
        ) );

    }

}