<header id="masthead" class="site-header header-three" style="background-image: url(<?php echo esc_url( get_header_image());?>);">
	<div class="row">
		<div class="col-md-12 order-md-0 order-1">
			<?php
			$menu_default_class = 'menu-area yellowbg';
			$transparent_menu_bg = get_theme_mod( 'transparent_menu_bg', false );
			if (true === $transparent_menu_bg) {
				$menu_default_class = 'menu-area';
			}
			?>
			<div id="mainmenu" class="<?php echo esc_attr($menu_default_class);?>">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-9 align-self-center text-center">
							<div class="cssmenu" id="cssmenu">
								<?php
									wp_nav_menu(array(
										'theme_location'	=>	'main-menu',
										'container'			=>	'ul',
									));
								?>    
		                    </div>
						</div>
						<div class="col-lg-3 align-self-center">
							<div class="social-link-top">
								<?php faith_blog_social_activity();?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 order-md-1 order-0">
			<div class="logo-area">
				<div class="container">
					<div class="row justify-content-between align-items-center">
						<div class="col-md-12 align-self-center text-center">
							<div class="site-branding">
								<?php
								if ( has_custom_logo() ) :
									the_custom_logo();
								endif;
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
							
								$faith_blog_description = get_bloginfo( 'description', 'display' );
								if ( $faith_blog_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo esc_html( $faith_blog_description ); /* WPCS: xss ok. */ ?></p>
									<?php
								endif;
								?>
							</div><!-- .site-branding -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header><!-- #masthead -->

<div class="searchform-area">
 	<div class="search-close">
 		<i class="fa fa-close"></i>
 	</div>
 	<div class="search-form-inner">
	 	<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</div>
 </div>