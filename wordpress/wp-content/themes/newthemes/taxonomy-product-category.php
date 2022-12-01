<?php get_header()?>
<?php 

// The Loop
if ( have_posts() ) :
while ( have_posts() ) :the_post();
  the_title();
  the_excerpt();


  linh_thumbnail('large');
endwhile;
endif;
// Reset Post Data
wp_reset_postdata();

?>

<?php get_footer()?>