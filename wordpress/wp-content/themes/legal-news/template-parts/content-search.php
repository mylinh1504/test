<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Legal_News
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mag-post-single">
		<div class="mag-post-img">
			<?php legal_news_post_thumbnail(); ?>
		</div>
		<div class="mag-post-detail">
			<?php
			$hide_category = get_theme_mod( 'legal_news_post_hide_category', false );
			if ( $hide_category === false ) {
				?>
			<div class="mag-post-category">
				<?php legal_news_categories_list(); ?>
			</div>
				<?php
			}
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title mag-post-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title mag-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				?>
			<div class="mag-post-meta">
				<?php
				legal_news_posted_by();
				legal_news_posted_on();
				?>
			</div>
			<div class="mag-post-excerpt">
				<?php the_excerpt(); ?>
			</div>
		</div>	
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
