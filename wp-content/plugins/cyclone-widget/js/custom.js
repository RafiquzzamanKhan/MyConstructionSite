jQuery(document).ready(function(){

	jQuery("#profile, #messages").hide();

	jQuery("#popular_tab").click(function(){
		jQuery("#profile, #messages").hide();
		jQuery("#home").show();
		jQuery('.cyclone-tabs li').removeClass( 'active' );
		setTimeout(function(){ jQuery('.cyclone-tabs li#popular_tab').addClass( 'active' ); }, 10);
		
	});

	jQuery("#recent_tab").click(function(){
		jQuery("#profile").show();
		jQuery("#home, #messages").hide();
		jQuery('.cyclone-tabs li').removeClass( 'active' );
		setTimeout(function(){ jQuery('.cyclone-tabs li#recent_tab').addClass( 'active' ); }, 10);
		
	});

	jQuery("#comment_tab").click(function(){
		jQuery("#messages").show();
		jQuery("#home, #profile").hide();
		jQuery('.cyclone-tabs li').removeClass( 'active' );
		setTimeout(function(){ jQuery('.cyclone-tabs li#comment_tab').addClass( 'active' ); }, 10);
		
	});

});
