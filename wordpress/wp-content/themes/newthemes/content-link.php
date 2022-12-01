<article id="post <?php the_ID()?>" <?php post_class() ?>>
    <div class="entry-thumbnail">
        <?php linh_thumbnail('thumbnail') ?>
    
    </div>
    <div class="entry-header">
      <?php 
      $link = get_post_meta($post->ID, 'format_link_url', true);
      $link_description = get_post_meta($post->ID, 'format_link_description', true);
      if(is_single()){
        printf('<h1 class="entry-title"><a href="%1$s" target="blank">%2$s</a></h1>',
        $link, get_the_title());
      }else{
         printf('<h3 class="entry-title"><a href="%1$s" target="blank">%2$s</a></h3>',
        $link, get_the_title());
      }
      ?>  
      <?php linh_entry_header();
    //     the_modified_time();
      ?>
    </div>
     <div class="entry-meta">
        <?php  linh_entry_meta()?>
        <?php 
            printf('<a href="%1$s" >%2$s</a>',
            $link,$link_description 
        ) ?>
     </div>
     <div class="entry_meta_content">
      <?php linh_entry_meta_content();?>
      <?php ?>
     </div>
</article>
