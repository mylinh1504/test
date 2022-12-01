<?php  get_header();?>
<div class="content">
    <div id="id-content">
        <?php if(have_posts()): while(have_posts()): the_post();?>
        <?php get_template_part('content', get_post_format()); ?>
           
        <?php  endwhile ?>
        <?php endif ?>
    </div>
</div>
<div class="sidebar">
    <?php get_sidebar(); ?>
</div>


<?php  get_footer();?>


