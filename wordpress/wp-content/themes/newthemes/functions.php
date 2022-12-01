<?php
/**
    * @ khai bao gia tri
    *@ THEME_URL = lay gia tri dudong dan thuc muc
    *@ CORE = lay duong dan cua thuc muc core
**/
define('THEME_URL', get_stylesheet_directory() );
define('CORE', THEME_URL. "/core");
// nhung file core/init
require_once( CORE . "/init.php");

// thiet lap chieu rong noi dung
if(!isset($content_width)){
    $content_width = 620;
}

// khai bao chuc nang cua theme
if(!function_exists('theme_setup')){
    function theme_setup(){
        // thiet lap textdomain
        $language_folder = THEME_URL. '/languages';
        load_theme_textdomain('dulich', $language_folder);

        // tu dong them theme RSS len head
        add_theme_support('automatic-feed-links');

        //them post thumbnail
        add_theme_support('post-thumbnails');


        // post format
        add_theme_support('post-formats', array(
            'image',
            'video',
            'gallery',
            'qoute',
            'link',

        ));
        // them title -tag:; tu dong them title vao header mà k c
        add_theme_support('title-tag');
        
        // them custom background
            $default_background = array(
            'default_color'=>'#e8e8e8e'
            );
        add_theme_support('custom-background',$default_background);

        //menu: vi tri hien thi menu
        register_nav_menus(
            array(
            'primary-menu'=>__('Primary','dulich'),
            'footer-menu'=>__('footer ','dulich'),
            
            )
        );
            

        remove_theme_support( 'widgets-block-editor' );

        }
    add_action('init','theme_setup');

}
//widget slidebar;
function slug_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'dulich' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'dulich' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
   
}
add_action( 'widgets_init', 'slug_widgets_init' );

// header
if (!function_exists('linh_header')){
    function linh_header(){ ?>
    <div class="site-name">
       <?php 
      if(is_home()){
        printf('<h1><a href="%1$s" title =" %2$s ">%3$s</a></h1>',
        get_bloginfo('url'),
        get_bloginfo('description'),
        get_bloginfo('sitename') ); 
        }else{
           
        printf('<p><a href="%1$s" title =" %2$s ">%3$s</a></p>',
        get_bloginfo('url'),
        get_bloginfo('description'),
        get_bloginfo('sitename') ); 

        } 
        ?>
        </div>
        <div class="site-description"><?php bloginfo('description') ?></div> 
<?php
}
}

//tao menu
if(!function_exists('linh_menu')){
    function linh_menu($menu='primary-menu'){
        $menus = array(
            'theme_location' => $menu,
            'container' => 'li',
            'container_class' => $menu,
        );
        wp_nav_menu($menus);

    }
}


//phân trang
if (!function_exists('linh_pagination')){
    function linh_pagination(){
       if($GLOBALS['wp_query']->max_num_pages < 2){
        return '';
        }?>  
        <nav class="pagination" role= "navigation">
            <?php if(get_next_posts_link() ): ?>
                <div class="prev"><?php next_posts_link(__("quay lại", 'dulich')) ?></div>
            <?php endif; ?>
             <?php if (get_previous_posts_link() ) : ?>
                <div class = "next"><?php previous_posts_link(__('tiếp','dulich'))?></div>
            <?php endif; ?>
        </nav>

    <?php }
    
}

