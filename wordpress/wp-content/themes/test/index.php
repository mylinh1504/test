<?php echo "index ok" ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ten-blog' ); ?></a>
	
	<header id="masthead" class="site-header">
		<div class="container">
			<div class="site-branding">
				<div class="site-branding-logo">
					<?php the_post_thumbnail(); ?>
				</div><!-- .site-branding-logo -->

				<div class="site-branding-text">
					<?php if ( is_home()) : ?>

						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>

					<?php
					$description = get_bloginfo( 'description', 'display' );

					if ( $description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo esc_html( $description ); ?></p>
					<?php endif; ?>
				</div><!-- .site-branding-text -->
			</div><!-- .site-branding -->
		
			<nav id="site-navigation" class="main-navigation navigation-menu">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<?php
						echo ten_blog_get_svg( array( 'icon' => 'bars' ) );
						echo ten_blog_get_svg( array( 'icon' => 'close' ) );
					?>
				</button>
				
			

			</nav>
			
		</div>
		<?php primarymenu();?>
	</header>
	

	<div id="content" class="site-content">
		<?php if( is_front_page() || !is_paged() ) {
			get_template_part( 'inc/header', 'image' );
		} ?>
		
	
