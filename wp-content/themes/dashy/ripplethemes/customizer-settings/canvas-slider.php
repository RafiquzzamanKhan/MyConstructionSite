<?php


$wp_customize->add_section('dashy_slider_setting',array(
  'title'=>esc_html__( 'Canvas Slider', 'dashy' ),
  'panel'      => 'dashy_options_panal',        
  'priority'=>'30'    
));




// About me text
   // Read More Text
   $wp_customize->add_setting( 'dashy_canvas_aboutme_title',
   array(
          'capability'        => 'edit_theme_options',
          'default'           => $default['dashy_canvas_aboutme_title'],
          'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'dashy_canvas_aboutme_title', array(
       'type' => 'text',
       'section' => 'dashy_slider_setting', 
       'settings'  => 'dashy_canvas_aboutme_title',
       
       'description' => __( 'About Title','dashy' ),
     ) );

    

     $wp_customize->add_setting('profile_image', array(
        'transport'         => 'refresh',
        'height'         => 325,
        'sanitize_callback'=>'esc_url_raw'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'profile_image', array(
        'label'             => __('Select Profile Image', 'dashy'),
        'section'           => 'dashy_slider_setting',
        'settings'          => 'profile_image',    
    )));

    $wp_customize->add_setting( 'dashy_canvas_Author_Name',
    array(
           'capability'        => 'edit_theme_options',
           'default'           => $default['dashy_canvas_Author_Name'],
           'sanitize_callback' => 'sanitize_text_field',
     ) );
 
     $wp_customize->add_control( 'dashy_canvas_Author_Name', array(
        'type' => 'text',
        'section' => 'dashy_slider_setting', 
        'settings'  => 'dashy_canvas_Author_Name',
        
        'description' => __( 'Author Name','dashy' ),
      ) );

      $wp_customize->add_setting( 'dashy_canvas_Author_Desc',
      array(
             'capability'        => 'edit_theme_options',
             'default'           => $default['dashy_canvas_Author_Desc'],
             'sanitize_callback' => 'sanitize_text_field',
       ) );
   
       $wp_customize->add_control( 'dashy_canvas_Author_Desc', array(
          'type' => 'textarea',
          'section' => 'dashy_slider_setting', 
          'settings'  => 'dashy_canvas_Author_Desc',
          
          'description' => __( 'Author Description','dashy' ),
        ) );


        // Author social Links
        $wp_customize->add_setting( 'dashy_canvas_Author_youtube', array(
          'capability' => 'edit_theme_options',
          'default' => $default['dashy_canvas_Author_youtube'],
          'sanitize_callback' => 'esc_url_raw',
        ) );
        
        $wp_customize->add_control( 'dashy_canvas_Author_youtube', array(
          'type' => 'text',
          'section' => 'dashy_slider_setting', // Add a default or your own section
          'settings'=>'dashy_canvas_Author_youtube',
          'description' => __( 'Youtube','dashy' ),
        ) );

        $wp_customize->add_setting( 'dashy_canvas_Author_twitter', array(
          'capability' => 'edit_theme_options',
          'default' => $default['dashy_canvas_Author_twitter'],
          'sanitize_callback' => 'esc_url_raw',
        ) );
        
        $wp_customize->add_control( 'dashy_canvas_Author_twitter', array(
          'type' => 'text',
          'section' => 'dashy_slider_setting', // Add a default or your own section
          'settings'=>'dashy_canvas_Author_twitter',
          'description' => __( 'Twitter','dashy' ),
        ) );

        $wp_customize->add_setting( 'dashy_canvas_Author_facebook', array(
          'capability' => 'edit_theme_options',
          'default' => $default['dashy_canvas_Author_facebook'],
          'sanitize_callback' => 'esc_url_raw',
        ) );
        
        $wp_customize->add_control( 'dashy_canvas_Author_facebook', array(
          'type' => 'text',
          'section' => 'dashy_slider_setting', // Add a default or your own section
          'settings'=>'dashy_canvas_Author_facebook',
          'description' => __( 'Facebook','dashy' ),
        ) );

        $wp_customize->add_setting( 'dashy_canvas_Author_linkedin', array(
          'capability' => 'edit_theme_options',
          'default' => $default['dashy_canvas_Author_linkedin'],
          'sanitize_callback' => 'esc_url_raw',
        ) );
        
        $wp_customize->add_control( 'dashy_canvas_Author_linkedin', array(
          'type' => 'text',
          'section' => 'dashy_slider_setting', // Add a default or your own section
          'settings'=>'dashy_canvas_Author_linkedin',
          'description' => __( 'Linkedin','dashy' ),
        ) );

        $wp_customize->add_setting( 'dashy_canvas_Author_instagram', array(
          'capability' => 'edit_theme_options',
          'default' => $default['dashy_canvas_Author_instagram'],
          'sanitize_callback' => 'esc_url_raw',
        ) );
        
        $wp_customize->add_control( 'dashy_canvas_Author_instagram', array(
          'type' => 'text',
          'section' => 'dashy_slider_setting', // Add a default or your own section
          'settings'=>'dashy_canvas_Author_instagram',
          'description' => __( 'Instagram','dashy' ),
        ) );