
<?php get_header();?>

<div id="content-wrap" class="container">
	<div  class="post"  style=" width:70%; float: left;">
	<h6>san pham</h6>
		<?php 
		if(have_posts()):while(have_posts()):the_post();?>
		
			<div class="card_post">		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="blog-post-item">
						<?php post_thumbnail('thumbnail')?>
						<?php the_author() ?>
						<div class="entry-container">
						<?php printf (get_the_date()) ?>
							<div class="title-post">
								<?php title() ?>
							</div>
							<header class="entry-header">
								<?php content() ?>
							</header>
							
						</div>
						<?php ?>
					</div>
				</article>
			</div>
		<?php endwhile;?>
		
		<div class="panigaton " style="width:70%">
	
			<?php pagainate_post(); ?>
		</div>

		<?php endif;?>
	</div>

	<div class="sidebar"  style=" width:29%; float: right;">
		<?php if ( is_active_sidebar( 'sidebar-post' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-post' ); ?>
		
		<?php endif; ?>
	
	</div>
</div>

<?php get_footer(); ?>

