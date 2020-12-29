<?php


$wp_customize->add_section('dashy_cat_section',array(
    'title'=>esc_html__( 'Category section Options', 'dashy' ),
    'description'=>esc_html__( 'Your options are here', 'dashy'),
    'priority'=>'20',
    'panel'      => 'dashy_options_panal',
));

$wp_customize->add_setting( 'dashy_hide_category_section', array(
    'default'   => $default['dashy_hide_category_section'], // Set default value
    'sanitize_callback' => 'dashy_sanitize_checkbox', // Sanitize input
    )
);

$wp_customize->add_control( 
    new WP_Customize_Control(
        $wp_customize,
        'dashy_hide_category_section', // Setting ID
        array(
            'label'     => __( 'Hide Category listing section', 'dashy' ),
            'section'   => 'dashy_cat_section', // No hyphen
            'settings'  => 'dashy_hide_category_section', // Setting ID
            'type'      => 'checkbox',
            'priority'=>0,

        )
    )
);

       
       $wp_customize->add_setting( 'dashy-category1',
       array(
                  'capability'        => 'edit_theme_options',
                  'default'           => $default['dashy-category1'],
                  'sanitize_callback' => 'absint',
            ) );
  

      $wp_customize->add_control(
          new dashy_Customize_Category_Dropdown_Control(
              $wp_customize,
      'dashy-category1',
              array(
                      'label'     => __( 'Select Category1', 'dashy' ),
                      'section'   => 'dashy_cat_section',
                      'settings'  => 'dashy-category1',
                      'type'      => 'category_dropdown',
                      'priority'  => 1
                   )
          )
          
      );

      $wp_customize->add_setting('cat1_img', array(
        'transport'         => 'refresh',
        'height'         => 325,
        'sanitize_callback'=>'esc_url_raw'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cat1_img', array(
        'label'             => __('Select background image for category1', 'dashy'),
        'section'           => 'dashy_cat_section',
        'settings'          => 'cat1_img',    
    )));

    //   cat2
    $wp_customize->add_setting( 'dashy-category2',
    array(
               'capability'        => 'edit_theme_options',
               'default'           => $default['dashy-category2'],
               'sanitize_callback' => 'absint',
         ) );


   $wp_customize->add_control(
       new dashy_Customize_Category_Dropdown_Control(
           $wp_customize,
   'dashy-category2',
           array(
                   'label'     => __( 'Select Category2', 'dashy' ),
                   'section'   => 'dashy_cat_section',
                   'settings'  => 'dashy-category2',
                   'type'      => 'category_dropdown',
                   'priority'  => 10
                )
       )
       
   );
   $wp_customize->add_setting('cat2_img', array(
    'transport'         => 'refresh',
    'height'         => 325,
    'sanitize_callback'=>'esc_url_raw'
));

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cat2_img', array(
    'label'             => __('Select background image for category2', 'dashy'),
    'section'           => 'dashy_cat_section',
    'settings'          => 'cat2_img',    
)));


//    cat3
$wp_customize->add_setting( 'dashy-category3',
array(
           'capability'        => 'edit_theme_options',
           'default'           => $default['dashy-category3'],
           'sanitize_callback' => 'absint',
     ) );


$wp_customize->add_control(
   new dashy_Customize_Category_Dropdown_Control(
       $wp_customize,
'dashy-category3',
       array(
               'label'     => __( 'Select Category3', 'dashy' ),
               'section'   => 'dashy_cat_section',
               'settings'  => 'dashy-category3',
               'type'      => 'category_dropdown',
               'priority'  => 30
            )
   )
   
);

$wp_customize->add_setting('cat3_img', array(
    'transport'         => 'refresh',
    'height'         => 325,
    'sanitize_callback'=>'esc_url_raw'
));

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cat3_img', array(
    'label'             => __('Select background image for category3', 'dashy'),
    'section'           => 'dashy_cat_section',
    'settings'          => 'cat3_img',   
    'priority'  => 35

)));