// hien thi thumbnail
if(!function_exists('linh_thumbnail')){
    function linh_thumbnail($size){
        if(!is_single() && has_post_thumbnail()&& !post_password_required() || has_post_format('image')):?>
            <figure class= "post_thumbnail"><?php the_post_thumbnail($size); ?></figure>
        <?php endif; ?>
   <?php }
}
if (!function_exists('linh_entry_header')){
    function linh_entry_header(){
      if(is_single() ): ?>  
            <h1><a href="<?php the_permalink()?>;" title="<?php the_title()?>"><?php echo  get_the_title() ; ?></a></h1>
       <?php else: ?>
        
        <?php endif ?>
    <?php }

}
if(!function_exists('linh_entry_meta')){
    function linh_entry_meta(){
        if(!is_single()):?>
            <div class="entry_category">
            <?php printf( __('<span class="category"> %1$s %2$s','dulich'),
                get_the_category_list(),
                get_the_tag_list()
                )
            ?>
            </div>
            <div class="entry_title">
            <?php the_title()?>
             <?php get_the_modified_date() ?>  
            <?php the_date('Y')?>
            </div>
        <?php endif ?>
       <?php }
   
}
// hiển thị nội dung bài post
if(!function_exists('linh_entry_meta_content')){
    function tlinh_entry_meta_conten(){
        if(!is_single()){
            the_excerpt();
        }
        else{
            the_content();
             //phan trang trong single
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
    }

}
function linh_readmore(){
    return '<a class="read-more" href="'.get_permalink(get_the_ID()).'"> '.__('[...Readmore]', 'dulich').'</a>';
}
add_filter('excerpt_more','linh_readmore');

// custom post type
function tao_custom_post_type()
{
   
    $label = array(
        'name' => 'Product', //Tên post type dạng số nhiều
        'singular_name' => 'product' //Tên post type dạng số ít
    );

    /*
     * Biến $args là những tham số quan trọng trong Post Type
     */
    $args1 = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'Post type đăng sản phẩm', //Mô tả của post type
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
        ), //Các tính năng được hỗ trợ trong post type
        'taxonomies' => array( 'product-category', 'post_tag' ), //Các taxonomy được phép sử dụng để phân loại nội dung
        'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => 'dashicons-cart', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => true, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post' //
    );

    register_post_type('sanpham', $args1); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên

    //create taxonomy product
    $labels = array(
		'name'                       => _x( 'Category', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Writer', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Search Category', 'textdomain' ),
		'popular_items'              => __( 'Popular category', 'textdomain' ),
		'all_items'                  => __( 'All Category', 'textdomain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit category', 'textdomain' ),
		'update_item'                => __( 'Update category', 'textdomain' ),
		'add_new_item'               => __( 'Add New category', 'textdomain' ),
		'new_item_name'              => __( 'New category Name', 'textdomain' ),
		'separate_items_with_commas' => __( 'Separate category with commas', 'textdomain' ),
		'add_or_remove_items'        => __( 'Add or removecategory', 'textdomain' ),
		'choose_from_most_used'      => __( 'Choose from the most used categorys', 'textdomain' ),
		'not_found'                  => __( 'No categorys found.', 'textdomain' ),
		'menu_name'                  => __( 'Category', 'textdomain' ),
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'writer' ),
	);

	register_taxonomy( 'product-category', 'sanpham', $args );

}
/* Kích hoạt hàm tạo custom post type */
add_action('init', 'tao_custom_post_type');



