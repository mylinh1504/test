<?php
/**
 * Ten Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ten_blog
 */



if ( ! function_exists( 'theme_setup' ) ) :
	/*Sets up theme defaults and registers support for various WordPress features.*/
	function theme_setup() {
		
		load_theme_textdomain( 'ten-blog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary_menu' => esc_html__( 'primary', 'baitap' ),
			'footer_menu'  =>esc_html__('footer Menu','baitap'),

		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ten_blog_custom_background_args', array(
			'default-color' => 'fff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

	
		add_editor_style( array( '/assets/css/editor-style.css', ten_blog_get_fonts_url() ) );

		// Gutenberg support
		add_theme_support( 'editor-color-palette', array(
	       	array(
				'name' => esc_html__( 'Blue', 'ten-blog' ),
				'slug' => 'blue',
				'color' => '#2c7dfa',
	       	),
	       	array(
	           	'name' => esc_html__( 'Green', 'ten-blog' ),
	           	'slug' => 'green',
	           	'color' => '#07d79c',
	       	),
	       	array(
	           	'name' => esc_html__( 'Orange', 'ten-blog' ),
	           	'slug' => 'orange',
	           	'color' => '#ff8737',
	       	),
	       	array(
	           	'name' => esc_html__( 'Black', 'ten-blog' ),
	           	'slug' => 'black',
	           	'color' => '#2f3633',
	       	),
	       	array(
	           	'name' => esc_html__( 'Grey', 'ten-blog' ),
	           	'slug' => 'grey',
	           	'color' => '#82868b',
	       	),
	   	));

		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-font-sizes', array(
		   	array(
		       	'name' => esc_html__( 'small', 'ten-blog' ),
		       	'shortName' => esc_html__( 'S', 'ten-blog' ),
		       	'size' => 12,
		       	'slug' => 'small'
		   	),
		   	array(
		       	'name' => esc_html__( 'regular', 'ten-blog' ),
		       	'shortName' => esc_html__( 'M', 'ten-blog' ),
		       	'size' => 16,
		       	'slug' => 'regular'
		   	),
		   	array(
		       	'name' => esc_html__( 'larger', 'ten-blog' ),
		       	'shortName' => esc_html__( 'L', 'ten-blog' ),
		       	'size' => 36,
		       	'slug' => 'larger'
		   	),
		   	array(
		       	'name' => esc_html__( 'huge', 'ten-blog' ),
		       	'shortName' => esc_html__( 'XL', 'ten-blog' ),
		       	'size' => 48,
		       	'slug' => 'huge'
		   	)
		));
		add_theme_support('editor-styles');
		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'theme_setup' );

/**

 */
function ten_blog_content_width() {
	// This variable is intended to be overruled from themes.

	$GLOBALS['content_width'] = apply_filters( 'ten_blog_content_width', 790 );
}
add_action( 'after_setup_theme', 'ten_blog_content_width', 0 );

/**
 * Retrieve webfont URL to load fonts locally.
 */
