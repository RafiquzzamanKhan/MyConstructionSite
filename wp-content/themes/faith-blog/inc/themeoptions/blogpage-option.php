<?php
/*Blog Page Settings*/
$wp_customize->add_section(
	'blog_page_settings',
	array(
		'priority'       => 6,
		'panel'          => 'faith-blog',
		'title'          => __( 'Blog Settings', 'faith-blog' ),
		'description'    => __( 'Customize Blog Page', 'faith-blog' ),
		'capability'     => 'edit_theme_options',
	)
);

$wp_customize->add_setting(
	'blog_layout',
	array(
		'default' => 'grid',
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'faith_blog_sanitize_radio'
	)
);

$wp_customize->add_control(
	'blog_layout',
	array(
		'label'       => __( 'Blog Layout', 'faith-blog' ),
		'section'     => 'blog_page_settings',
		'type'        => 'radio',
		'choices'  => array(
			'grid'  => __( 'Grid', 'faith-blog' ),
			'list' => __( 'List', 'faith-blog' ),
		),
	)
);
$wp_customize->add_setting(
	'grid_column',
	array(
		'default' => 'col-sm-4',
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'faith_blog_sanitize_radio'
	)
);
$wp_customize->add_control(
	'grid_column',
	array(
		'label'       => __( 'Grid Column', 'faith-blog' ),
		'section'     => 'blog_page_settings',
		'type'        => 'radio',
		'choices'  => array(
			'col-sm-3'  => __( '4 Colmun', 'faith-blog' ),
			'col-sm-4' => __( '3 Column', 'faith-blog' ),
			'col-sm-6' => __( '2 Column', 'faith-blog' ),
		),
	)
);
$wp_customize->add_setting(
	'blog_page_sidebar',
	array(
		'default' => 'no',
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'faith_blog_sanitize_radio'
	)
);
$wp_customize->add_control(
	'blog_page_sidebar',
	array(
		'label'       => __( 'Blog Sidebar', 'faith-blog' ),
		'section'     => 'blog_page_settings',
		'type'        => 'radio',
		'choices'  => array(
			'left'  => __( 'Left Sidebar', 'faith-blog' ),
			'right' => __( 'Right Sidebar', 'faith-blog' ),
			'no' => __( 'No Sidebar', 'faith-blog' ),
		),
	)
);

$wp_customize->add_setting(
	'readmore_text',
	array(
		'default' => __( 'Read More', 'faith-blog' ),
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'wp_kses_post'
	)
);
$wp_customize->add_control(
	'readmore_text',
	array(
		'label'       => __( 'Read More Text', 'faith-blog' ),
		'section'     => 'blog_page_settings',
		'type'        => 'text',
	)
);
$wp_customize->add_setting(
	'blog_page_pagination',
	array(
		'default' => 'center',
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'faith_blog_sanitize_radio'
	)
);
$wp_customize->add_control(
	'blog_page_pagination',
	array(
		'label'       => __( 'Pagination Alignment', 'faith-blog' ),
		'section'     => 'blog_page_settings',
		'type'        => 'radio',
		'choices'  => array(
			'left'  => __( 'Left', 'faith-blog' ),
			'right' => __( 'Right', 'faith-blog' ),
			'center' => __( 'center', 'faith-blog' ),
		),
	)
);
