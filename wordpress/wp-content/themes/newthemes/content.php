<article id="post <?php the_ID()?>" <?php post_class() ?>>

    <div class="entry-thumbnail">
        <?php linh_thumbnail('thumbnail') ?>
    
    </div>
    
    <div class="entry-header">
      <?php linh_entry_header();
    //     the_modified_time();
      ?>
    </div>
     <div class="entry-meta">
        <?php  linh_entry_meta()?>
     </div>
     <div class="entry_meta_content">
      <?php ?>
     </div>


     <div class="panigation">
      <?php the_posts_pagination( array(
      'mid_size'  => 2,
      'prev_text' => __( 'quay lại', 'dulich' ),
      'next_text' => __( 'tiếp', 'dulich' ),
      ) ); ?>
     </div>
</article>

