<?php

$wp_customize->add_section( 'pro_sec' , array(
    'title'          => 'Upgrade to PRO',
    'description'    => '',
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
   
) );



$wp_customize->add_control( 'button_id', array(
    'type' => 'button',
    'settings' => array(),  
    'priority' => 10,
    'section' => 'pro_sec',
    'input_attrs' => array(
        'value' => __( 'Upgrade to Pro', 'dashy' ),
        'class' => 'button-primary',
        'onclick'=>"location.href='https://ripplethemes.com/downloads/dashy-pro/'"
),
) );

$wp_customize->add_control( 'label', array(
    'type' => 'button',
    'settings' => array(),  
    'label'=>'Key Features',
    'priority' => 10,
    'section' => 'pro_sec',
    'input_attrs' => array(
        'value' => __( 'Fully Responsive', 'dashy' ),
        'class' => 'button-secondary',
       
),
) );

$wp_customize->add_control( 'label1', array(
    'type' => 'button',
    'settings' => array(),  
    
    'priority' => 10,
    'section' => 'pro_sec',
    'input_attrs' => array(
        'value' => __( 'Live Custumization', 'dashy' ),
        'class' => 'button-secondary',
       
),
) );

$wp_customize->add_control( 'label2', array(
    'type' => 'button',
    'settings' => array(),  
    
    'priority' => 10,
    'section' => 'pro_sec',
    'input_attrs' => array(
        'value' => __( 'SEO Optimized', 'dashy' ),
        'class' => 'button-secondary',
       
),
) );

$wp_customize->add_control( 'label3', array(
    'type' => 'button',
    'settings' => array(),  
    
    'priority' => 10,
    'section' => 'pro_sec',
    'input_attrs' => array(
        'value' => __( 'Many more', 'dashy' ),
        'class' => 'button-secondary',
       
),
) );






