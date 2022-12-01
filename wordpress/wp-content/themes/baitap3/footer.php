
</div>
	<footer id="colophon" class="site-footer">
		<?php if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) || is_active_sidebar( 'sidebar-4' ) ) : ?>
			<div id="footer-widgets" class="container">
				<?php
					get_template_part( 'inc/footer', 'widgets' );
				?>
				
			</div>
		<?php endif; ?>
		
		<?php primarymenu('footer_menu');?>
		
		<div class="site-info">
			<div class="container">	
				<?php
					$copyright_text = sprintf( __( 'nước hoa by %s', 'baitap' ), '<a target="_blank" rel="designer" href="'.esc_url( 'https://kantipurthemes.com/' ).'">'. esc_html__( 'Kantipur Themes', 'ten-blog' ). '</a>' ); ?>
				<?php echo $copyright_text; ?>
			</div>
		</div>
	</footer>

<a href="#page" class="to-top"></a>
	
</div>

<?php wp_footer(); ?>

</body>
</html>
