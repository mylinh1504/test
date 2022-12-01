<article id="post <?php the_ID()?>" <?php post_class() ?>>
<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author(); ?></a>
    <div class="entry-header">
      <?php linh_entry_header();?>
    </div>
     <div class="entry-meta">
        <?php  linh_entry_meta()?>
     </div>
     <div class="entry_meta_content">
      <?php linh_entry_meta_content();?>
      <?php the_content()?>
     </div>
</article>