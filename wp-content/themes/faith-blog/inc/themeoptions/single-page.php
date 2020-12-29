<?php
$wp_customize->add_section(
	'post_details',
	array(
		'priority'       => 1,
		'panel'          => 'faith-blog',
		'title'          => __( 'Single Post', 'faith-blog' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'single_page_sidebar',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'faith_blog_sanitize_select',
		'default'     => 'right',
	)
);
$wp_customize->add_control(
	'single_page_sidebar',
	array(
		'label'       => __( 'Single Post Sidebar', 'faith-blog' ),
		'section'     => 'post_details',
		'type'        => 'select',
		'choices'  => array(
			'left'  => __( 'Left Sidebar', 'faith-blog' ),
			'right' => __( 'Right Sidebar', 'faith-blog' ),
			'no' => __( 'No Sidebar', 'faith-blog' ),
		),
	)
);
$wp_customize->add_setting(
	'post_navigation_show',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'faith_blog_sanitize_checkbox',
		'default'     => true,
	)
);
$wp_customize->add_control(
	'post_navigation_show',
	array(
		'label'       => __( 'Post Navigation Show', 'faith-blog' ),
		'section'     => 'post_details',
		'type'        => 'checkbox',
	)
);