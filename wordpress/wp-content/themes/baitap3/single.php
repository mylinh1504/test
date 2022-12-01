<?php get_header();?>

<div id="content-wrap" class="container">
	<div class="single-post-wrap">
		<?php
		if( have_posts()):while(have_posts()):the_post();?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="blog-post-item">
				<header class="entry-header">
					<h1 class="entry-title"><?php title() ?></h1>
				</header>
				<div class="featured-image">
					<?php thumbnail('large') ?>
					<h6>Ngày đăng: <?php the_date() ?></h6>
				</div>
				<div class="row">
					<div class="col-lg-8">
						<div class="entry-container">
							<div class="entry-content">
								<?php content() ?>
							</div>
							<footer class="entry-footer">
								<?php ten_blog_entry_footer(); ?>
							</footer>
						</div>
					</div>
					<div class="col-lg-4">

						<?php if ( is_active_sidebar( 'sidebar-project' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-project' ); ?>
						<?php endif; ?>
					</div>
			</div>
		</article> 
			<?php endwhile; ?>
		<?php endif;?>
	</div>			
</div>
		
<?php get_footer();
