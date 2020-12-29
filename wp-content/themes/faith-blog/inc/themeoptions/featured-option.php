<?php
$wp_customize->add_section(
	'featured_section',
	array(
		'priority'       => 1,
		'panel'          => 'faith-blog',
		'title'          => __( 'Featured Section', 'faith-blog' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'featured_section_on_off',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'faith_blog_sanitize_checkbox',
		'default'     => false,
	)
);
$wp_customize->add_control(
	'featured_section_on_off',
	array(
		'label'       => __( 'Featured Section On//Off', 'faith-blog' ),
		'section'     => 'featured_section',
		'type'        => 'checkbox',
	)
);

$wp_customize->add_setting(
	'featured_categories',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'faith_blog_category_sanitize',
	)
);

$wp_customize->add_control(
	new faith_blog_Customize_Control_Multiple_Select (
	$wp_customize, 
	'featured_categories',
	array(
		'label'       => __( 'Select Posts Categries', 'faith-blog' ),
		'section'     => 'featured_section',
		'type'        => 'faith-blog-multiple-select',
		'choices' => faith_blog_get_categories(),
	)
));
