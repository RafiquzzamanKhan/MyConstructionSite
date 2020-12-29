<?php
$wp_customize->add_section(
	'footer_sections',
	array(
		'priority'       => 1,
		'panel'          => 'faith-blog',
		'title'          => __( 'Footer Sections', 'faith-blog' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'transparent_footer_bg',
	array(
		'default' => false,
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'faith_blog_sanitize_checkbox'
	)
);
$wp_customize->add_control(
	'transparent_footer_bg',
	array(
		'label'       => __( 'Transparent Footer Background', 'faith-blog' ),
		'section'     => 'header_sections',
		'type'        => 'checkbox',
	)
);
$wp_customize->add_setting(
	'footer_column',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'faith_blog_sanitize_radio',
		'default'     => 'four',
	)
);
$wp_customize->add_control(
	'footer_column',
	array(
		'label'       => __( 'Footer Column', 'faith-blog' ),
		'section'     => 'footer_sections',
		'type'        => 'radio',
		'choices' => array(
			'two' => __( '2 Column', 'faith-blog' ),
			'three' => __( '3 Column', 'faith-blog' ),
			'four' => __( '4 Column', 'faith-blog' ),
		),
	)
);

$wp_customize->add_setting(
	'copyright_text',
	array(
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'wp_kses_post',
	)
);
// Control: Name.
$wp_customize->add_control(
	'copyright_text',
	array(
		'label'       => __( 'Copyright Text', 'faith-blog' ),
		'section'     => 'footer_sections',
		'type'        => 'textarea',
	)
);

