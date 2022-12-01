<?php get_header() ?>
<?php echo admin_url(); ?><br>
<?php printf( __( 'The post type is: %s', 'textdomain' ), get_post_type( get_the_ID() ) ); ?>
<div class=" container">
<?php if(have_posts()):while(have_posts()):the_post()?>
    <?php the_title()?>
    <?php the_content()?>


<?php link_page() ?>


  <?php   
 
    // echo '<pre>';
    // print_r ($wp_query);
    // echo '</pre>';

   ?>
<?php endwhile?>
<?php endif ?>



