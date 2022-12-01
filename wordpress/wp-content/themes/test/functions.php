<?php
function ten_blog_widgets_init() {
	// register_sidebar( 
	// 	array(
	// 		'name'          => esc_html__( 'Sidebar', 'ten-blog' ),
	// 		'id'            => 'sidebar-1',
	// 		'description'   => esc_html__( 'Add widgets here.', 'ten-blog' ),
	// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
	// 		'after_widget'  => '</section>',
	// 		'before_title'  => '<h2 class="widget-title">',
	// 		'after_title'   => '</h2>',
	// 	) 
	// );

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'ten-blog' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'ten-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	
}
add_action( 'widgets_init', 'ten_blog_widgets_init' );

function create_thachpham_widget() {
	register_widget('Thachpham_Widget');
}
add_action( 'widgets_init', 'create_thachpham_widget' );
class Thachpham_Widget extends WP_Widget {
	/**
	 * Thiết lập widget: đặt tên, base ID
	 */
	function __construct() {


	}


	/**
	 * Tạo form option cho widget
	 */
	function form( $instance ) {


	}


	/**
	 * save widget form
	 */


	function update( $new_instance, $old_instance ) {


	}


	/**
	 * Show widget
	 */


	function widget( $args, $instance ) {


	}


}
