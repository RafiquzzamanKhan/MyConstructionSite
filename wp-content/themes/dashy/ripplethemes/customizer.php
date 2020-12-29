<?php
/**
 * dashy Theme Customizer
 *
 * @package dashy
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'dashy_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function dashy_default_theme_options() {

		$defaults                                 = array();
		
		//Top header

		// top header social links
		$defaults['facebook_social']             =  esc_url_raw('https://www.facebook.com/');
		$defaults['twitter_social']             = esc_url_raw('https://www.twitter.com/');
		$defaults['google_social']         = esc_url_raw('https://www.google.com/');
		$defaults['instagram_social']         = esc_url_raw('https://www.instagram.com/');

	


	

		// category
		
		$defaults['dashy_hide_category_section']			= 0;

		
		$defaults['dashy-category1']			= '0';
		$defaults['dashy-category2']			= '0';
		$defaults['dashy-category3']			= '0';

		//canvas sidebar
		$defaults['dashy_canvas_aboutme_title']        = esc_html__( 'About Me', 'dashy' );
		$defaults['dashy_canvas_Author_Name']        	= esc_html__( 'John Cena', 'dashy' );
		$defaults['dashy_canvas_Author_Desc']  	  	= esc_html__( 'Hello word I am dashy Guy', 'dashy' );

		//canvas sidebar social share
		$defaults['dashy_canvas_Author_facebook']  	  	= esc_url_raw('https://www.facebook.com/');
		$defaults['dashy_canvas_Author_twitter']  	  	= esc_url_raw('https://www.twitter.com/');
		$defaults['dashy_canvas_Author_linkedin']  	  	= esc_url_raw('https://www.linkedin.com/');
		$defaults['dashy_canvas_Author_youtube']  	  	= esc_url_raw('https://www.youtube.com/');
		$defaults['dashy_canvas_Author_instagram']  	  	= esc_url_raw('https://www.instagram.com/');

		// post options
		$defaults['dashy_post_show_author']				= 1;
		$defaults['dashy_post_show_date']				= 1;
		$defaults['dashy_post_next_post_link']			= 1;
		$defaults['dashy_readmore_text']        		= esc_html__( 'Read more', 'dashy' );

		
		// Related Posts
		$defaults['you_may_like_title']             = esc_html__( 'Related Post', 'dashy' );
		$defaults['dashy_show_related']             = 1;

		// Breadcrumbs
		$defaults['dashy_show_breadcrumbs']			= 1;

		// footer

		//copyright
		$defaults['dashy_footer_copyright']        		=  __('<p>Copyright © 2020  All Rights Reserved.</p>','dashy');
			
		//powered by

		$defaults['dashy_footer_poweredby']        		=  __('<p>Powered by : Ripplethemes </p>','dashy');
		$defaults['show_logo_in_footer']        		=  '1';

		return $defaults;
	}

endif;



if ( ! function_exists( 'dashy_get_option' ) ) :

	/**
	 * Get theme option.
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function dashy_get_option( $key ) {

		if ( empty( $key ) ) {

			return;

		}

		$value            = '';

		$default          = dashy_default_theme_options();

		$default_value    = null;

		if ( is_array( $default ) && isset( $default[ $key ] ) ) {

			$default_value = $default[ $key ];

		}

		if ( null !== $default_value ) {

			$value = get_theme_mod( $key, $default_value );

		}else {

			$value = get_theme_mod( $key );

		}

		return $value;

	}

endif;


function dashy_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'dashy_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'dashy_customize_partial_blogdescription',
			)
		);
	}
	$default          = dashy_default_theme_options();
	// load all custom settings
	require get_template_directory() . '/ripplethemes/customizer-settings/customizer-settings.php';
}
add_action( 'customize_register', 'dashy_customize_register' );



/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function dashy_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function dashy_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dashy_customize_preview_js() {
	wp_enqueue_script( 'dashy-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'dashy_customize_preview_js' );

/**
 * enqueue Script for admin dashboard.
 */

if (!function_exists('dashy_widgets_backend_enqueue')) :
    function dashy_widgets_backend_enqueue($hook)
    {
        

        wp_register_script('dashy-custom-widgets', get_template_directory_uri() . '/assets/js/widget.js', array('jquery'), true);
        
        wp_enqueue_media();
        wp_enqueue_script('dashy-custom-widgets');
    }

    add_action('admin_enqueue_scripts', 'dashy_widgets_backend_enqueue');
endif;