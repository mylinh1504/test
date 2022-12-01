<?php
/**
 * Displays header media
 *
 * @package ten_blog
 */

?>

<div class="custom-header-media">
    <?php the_custom_header_markup(); ?>
    <header class="page-header">
        <h1 class="page-title"><?php single_post_title(); ?></h1>
    </header>
</div><!-- .custom-header-media -->
