<?php
    // Layout Section.

    $wp_customize->add_section('dashy_my_social',array(
        'title'=>esc_html__( 'Social', 'dashy' ),
        'description'=>esc_html__( 'Social Links', 'dashy'),
        'priority'=>'30',
        'panel'      => 'dashy_options_panal',

    ));
    
        // facebook
    $wp_customize->add_setting( 'facebook_social', array(
        'capability' => 'edit_theme_options',
        'default' => $default['facebook_social'],
        'sanitize_callback' => 'esc_url_raw',
      ) );
      
      $wp_customize->add_control( 'facebook_social', array(
        'type' => 'text',
        'section' => 'dashy_my_social', // Add a default or your own section
        'settings'=>'facebook_social',
        'description' => __( 'Facebook','dashy' ),
      ) );
      

        // twitter
        $wp_customize->add_setting( 'twitter_social', array(
            'capability' => 'edit_theme_options',
            'default' => $default['twitter_social'],
            'sanitize_callback' => 'esc_url_raw',
          ) );
          
          $wp_customize->add_control( 'twitter_social', array(
            'type' => 'text',
            'section' => 'dashy_my_social', // Add a default or your own section
            'settings'=>'twitter_social',
            'description' => __( 'Twitter','dashy' ),
          ) );

    
        // google
        $wp_customize->add_setting( 'google_social', array(
            'capability' => 'edit_theme_options',
            'default' => $default['google_social'],
            'sanitize_callback' => 'esc_url_raw',
          ) );
          
          $wp_customize->add_control( 'google_social', array(
            'type' => 'text',
            'section' => 'dashy_my_social', // Add a default or your own section
            'settings'=>'google_social',
            'description' => __( 'Google','dashy' ),
          ) );

              // Instgram
              $wp_customize->add_setting( 'instagram_social', array(
                'capability' => 'edit_theme_options',
                'default' => $default['instagram_social'],
                'sanitize_callback' => 'esc_url_raw',
              ) );
              
              $wp_customize->add_control( 'instagram_social', array(
                'type' => 'text',
                'section' => 'dashy_my_social', // Add a default or your own section
                'settings'=>'instagram_social',
                'description' => __( 'instgram','dashy' ),
              ) );
   
    