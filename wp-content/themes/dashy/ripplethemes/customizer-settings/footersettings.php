<?php
    // Layout Section.

    $wp_customize->add_section('dashy_footer_options',array(
        'title'=>esc_html__( 'Footer Options', 'dashy' ),
        'description'=>esc_html__( 'Footer options', 'dashy'),
        'priority'=>'30',
        'panel'      => 'dashy_options_panal',
    ));



        
        $wp_customize->add_setting( 'dashy_footer_copyright',
        array(
            'default'           => $default['dashy_footer_copyright'],
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'wp_kses_post',
        )
        );

        $wp_customize->add_control( 'dashy_footer_copyright',
        array(
            'label'    => esc_html__( 'Copyright Text', 'dashy' ),
            'section'  => 'dashy_footer_options',
            'type'     => 'textarea',
            'priority' => 40,
            'settings'  => 'dashy_footer_copyright', // Setting ID

        )
        );

          
            $wp_customize->add_setting( 'dashy_footer_poweredby',
            array(
                'default'           => $default['dashy_footer_poweredby'],
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'wp_kses_post',
            )
            );
    
            $wp_customize->add_control( 'dashy_footer_poweredby',
            array(
                'label'    => esc_html__( 'Powered By Text', 'dashy' ),
                'section'  => 'dashy_footer_options',
                'type'     => 'textarea',
                'priority' => 40,
                'settings'  => 'dashy_footer_poweredby', // Setting ID
    
            )
            );



            $wp_customize->add_setting(
                'show_logo_in_footer',
                array(
                   'default'   => $default['show_logo_in_footer'], // Set default value
                   'sanitize_callback' => 'dashy_sanitize_checkbox', // Sanitize input
                   )
            );
           
            $wp_customize->add_control(
                new WP_Customize_Control(
                       $wp_customize,
                       'show_logo_in_footer', // Setting ID
                       array(
                           'label'     => __('Show logo in footer', 'dashy'),
                           'section'   => 'dashy_footer_options', // No hyphen
                           'settings'  => 'show_logo_in_footer', // Setting ID
                           'type'      => 'checkbox',
                       )
                   )
            );

