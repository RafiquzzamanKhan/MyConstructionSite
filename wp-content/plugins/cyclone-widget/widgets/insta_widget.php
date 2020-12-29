<?php 

/**
* Cyclone Instagram Widget
*/

// Register and load the widget
function cylcone_instagram_widget() {
	register_widget( 'cyclone_instagram_loaded_widget' );
}
add_action( 'widgets_init', 'cylcone_instagram_widget' );

// Creating the widget 
class cyclone_instagram_loaded_widget extends WP_Widget {

	function __construct() {

		parent::__construct(

		// Base ID of your widget
		'cyclone_instagram_loaded_widget', 

		// Widget name will appear in UI
		esc_html__( 'CYCLONE Instagram', 'cyclone-widget' ), 

		// Widget description
		array( 'description' => esc_html__( 'You can add instagram images in the widgets', 'cyclone-widget' ), ) 
		);
	}

	// Creating widget front-end

	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', ( !empty( $instance['title'] ) ? esc_html( $instance['title'] ) : '' ) );
		$username = $instance[ 'instagram_username' ];

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];

		if ( ! empty( $title ) )
			echo $args['before_title'] . esc_html($title) . $args['after_title'];

		// This is where you run the code and display the output
		$id = 'instagram_' . rand(0,9999);
		
		echo '<div id="' . esc_html($id) . '" class="instagram_widget"></div>'; 
		
		?>


		<script>

			jQuery(document).ready(function() {

			  	jQuery('#<?php echo esc_html( $id ); ?>').on('didLoadInstagram', function(event, response) {
			  		var id = jQuery(this);

	    			jQuery.each(response.data, function (i, currProgram) {
					  	id.append( '<div><a target="_blank" href="' + jQuery(this)[0].link + '"><img src="' + jQuery(this)[0].images.thumbnail.url + '"></a></div>' );
					});

  				});

			  	jQuery('#<?php echo esc_html( $id ); ?>').instagram({
					count: <?php echo ( !empty( $instance['photos_to_show'] ) ? esc_html( $instance['photos_to_show'] ) : '' ); ?>,
					clientId: "<?php echo ( !empty( $instance['instagram_user_id'] ) ? esc_html( $instance['instagram_user_id'] ) : '' ); ?>",
					accessToken: "<?php echo ( !empty( $instance['instagram_access_token'] ) ? esc_html( $instance['instagram_access_token'] ) : '' ); ?>"
			  	});

			});

		</script>

		<?php
		echo $args['after_widget'];
	}
		
	// Widget Backend 
	public function form( $instance ) {	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:' , 'cyclone-widget' ); ?></label> 
			<input 
			class="widefat" 
			id="<?php echo $this->get_field_id( 'title' ); ?>" 
			name="<?php echo $this->get_field_name( 'title' ); ?>" 
			type="text" 
			value="<?php echo ( !empty( $instance['title'] ) ? esc_html( $instance['title'] ) : '' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'instagram_user_id' ); ?>"><?php esc_html_e( 'Instagram User Id * :', 'cyclone-widget' ); ?></label> 
			<input 
			class="widefat" 
			id="<?php echo $this->get_field_id( 'instagram_user_id' ); ?>" 
			name="<?php echo $this->get_field_name( 'instagram_user_id' ); ?>" 
			type="text" 
			value="<?php echo ( !empty( $instance['instagram_user_id'] ) ? esc_html( $instance['instagram_user_id'] ) : '' ); ?>" />
		</p>


		<p>
			<label for="<?php echo $this->get_field_id( 'instagram_username' ); ?>"><?php esc_html_e( 'Instagram Username * :', 'cyclone-widget' ); ?></label> 
			<input 
			class="widefat" 
			id="<?php echo $this->get_field_id( 'instagram_username' ); ?>" 
			name="<?php echo $this->get_field_name( 'instagram_username' ); ?>" 
			type="text" 
			value="<?php echo ( !empty( $instance['instagram_username'] ) ? esc_html( $instance['instagram_username'] ) : '' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'instagram_access_token' ); ?>"><?php esc_html_e( 'Instagram Access Token * :', 'cyclone-widget' ); ?></label> 
			<input 
			class="widefat" 
			id="<?php echo $this->get_field_id( 'instagram_access_token' ); ?>" 
			name="<?php echo $this->get_field_name( 'instagram_access_token' ); ?>" 
			type="text" 
			value="<?php echo ( !empty( $instance['instagram_access_token'] ) ? esc_html( $instance['instagram_access_token'] ) : '' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'photos_to_show' ); ?>"><?php esc_html_e( 'No. of photos to show * :', 'cyclone-widget' ); ?></label> 
			<input 
			class="widefat" 
			id="<?php echo $this->get_field_id( 'photos_to_show' ); ?>" 
			name="<?php echo $this->get_field_name( 'photos_to_show' ); ?>" 
			type="text" 
			value="<?php echo ( !empty( $instance['photos_to_show'] ) ? esc_html( $instance['photos_to_show'] ) : '' ); ?>" />
		</p>

		<?php 
	}
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['instagram_user_id'] = ( ! empty( $new_instance['instagram_user_id'] ) ) ? sanitize_text_field( $new_instance['instagram_user_id'] ) : '';

		$instance['instagram_username'] = ( ! empty( $new_instance['instagram_username'] ) ) ? sanitize_text_field( $new_instance['instagram_username'] ) : '';

		$instance['instagram_access_token'] = ( ! empty( $new_instance['instagram_access_token'] ) ) ? sanitize_text_field( $new_instance['instagram_access_token'] ) : '';

		$instance['photos_to_show'] = ( is_numeric( $new_instance['photos_to_show'] ) ) ? (int) $new_instance['photos_to_show'] : 9;

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;
	}
} 