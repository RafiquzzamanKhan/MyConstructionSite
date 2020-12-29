<?php
/**
 * Sticky Header
 */
$wp_customize->add_section(
	'header_sections',
	array(
		'priority'       => 1,
		'panel'          => 'faith-blog',
		'title'          => __( 'Header Section', 'faith-blog' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'transparent_menu_bg',
	array(
		'default' => false,
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'faith_blog_sanitize_checkbox'
	)
);
$wp_customize->add_control(
	'transparent_menu_bg',
	array(
		'label'       => __( 'Transparent Menu Background', 'faith-blog' ),
		'section'     => 'header_sections',
		'type'        => 'checkbox',
	)
);

$wp_customize->add_setting(
	'sticky_header',
	array(
		'default' => false,
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'faith_blog_sanitize_checkbox'
	)
);
$wp_customize->add_control(
	'sticky_header',
	array(
		'label'       => __( 'Sticky Header On//Off', 'faith-blog' ),
		'section'     => 'header_sections',
		'type'        => 'checkbox',
	)
);

$wp_customize->add_setting(
	'header_height',
	array(
		'default' => 120,
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'faith_blog_sanitize_number_absint',
	)
);
$wp_customize->add_control(
	'header_height',
	array(
		'label'       => __( 'Logo Section Height', 'faith-blog' ),
		'section'     => 'header_sections',
		'type'        => 'number',
	)
);