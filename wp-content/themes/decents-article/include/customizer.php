<?php
function decents_article_sections_settings( $wp_customize ) {
	$wp_customize->remove_section('decents_article_banner_image_section');
	$wp_customize->remove_section('decents_article_grid_column_section');
	$wp_customize->remove_section('decents_article_pagination_section');
	$wp_customize->remove_setting('decents_article_archive_co_post_author');
	$wp_customize->remove_control('decents_article_archive_co_post_author');
	$wp_customize->remove_setting('decents_article_archive_co_comment');
	$wp_customize->remove_control('decents_article_archive_co_comment');
}
add_action( 'customize_register', 'decents_article_sections_settings', 30);