<?php

/**
 * Active Callbacks
 *
 * @package Legal_News
 */

// Theme Options.
function legal_news_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'legal_news_enable_pagination' )->value() );
}
function legal_news_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'legal_news_enable_breadcrumb' )->value() );
}

// Flash News Section.
function legal_news_is_flash_news_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'legal_news_enable_flash_news_section' )->value() );
}
function legal_news_is_flash_news_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'legal_news_flash_news_content_type' )->value();
	return ( legal_news_is_flash_news_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function legal_news_is_flash_news_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'legal_news_flash_news_content_type' )->value();
	return ( legal_news_is_flash_news_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Banner Slider Section.
function legal_news_is_banner_slider_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'legal_news_enable_banner_section' )->value() );
}
function legal_news_is_banner_slider_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'legal_news_main_banner_slider_content_type' )->value();
	return ( legal_news_is_banner_slider_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function legal_news_is_banner_slider_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'legal_news_main_banner_slider_content_type' )->value();
	return ( legal_news_is_banner_slider_section_enabled( $control ) && ( 'category' === $content_type ) );
}
function legal_news_is_editor_picks_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'legal_news_editor_picks_content_type' )->value();
	return ( legal_news_is_banner_slider_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function legal_news_is_editor_picks_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'legal_news_editor_picks_content_type' )->value();
	return ( legal_news_is_banner_slider_section_enabled( $control ) && ( 'category' === $content_type ) );
}
function legal_news_is_trending_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'legal_news_trending_slider_content_type' )->value();
	return ( legal_news_is_banner_slider_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function legal_news_is_trending_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'legal_news_trending_slider_content_type' )->value();
	return ( legal_news_is_banner_slider_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Tile Posts Section.
function legal_news_is_tile_posts_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'legal_news_enable_tile_posts_section' )->value() );
}
function legal_news_is_tile_posts_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'legal_news_tile_posts_content_type' )->value();
	return ( legal_news_is_tile_posts_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function legal_news_is_tile_posts_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'legal_news_tile_posts_content_type' )->value();
	return ( legal_news_is_tile_posts_section_enabled( $control ) && ( 'page' === $content_type ) );
}
function legal_news_is_tile_posts_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'legal_news_tile_posts_content_type' )->value();
	return ( legal_news_is_tile_posts_section_enabled( $control ) && ( 'category' === $content_type ) );
}
