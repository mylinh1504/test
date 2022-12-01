<section id= "<?php  the_ID()?>"<?php post_class(); ?>>

 <?php linh_thumbnail('thumbnail') ?>


<div class="content">
<a href="<?php the_permalink()?>"> <?php  the_title()?></a>
<?php  the_content()?>
</div>

<div class="pagisnation"> 
    <?php link_page() ?>
</div>

 