function ten_blog_get_fonts_url() {
	$font_families = array(
		'Josefin Sans:300,400,500,600,700',
	);

	$query_args = array(
		'family'  => urlencode( implode( '|', $font_families ) ),
		'subset'  => urlencode( 'latin,latin-ext' ),
		'display' => urlencode( 'swap' ),
	);

	return apply_filters( 'ten_blog_get_fonts_url', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
}

/**
 * Enqueue scripts and styles.
 */
function ten_blog_scripts() {

	wp_enqueue_style( 'ten-blog-blocks', get_template_directory_uri() . '/assets/css/blocks.css' );

	wp_enqueue_style( 'ten-blog-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ten-blog-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'ten-blog-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '1.0', true );
	
	$ten_blog_l10n = array(
		'quote'          => ten_blog_get_svg( array( 'icon' => 'angle-down' ) ),
		'expand'         => esc_html__( 'Expand child menu', 'ten-blog' ),
		'collapse'       => esc_html__( 'Collapse child menu', 'ten-blog' ),
		'icon'           => ten_blog_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) ),
	);
	
	wp_localize_script( 'ten-blog-navigation', 'ten_blog_l10n', $ten_blog_l10n );

	wp_enqueue_script( 'ten-blog-custom-script', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ten_blog_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 *
 * @since Ten Blog 1.0.0
 */
function ten_blog_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'ten-blog-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'ten-blog-fonts', ten_blog_get_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'ten_blog_block_editor_styles' );

/**
 * Removing category text from category page.
 */
function ten_blog_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'ten_blog_category_title' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * SVG icons functions and filters.
 */
require get_template_directory() . '/inc/icon-functions.php';



/**Bài tập 1*/
//tạo menu
if(!function_exists('primarymenu')){
	function primarymenu($menu='primary_menu'){
		$menus = array(
			'theme_location' => $menu,
            'container' => 'div',
            'container_class' => $menu,
			'menu_class'     => $menu,
        );
        wp_nav_menu($menus);

	}
}


/* khởi tạo widget */
function create_widgets($name, $id,$description){

	register_sidebar( 
		array(
			'name'          => $name,
			'id'            => $id,
			'description'   => $description,
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) 
	);
	
}

//tắt editortorng widget
add_filter( 'use_widgets_block_editor', '__return_false' );

//hiển thị wdget	
function widget_init(){
	create_widgets('post sidebar', 'sidebar-post', 'post sidebar ', '', '', '', '');
	create_widgets('project sidebar ', 'sidebar-project', 'project sidebar', '', '', '', '');
	// ETC...
}
add_action( 'widgets_init', 'widget_init' );



/**Bài tập 2 */
// Enqueue file css js
function editor_style(){
	wp_enqueue_style( 'style-name', get_stylesheet_directory_uri().'/assets/css/main.css');
	wp_enqueue_style( 'style-bootstrap', get_stylesheet_directory_uri().'/assets/css/bootstrap.min.css');

	wp_enqueue_script( 'script-name', get_template_directory_uri() .'/assets/js/main.js', array(), '1.0.0' );
	wp_enqueue_script( 'script-bootstrap', get_template_directory_uri() .'/assets/js/bootstrap.min.js',array(), '' );
	wp_enqueue_script( 'script-ok', get_template_directory_uri() .'/assets/js/jquery.min.js', array( 'jquery' ), '');

}
add_action('wp_enqueue_scripts','editor_style');


/**Bài tập 3 */
//thumnail post
if(!function_exists('post_thumbnail')){
    function post_thumbnail($size){
		
        if(!is_single() && has_post_thumbnail()&& !post_password_required() || has_post_format('image')):?>
            <figure class= "featured-image"><?php the_post_thumbnail($size); ?></figure>
			
        <?php endif; ?>
   <?php }
}

//title post
if(!function_exists('title')){
	function title(){
		if(!is_single() ): ?>  
            <h5><a href="<?php the_permalink()?>;" title="<?php the_title()?>"><?php echo  get_the_title() ; ?></a></h5>
       <?php else: ?>
       		<?php the_title( '<h4 class="entry-title">', '</h4>' );?>
        <?php endif ?>

    <?php }
}

// content post
if(!function_exists('content')){
	function content(){
		if(!is_single()){
			the_excerpt();
		}
		else{
			the_content();
		}
	}
}

//register widget
// tạo widget 

///
class widget_Post extends WP_Widget {
    function __construct() {
        parent::__construct(
            'random_post',
            'project',
            array( 'description'  =>  'Widget project post' )
        );
    }

    function form( $instance ) {
        $default = array(
            'title' => 'Tiêu đề widget',
            'post_number' => 10
        );
        $instance = wp_parse_args( (array) $instance, $default );
        $title = esc_attr($instance['title']);
        $post_number = esc_attr($instance['post_number']);


        echo '<p>Nhập tiêu đề <input type="text" class="widefat" name="'.$this->get_field_name('title').'" value="'.$title.'"/></p>';
        echo '<p>Số lượng bài viết hiển thị <input type="number" class="widefat" name="'.$this->get_field_name('post_number').'" value="'.$post_number.'" placeholder="'.$post_number.'" max="30" /></p>';


    }


    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['post_number'] = strip_tags($new_instance['post_number']);
        return $instance;
    }


    function widget( $args, $instance ) {
        extract($args);
        $title = apply_filters( 'widget_title', $instance['title'] );
        $post_number = $instance['post_number'];


        echo $before_widget;
        echo $before_title.$title.$after_title;
        $query = new WP_Query(
			'post_type= project',
			'posts_per_page='.$post_number

			);


        if ($query->have_posts()):
            echo "<ol>";
            while( $query->have_posts() ) :
                $query->the_post(); ?>


                <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>


            <?php endwhile;
            echo "</ol>";
        endif;
        echo $after_widget;


    }


}