//liên kêt linh css
function wpdocs_theme_name_scripts() {
	wp_enqueue_style( 'style-name', get_stylesheet_directory_uri() .'/style.css',array(), '1.0.0' );
	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/menu.js', array(), '1.0.0');
    wp_register_style('my_stylesheet', get_template_directory_uri() . '/js/menu.css', array(), '1.0.0');
    
    wp_enqueue_style('my_stylesheet');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

//them size hình ảnh 

add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {

add_image_size( 'post-thumbnail size', 800, 240 );
add_image_size( 'homepage-thumb size', 220, 180 );
add_image_size( 'fullpage-thumb size', 590, 9999 );
}


$args = array(  
        'post_type' => 'services',
        'post_status' => 'publish',
        'posts_per_page' => 8, 
        'orderby' => 'title', 
        'order' => 'ASC', 
    );

    $loop = new WP_Query( $args ); 
        
    while ( $loop->have_posts() ) : $loop->the_post(); 
        print the_title(); 
        the_excerpt(); 
    endwhile;

    wp_reset_postdata(); 



    //custom post type
if(!function_exists('category_list')){
    function category_list(){
      $args3= array(

        'cat' => 5,//(int) - Lấy bài dựa theo ID của category
        'category_name' => 'staff, news',          //(string) - Lấy bài dựa theo category slug
        'category__and' => array( 2, 6 ),         //(array) - Lấy bài mà nó mang cả hai category 2 và 6 (ID)
        'category__in' => array( 2, 6 ),          //(array) - ID của các category không muốn lấy bài
        'category__not_in' => array( 2, 6 ),  
      );
      
    }
}

// shortcode
 function create_shortcode_randompost() {
	$random_query = new WP_Query(array(
		'posts_per_page' => 10,
		'orderby' => 'rand'
	));


	ob_start();
	if ( $random_query->have_posts() ) :
		"<ol>";
		while ( $random_query->have_posts() ) :
			$random_query->the_post();?>
				<li><a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a></li>

		<?php endwhile;
		"</ol>";
	endif;
	$list_post = ob_get_contents(); //Lấy toàn bộ nội dung phía trên bỏ vào biến $list_post để return


	ob_end_clean();


	return $list_post;
}
add_shortcode('random_post', 'create_shortcode_randompost');
//



function tao_custom_page_type()
{


    /*
     * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
     */
    $label1 = array(
        'name' => 'custom page', //Tên post type dạng số nhiều
        'singular_name' => 'custom_page' //Tên post type dạng số ít
    );


    /*
     * Biến $args là những tham số quan trọng trong Post Type
     */
    $args4 = array(
        'labels' => $label1, //Gọi các label trong biến $label ở trên
        'description' => 'custom page hello', //Mô tả của post type
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
        ), //Các tính năng được hỗ trợ trong post type
        'taxonomies' => array( 'page', 'post_tag' ), //Các taxonomy được phép sử dụng để phân loại nội dung
        'hierarchical' => true, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' =>'dashicons-products', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => true, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post' //
    );
    register_post_type('pagesp', $args4); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên
    
    //taxonomy
    $labelss = array(
            'name' => 'page san pham',
            'singular' => 'Loại sản phẩm',
            'menu_name' => 'Loại sản phẩm'
        );

	
	$args5 = array(
		'labels'                     => $labelss,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	/* Hàm register_taxonomy để khởi tạo taxonomy*/
	register_taxonomy('page-custom', 'pagesp', $args5);


}
/* Kích hoạt hàm tạo custom post type */
add_action('init', 'tao_custom_page_type');


// tạo widget 
function create_linh_widget(){
 register_widget('linh_widget');
}
add_action('widgets_init', 'create_linh_widget');

//class widget
class linh_Widget extends WP_widget{

    //thiet lap widget đặt tên
    function __construct(){
        parent::__construct(
            'linh_widget',
            'linh widget',
            array(
                'description'=>'mô tả của widget'
            )
        );
    }

    //tạo form cho widget
    function form($instance){
        $default = array(
            'title' => 'Tên của bạn',
            'content' => 'nhập nội dung'
        );
        $instance = wp_parse_args((array) $instance,$default);
        $title = esc_attr( $instance['title'] );
        echo "Nhập tiêu đề <input class='widefat' type='text' name='".$this->get_field_name('title')."' value='".$title."' />";
        echo (" nhập nội dung: <textarea type='text' name='".$this->get_field_name('content')."' value='".$title."' />");
    }

    // lưu widget form
    function update( $new_instance, $old_instance){
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;

    }
    //show widget
    function widget($args, $instance){
        
    }

}

// function ten_blog_widgets_init() {
// 	register_sidebar( 
// 		array(
// 			'name'          => esc_html__( 'Sidebar', 'ten-blog' ),
// 			'id'            => 'sidebar-1',
// 			'description'   => esc_html__( 'Add widgets here.', 'ten-blog' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		) 
// 	);

// 	register_sidebar(
// 		array(
// 			'name'          => __( 'Footer 1', 'ten-blog' ),
// 			'id'            => 'sidebar-2',
// 			'description'   => __( 'Add widgets here to appear in your footer.', 'ten-blog' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);

// 	register_sidebar(
// 		array(
// 			'name'          => __( 'Footer 2', 'ten-blog' ),
// 			'id'            => 'sidebar-3',
// 			'description'   => __( 'Add widgets here to appear in your footer.', 'ten-blog' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);

// 	register_sidebar(
// 		array(
// 			'name'          => __( 'Footer 3', 'ten-blog' ),
// 			'id'            => 'sidebar-4',
// 			'description'   => __( 'Add widgets here to appear in your footer.', 'ten-blog' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'ten_blog_widgets_init' );
