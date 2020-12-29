<?php

require plugin_dir_path( __FILE__ ) . 'inc/acf-field-data/acf-field-data.php';

require plugin_dir_path( __FILE__ ) . 'inc/cyclone-customizer.php';

require plugin_dir_path( __FILE__ ) . 'inc/post-views-count.php';

require plugin_dir_path( __FILE__ ) . 'inc/categories-color.php';

require plugin_dir_path( __FILE__ ) . 'inc/demo-content/demo.php';

add_filter( 'travelers_blog_recommended_plugins', 'travelers_blog_recommended_plugins' );
function travelers_blog_recommended_plugins( $plugins ){

	$plugins[] = array(
		'name' => esc_html__( 'Advanced Custom Fields', 'travelers-blog' ),
		'slug' => 'advanced-custom-fields',
		'required' => false
	);

	$plugins[] = array(
		'name' => esc_html__( 'One Click Demo Import', 'travelers-blog' ),
		'slug' => 'one-click-demo-import',
		'required' => false
	);

	return $plugins;

}