add_action( 'widgets_init', 'create_randompost_widget' );
function create_randompost_widget() {
    register_widget('widget_Post');
}



//phân trang cho bài post
if(!function_exists('pagainate_post')){
	function pagainate_post(){
		global $wp_query;
		$big = 999999999; // need an unlikely integer

			echo paginate_links( array(
				'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'  => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total'   => $wp_query->max_num_pages,
				'prev_next'    => true,
				'after_page_number'=>'',
			));
	}

}



/**
 * bài tập 4
 */
// add custom post type

function add_custom_post_type()
{
    $label = array(
        'name' => 'project', //Tên post type dạng số nhiều
      	'singular_name' => 'All project' 
    );
    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'Post type project', //Mô tả của post type
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'author',
            'thumbnail',
            'comments',
            'trackbacks',
            'revisions',
            'custom-fields'
        ),
        // 'taxonomies' => array( 'project-category', 'post_tag' ), //Các taxonomy được phép sử dụng để phân loại nội dung
        'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => 'dashicons-products', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => true, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post', 
	
    );
    register_post_type('project', $args); 

}
add_action('init', 'add_custom_post_type');

// taxonamy product category
function add_taxonomy(){
	$labels1 = array(
		'name' => 'All project',
		'singular' => 'category',
		'menu_name' => 'category',
	);
	$args1 = array(
		'labels'                     => $labels1,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	) ;
	register_taxonomy('project-category', 'project', $args1);
	register_taxonomy('project-tag', 'project', $args1['hierarchical = "false"']);

	
}
add_action('init', 'add_taxonomy');

//project title sidebar 
function post_title(){
	$ar = array(
		'post_type'=>'project',
		'posts_per_page' =>'10',
		
	);
	$qr = new WP_Query( $ar);
	ob_start();
		if ( $qr->have_posts() ) :the_post()?>	
				<?php while ($qr->have_posts()) :$qr->the_post();?>
					<h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
				<?php endwhile;
			 "</ol>"; 

		endif;
		
		return ob_get_clean();
	}
add_shortcode( 'project_title', 'post_title' );




