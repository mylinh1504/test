<?php
/**
 * Legal News Theme Customizer
 *
 * @package Legal_News
 */

// Sanitize callback.
require get_template_directory() . '/inc/customizer/sanitize-callback.php';

// Active Callback.
require get_template_directory() . '/inc/customizer/active-callback.php';

// Custom Controls.
require get_template_directory() . '/inc/customizer/custom-controls/custom-controls.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function legal_news_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'legal_news_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'legal_news_customize_partial_blogdescription',
			)
		);
	}

	// Upsell Section.
	$wp_customize->add_section(
		new Legal_News_Upsell_Section(
			$wp_customize,
			'upsell_section',
			array(
				'title'            => __( 'Legal News Pro', 'legal-news' ),
				'button_text'      => __( 'Buy Pro', 'legal-news' ),
				'url'              => 'https://ascendoor.com/themes/legal-news-pro/',
				'background_color' => '#d82926',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

	// Colors.
	require get_template_directory() . '/inc/customizer/colors.php';

	// Theme Options.
	require get_template_directory() . '/inc/customizer/theme-options.php';

	// Front Page Options.
	require get_template_directory() . '/inc/customizer/front-page-options.php';
}
add_action( 'customize_register', 'legal_news_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function legal_news_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function legal_news_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function legal_news_customize_preview_js() {
	wp_enqueue_script( 'legal-news-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), LEGAL_NEWS_VERSION, true );
}
add_action( 'customize_preview_init', 'legal_news_customize_preview_js' );

/**
 * Enqueue script for custom customize control.
 */
function legal_news_custom_control_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'legal-news-custom-controls-css', get_template_directory_uri() . '/assets/css/custom-controls.css', array(), '1.0', 'all' );
	wp_enqueue_script( 'legal-news-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'legal_news_custom_control_scripts' );
