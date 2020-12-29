<?php 
add_action( 'init' , 'travelers_blog_kirki_fields_cyclone_widgets' );
function travelers_blog_kirki_fields_cyclone_widgets() {

	if ( !class_exists( 'Kirki' ) ) {
		return;
	}

	/*
	*
	* Detail Page
	*/
	Kirki::add_section( 'detail', array(
	    'title'          => esc_html__( 'Detail Page', 'travelers-blog' ),
	    'panel'          => 'theme_options',
	    'capability'     => 'edit_theme_options',
	) );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'toggle',
		'settings'    => 'show_hide_count',
		'label'       => esc_html__( 'Show/Hide Views', 'travelers-blog' ),
		'section'     => 'detail',
		'default'     => '1',
		'priority'    => 10,
	) );

}