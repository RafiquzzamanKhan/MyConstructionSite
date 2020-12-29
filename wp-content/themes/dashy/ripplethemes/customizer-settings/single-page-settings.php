<?php

 
$wp_customize->add_section('dashy_single_page_section',array(
    'title'=>esc_html__( 'Single Page Settings', 'dashy' ),
    'panel'      => 'dashy_options_panal',
    
    'priority'=>'30'    
));

$wp_customize->add_setting( 'you_may_like_title',
        array(
            'default'           => $default['you_may_like_title'],
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control( 'you_may_like_title',
        array(
            'label'    => esc_html__( 'Related Posts Title', 'dashy' ),
            'section'  => 'dashy_single_page_section',
            'type'     => 'text',
            'priority' => 100,
        )
    );

    
    $wp_customize->add_setting(
        'dashy_show_related',
        array(
           'default'            => $default['dashy_show_related'], // Set default value
           'sanitize_callback'  => 'dashy_sanitize_checkbox', // Sanitize input
           )
    );
   
    $wp_customize->add_control(
        new WP_Customize_Control(
               $wp_customize,
               'dashy_show_related', // Setting ID
               array(
                   'label'     => __('Show Related Posts', 'dashy'),
                   'section'   => 'dashy_single_page_section', // No hyphen
                   'settings'  => 'dashy_show_related', // Setting ID
                   'type'      => 'checkbox',
               )
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
                   'section'   => 'dashy_single_page_section', // No hyphen
                   'settings'  => 'dashy_post_next_post_link', // Setting ID
                   'type'      => 'checkbox',
               )
           )
    );