//tạo shortcode
function get_project_list($attr) {
	// echo "đây là shortcode ok";

	extract(shortcode_atts(array(
		'post_page'=> 12,
		'order ' =>'DESC',
		'orderby' => 'title',
 		'colums'=>'4',
	),$attr ));
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
  $arquery = array(
    'posts_per_page' =>$post_page,
    'post_type'=>'project',
	'order'=> $order, 
	'orderby' =>$orderby,
	'paged'=>$paged
  );
 
  $query = new WP_Query( $arquery);
	ob_start();
	if ( $query->have_posts() ) :
		"<ol>";?>	
		<div class="row">
			<?php while ($query->have_posts()) :$query->the_post();?>
				<div class=" <?php echo create_collums($colums)?> row_project" id="<?php the_ID()?>" >
					<div class="card_project">
						<div class="card">
							<div class="card-body">
							<?php thumbnail('medium')?>
							<p>Giá: <?php echo get_field('price')?></p>
							<p>Location: <?php echo get_field('location')?></p>
							<?php the_terms( $query->ID, 'project-category', 'Category:', ' / ');?>
							
								<div class="card-body">
									<h4 class="card-title" > 
										<a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
									</h4>
									<p class="card-text"><?php the_excerpt()?></p>
									<a href="<?php the_permalink() ?>" class="btn btn-primary">See project</a>
								</div>
							</div>
						</div>
					</div>
				</div>	
			<?php endwhile;?>	
		</div>

		</div>

		</div>

		<?php "</ol>"; ?>

		<div class= "pagination">
 		<?php paginate($query) ?>
		</div>
	<?php endif;
	
	return ob_get_clean();
}
add_shortcode( 'project_shortcode', 'get_project_list' );


//colums project
if(!function_exists('create_collums')){
	function create_collums($colums){
      $col='';
	switch ($colums){
		case '1':
			$col='col-lg-12 col-md-12 col-sm-12' ;
			break;
		case '2':
			 $col='col-lg-6 col-md-12 col-sm-12' ;
			 break;
		case '3':
			 $col='col-lg-4 col-md-6 col-sm-12';
			 break;
		case '4':
			 $col='col-lg-3 col-md-6 col-sm-12';
			break;
		case '6':
			 $col='col-lg-2 col-md-3 col-sm-12';
			break;
		default:
			$col='6';

	}
	return $col;
	
	}
}

//pagisnation
if(!function_exists('pagainate')){
	function paginate($paged){
		
			echo paginate_links( array(
				'base'    => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
				'format'  => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total'   => $paged->max_num_pages,
				'prev_next'    => true,
				'after_page_number'=>'',
			) );
	}

}


if(!function_exists('thumbnail')){
	function thumbnail($size){
		if(has_post_thumbnail()&&!post_password_required() ):?>
           <?php the_post_thumbnail($size); ?>
		<?php else: ?>
		<img src="<?php echo get_stylesheet_directory_uri().'/assets/images/a4.jpg'  ?>">
	

	<?php endif;
	 }
	 
}


//category
if(!function_exists('category')){
	function category($post){?>
		<h4>Category:<?php the_terms($post->ID, 'project-category') ?></h4>
  <?php $catData =get_queried_object(); ?>
     <?php  $args = array(
        'post_type'      => 'project',
        'posts_per_page' => 5,
        'hide_empty'     => false,
		
        'tax_query'     => array(
                    array(
                        'taxonomy'=> 'project-category',
                        'field' => 'term_id', 
                        'terms' =>$catData->term_id,
                        'operator'      => 'IN' 
                    ),
                   
                )
            
      );  
	  $loop = new WP_Query( $args ); 
		
            while ( $loop->have_posts() ) : $loop->the_post();?>
			
            <div class="col-lg-6 row_project"> 
                 <div class="card_project">
					<div class="card">
						<div class="card-body">
						<?php thumbnail('medium')?>
							<div class="card-body">
								<h4 class="card-title" > 

									<a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
								</h4>
								<p class="card-text"><?php the_excerpt()  ?></p>
								<a href="<?php the_permalink() ?>" class="btn btn-primary">See project</a>
							</div> 
                        
						</div>
					</div>
				</div>
            </div>
            <?php endwhile;?> 
			<?php 
	 }
}



// function query_post_type($query) {
//   if( is_category() ) {
//     $post_type = get_query_var('post_type');
//     if($post_type)
//         $post_type = $post_type;
//     else
//         $post_type = array('nav_menu_item', 'post', 'project_category'); // don't forget nav_menu_item to allow menus to work!
//     $query->set('post_type',$post_type);
//     return $query;
//     }
// }
// add_filter('pre_get_posts', 'query_post_type');