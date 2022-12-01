<?php
if(!function_exists('them_setup')){
    function them_setup(){
        register_nav_menus( 
          array(
            'primary_menus' => __('primary', 'mypham'),
            'footer_menus'=>__('footer','mypham')
          )  
          );
        remove_theme_support( 'widgets-block-editor' );
        
    }
    add_action('init', 'them_setup');
}
if(!function_exists('linh_menu')){
    function linh_menu(){
      $menus=  array(
            'theme_location' => 'primary_menu',
            'container' => 'li',
            'container_class' => '',
        );
        wp_nav_menu($menus);

    }
}
if(!function_exists('linh_thumbnail')){

  function linh_thumbnail($size){
  if( !is_single() && has_post_thumbnail() && !post_password_required() )
  {?>
      <figure class="post-thumbnail" <?php the_permalink()?>><?php  the_post_thumbnail($size)?></figure>
  <?php } 
  }
}

register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'textdomain' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );

function wpdocs_theme_name_scripts() {
	 wp_enqueue_style( 'style-name', get_stylesheet_directory_uri() .'/style.css',array(), '1.0.0' );
	// wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

//get_Post_type
// function get_post_type( $post = null ) {
// 	$post = get_post( $post );
// 	if ( $post ) {
// 		return $post->post_type;
// 	}

// 	return false;
// }


//phan trang
function phantrang(){

  $link_pages = array (
                  'before'      		=> '<div class="page-links-XXX"><span class="page-link-text">' . __( 'More pages: ', 'dulich' ) . '</span>',
                  'after'       		=> '</div>',
                  'link_before' 		=> '<span class="page-link">',
                  'link_after'  		=> '</span>',
                  'next_or_number'	=> 'next',
                  'separator'			=> ' | ',
                  'nextpagelink'		=> __( 'Next &raquo', 'dulich' ),
                  'previouspagelink'	=> __( '&laquo Previous', 'dulich' ),
              );
  wp_link_pages( $link_pages);

}

//shortecode
function shortcodes($ts){
  extract(shortcode_atts(
    array(
      'thamso1'=>300,
      'thamso2'=>600,

    ),$ts)); 
    $tong = $thamso1 + $thamso2;
    return  $tong;
  
}
add_shortcode('short_codes', 'shortcodes');

function youtube_shortcode($yt){
  extract(shortcode_atts(array(
    'width' =>200,
    'height'=>300,
    'id' =>'okz5RIZRT0U'
  ), $yt
  
  
));
return '<iframe width="'.$width.'" height="'.$height.'" src="https://www.youtube-nocookie.com/embed/'.$id.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

 }
add_shortcode('youtube_st', 'youtube_shortcode');



//post shortcode
function randompost($ar) {
	echo 'ok shorrt';

  extract(shortcode_atts(array(
  'limit' => 5,
  'orderby' => 'DESC',
  'date'=>'Y-m-d',
  'size'=>'thumbnail'

  ), $ar));


  $args = array(
    'posts_per_page' => $limit,
    'orderby' => $orderby,
  
  // 'day' =>$date
  );
 
  $ec = new WP_Query(  $args);

	ob_start();
	if ( $ec->have_posts() ) :
		"<ol>";
		while ($ec->have_posts() ) :
			$ec->the_post();?>
    
				<a href="<?php the_permalink(); ?>"><h5 > <?php the_title(); ?></h5></a>

        <?php the_date($date)?></br>
       <?php the_post_thumbnail($size) ?>

		<?php endwhile;
		"</ol>";
	endif;
	//$list_post = ob_get_contents(); //Lấy toàn bộ nội dung phía trên bỏ vào biến $list_post để return


	return ob_end_clean();


}
add_shortcode('rpost', 'randompost');

//readmore
function linh_readmore(){
    return '<a class="read-more" href="'.get_permalink(get_the_ID()).'"> '.__('[...Readmore]', 'mypham').'</a>';
}
add_filter('excerpt_more','linh_readmore');

//function
//current_user_can($cability, $aray):cho nguoi dung có khả năng cụ thể, edit_post , edit_user
if ( ! current_user_can( 'manage_options' ) ) {
	add_filter( 'show_admin_bar', '__return_false' );
}

function link_page(){
$arg1 = array (
	'before'      		=> '<div class="page-links-XXX"><span class="page-link-text">' . __( 'More pages: ', 'textdomain' ) . '</span>',
	'after'       		=> '</div>',
	'link_before' 		=> '<span class="page-link">',
	'link_after'  		=> '</span>',
	'next_or_number'	=> 'next',
	'separator'			=> ' | ',
	'nextpagelink'		=> __( 'Next &raquo', 'textdomain' ),
	'previouspagelink'	=> __( '&laquo Previous', 'textdomain' ),
);

wp_link_pages( $arg1 );
}