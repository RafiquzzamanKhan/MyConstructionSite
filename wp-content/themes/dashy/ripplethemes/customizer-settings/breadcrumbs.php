<?php


$wp_customize->add_section('dashy_breadcrumbs',array(
    'title'=>esc_html__( 'Breadcrumbs', 'dashy' ),
    'panel'      => 'dashy_options_panal',
    
    'priority'=>'30'    
));

$wp_customize->add_setting(
    'dashy_show_breadcrumbs',
    array(
       'default'   => $default['dashy_show_breadcrumbs'], // Set default value
       'sanitize_callback' => 'dashy_sanitize_checkbox', // Sanitize input
       )
);

$wp_customize->add_control(
    new WP_Customize_Control(
           $wp_customize,
           'dashy_show_breadcrumbs', // Setting ID
           array(
               'label'     => __('Show Breadcrumbs', 'dashy'),
               'section'   => 'dashy_breadcrumbs', // No hyphen
               'settings'  => 'dashy_show_breadcrumbs', // Setting ID
               'type'      => 'checkbox',
           )
       )
);
