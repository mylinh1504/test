<?php
/**
 * Post Options
 *
 * @package Legal_News
 */

$wp_customize->add_section(
	'legal_news_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'legal-news' ),
		'panel' => 'legal_news_theme_options',
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'legal_news_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'legal_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Legal_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'legal_news_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'legal-news' ),
			'section' => 'legal_news_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'legal_news_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'legal_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Legal_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'legal_news_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'legal-news' ),
			'section' => 'legal_news_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'legal_news_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'legal_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Legal_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'legal_news_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'legal-news' ),
			'section' => 'legal_news_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'legal_news_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'legal_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Legal_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'legal_news_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'legal-news' ),
			'section' => 'legal_news_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'legal_news_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'legal-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'legal_news_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'legal-news' ),
		'section'  => 'legal_news_post_options',
		'settings' => 'legal_news_post_related_post_label',
		'type'     => 'text',
	)
);

// Post Options - Hide Related Posts.
$wp_customize->add_setting(
	'legal_news_post_hide_related_posts',
	array(
		'default'           => false,
		'sanitize_callback' => 'legal_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Legal_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'legal_news_post_hide_related_posts',
		array(
			'label'   => esc_html__( 'Hide Related Posts', 'legal-news' ),
			'section' => 'legal_news_post_options',
		)
	)
);
