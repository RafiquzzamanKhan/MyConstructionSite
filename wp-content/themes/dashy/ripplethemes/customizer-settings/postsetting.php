<?php


$wp_customize->add_section('dashy_post_setting',array(
        'title'=>esc_html__( 'Post Settings', 'dashy' ),
        'panel'      => 'dashy_options_panal',
        
        'priority'=>'30'    
    ));
     $wp_customize->add_setting(
         'dashy_post_show_author',
         array(
            'default'   => $default['dashy_post_show_author'], // Set default value
            'sanitize_callback' => 'dashy_sanitize_checkbox', // Sanitize input
            )
     );
    
     $wp_customize->add_control(
         new WP_Customize_Control(
                $wp_customize,
                'dashy_post_show_author', // Setting ID
                array(
                    'label'     => __('Show Author', 'dashy'),
                    'section'   => 'dashy_post_setting', // No hyphen
                    'settings'  => 'dashy_post_show_author', // Setting ID
                    'type'      => 'checkbox',
                )
            )
     );


     $wp_customize->add_setting(
        'dashy_post_show_date',
        array(
           'default'            => $default['dashy_post_show_date'], // Set default value
           'sanitize_callback'  => 'dashy_sanitize_checkbox', // Sanitize input
           )
    );
   
    $wp_customize->add_control(
        new WP_Customize_Control(
               $wp_customize,
               'dashy_post_show_date', // Setting ID
               array(
                   'label'     => __('Show Posted Date', 'dashy'),
                   'section'   => 'dashy_post_setting', // No hyphen
                   'settings'  => 'dashy_post_show_date', // Setting ID
                   'type'      => 'checkbox',
               )
           )
    );


           // Setting Read More Text.
        $wp_customize->add_setting( 'dashy_readmore_text',
        array(
            'default'           => $default['dashy_readmore_text'],
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
        );

        $wp_customize->add_control( 'dashy_readmore_text',
        array(
            'label'    => esc_html__( 'Read more button text', 'dashy' ),
            'section'  => 'dashy_post_setting',
            'type'     => 'text',
            'priority' => 40,
            'settings'  => 'dashy_readmore_text', // Setting ID
        )
        );




      $wp_customize->add_setting(
        'dashy_post_next_post_link',
        array(
           'default'   => $default['dashy_post_next_post_link'], // Set default value
           'sanitize_callback' => 'dashy_sanitize_checkbox', // Sanitize input
           )
    );
   
    $wp_customize->add_control(
        new WP_Customize_Control(
               $wp_customize,
               'dashy_post_next_post_link', // Setting ID
               array(
                   'label'     => __('Next/Previous Post Link', 'dashy'),
                   'section'   => 'dashy_post_setting', // No hyphen
                   'settings'  => 'dashy_post_next_post_link', // Setting ID
                   'type'      => 'checkbox',
               )
           )
    );

