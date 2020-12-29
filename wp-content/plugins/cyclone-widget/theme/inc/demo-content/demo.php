<?php

/**
* Remove branding
*/
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

add_filter( 'pt-ocdi/import_files', 'travelers_blog_import_files' );
function travelers_blog_import_files() {
	return array(
		array(
			'import_file_name'             => esc_html__( 'Theme Demo Content', 'travelers-blog' ),
			'local_import_file'            => trailingslashit( plugin_dir_path( __FILE__ ) )  . 'content.xml',
			'local_import_widget_file'     => trailingslashit( plugin_dir_path( __FILE__ ) ) . 'widgets.wie',
			'local_import_customizer_file' => trailingslashit( plugin_dir_path( __FILE__ ) ) . 'customizer.dat',
		)
	);
}