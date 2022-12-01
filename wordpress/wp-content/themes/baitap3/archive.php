<?php get_header();?>
<?php global $qr; ?>
<div id="content-wrap" class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">					
			<div class="blog-archive columns-3 clear">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) :the_post();
					
echo 'okokokoko';
echo get_option( 'admin_email' ); 

					endwhile;

				else :

					

				endif;
				?>
			</div>

			
		</main>
	</div>

<?php get_sidebar(); ?>

</div>

<?php
get_footer();
