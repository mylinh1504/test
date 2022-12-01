<article id="post <?php the_ID()?>" <?php post_class() ?>>
    <div class="entry-thumbnail">
        <?php linh_thumbnail('large') ?>
    
    </div>
    <div class="entry-header">
      <?php linh_entry_header();?>
      <?php 
      $attachment = get_children(array('post_parent'=>$post->ID));
      $attachment_number = count($attachment);
        printf(__('this image post %1$s photo', 'dulich'), $attachment_number);
      ?>
    </div>
    
     <div class="entry_meta_content">
      <?php linh_entry_meta_content();?>
      <?php ?>
     </div>
</article>