<?php
/**
 * Decent Blog Theme Options Panel
 */
$wp_customize->add_panel('decents_blog_theme_options', array(
    'title' => __('Decent Blog Settings', 'decents-blog') ,
    'priority' => 1,
));

//Sticky Menu Enable/Disable
$wp_customize->add_section('decents_blog_sticky_menu_section', array(
    'title' => esc_html__('Decent Blog Sticky Menu Setting', 'decents-blog') ,
    'panel' => 'decents_blog_theme_options',
    'priority' => 10
));

// Sticky Menu Control
$wp_customize->add_setting('decents_blog_sticky_menu_enable', array(
    'default' => true,
    'sanitize_callback' => 'decents_blog_sanitize_checkbox',
));

$wp_customize->add_control('decents_blog_sticky_menu_enable', array(
    'label' => esc_html__('Enable Sticky Menu', 'decents-blog') ,
    'section' => 'decents_blog_sticky_menu_section',
    'priority' => 4,
    'type' => 'checkbox'
));

//Upload Banner Image
$wp_customize->add_section('decents_blog_banner_image_section', array(
    'title' => esc_html__('Decent Blog Banner Image Setting', 'decents-blog') ,
    'panel' => 'decents_blog_theme_options',
    'priority' => 10
));

// Banner Image Display Control
$wp_customize->add_setting('decents_blog_banner_image_display', array(
    'default' => true,
    'sanitize_callback' => 'decents_blog_sanitize_checkbox',
));

$wp_customize->add_control('decents_blog_banner_image_display', array(
    'label' => esc_html__('Display Banner Image', 'decents-blog') ,
    'section' => 'decents_blog_banner_image_section',
    'priority' => 4,
    'type' => 'checkbox'
));

$wp_customize
    ->selective_refresh
    ->add_partial('decents_blog_banner_image_display', array(
    'selector' => '.add-banner',
    'settings' => 'decents_blog_banner_image_display',

));

$wp_customize->add_setting('decents_blog_banner_image_setting', array(
    'default' => get_theme_file_uri('/assets/images/dcb-default-banner.jpg') , // Add Default Image URL
    'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'decents_blog_banner_image_control', array(
    'label' => esc_html__('Upload Banner Image', 'decents-blog') ,
    'description' => sprintf(esc_html__('Recommended size: 728px x 90px ', 'decents-blog') , 810, 120) ,
    'priority' => 5,
    'section' => 'decents_blog_banner_image_section',
    'settings' => 'decents_blog_banner_image_setting',
    'active_callback' => 'decents_blog_social_active_callback',
    'button_labels' => array( // All These labels are optional
        'select' => __('Select Image', 'decents-blog'),
        'remove' => __('Remove Image', 'decents-blog'),
        'change' => __('Change Image', 'decents-blog'),
    )
)));

// Banner Link URL
$wp_customize->add_setting('decents_blog_banner_link_url', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control('decents_blog_banner_link_url', array(
    'label' => esc_html__('Banner Link URL', 'decents-blog') ,
    'section' => 'decents_blog_banner_image_section',
    'priority' => 6,
    'type' => 'url',
    'active_callback' => 'decents_blog_social_active_callback'
));

$wp_customize->add_section('decents_blog_grid_column_section', array(
    'title' => esc_html__('Decent Blog Grid Column Setting', 'decents-blog') ,
    'panel' => 'decents_blog_theme_options',
    'priority' => 10
));

// Grid Column Change
$wp_customize->add_setting('decents_blog_grid_column_setting', array(
    'default' => esc_html__('5', 'decents-blog') ,
    'sanitize_callback' => 'decents_blog_sanitize_select',
));

$wp_customize->add_control('decents_blog_grid_column_setting', array(
    'label' => esc_html__('Sidebar Position', 'decents-blog') ,
    'section' => 'decents_blog_grid_column_section',
    'priority' => 2,
    'type' => 'select',
    'choices' => array(
        '3' => esc_html__('3 Column', 'decents-blog') ,
        '4' => esc_html__('4 Column', 'decents-blog') ,
        '5' => esc_html__('5 Column', 'decents-blog') ,

    ) ,
));

/*Blog Post Options*/
$wp_customize->add_section('decents_blog_archive_content_options', array(
    'title' => __('Decent Blog Post Options', 'decents-blog') ,
    'panel' => 'decents_blog_theme_options',
    'priority' => 10,
    'description' => esc_html__('Setting will also apply on archieve and search page.', 'decents-blog') ,
));

/*======================*/

// Post Author Display Control
$wp_customize->add_setting('decents_blog_archive_co_post_author', array(
    'default' => true,
    'sanitize_callback' => 'decents_blog_sanitize_checkbox',
));

$wp_customize->add_control('decents_blog_archive_co_post_author', array(
    'label' => esc_html__('Display Author', 'decents-blog') ,
    'section' => 'decents_blog_archive_content_options',
    'priority' => 2,
    'type' => 'checkbox',
));

// Post Date Display Control
$wp_customize->add_setting('decents_blog_archive_co_post_date', array(
    'default' => true,
    'sanitize_callback' => 'decents_blog_sanitize_checkbox',
));

$wp_customize->add_control('decents_blog_archive_co_post_date', array(
    'label' => esc_html__('Display Date', 'decents-blog') ,
    'section' => 'decents_blog_archive_content_options',
    'priority' => 3,
    'type' => 'checkbox',
));

// Featured Image Archive Control
$wp_customize->add_setting('decents_blog_archive_co_featured_image', array(
    'default' => true,
    'sanitize_callback' => 'decents_blog_sanitize_checkbox',
));

$wp_customize->add_control('decents_blog_archive_co_featured_image', array(
    'label' => esc_html__('Display Featured Image', 'decents-blog') ,
    'section' => 'decents_blog_archive_content_options',
    'priority' => 5,
    'type' => 'checkbox',
));

// Categories Archive Control
$wp_customize->add_setting('decents_blog_archive_co_categories', array(
    'default' => true,
    'sanitize_callback' => 'decents_blog_sanitize_checkbox',
));

$wp_customize->add_control('decents_blog_archive_co_categories', array(
    'label' => esc_html__('Display Categories', 'decents-blog') ,
    'section' => 'decents_blog_archive_content_options',
    'priority' => 5,
    'type' => 'checkbox',
));

// Comment Archive Control
$wp_customize->add_setting('decents_blog_archive_co_comment', array(
    'default' => true,
    'sanitize_callback' => 'decents_blog_sanitize_checkbox',
));

$wp_customize->add_control('decents_blog_archive_co_comment', array(
    'label' => esc_html__('Display Comments ', 'decents-blog') ,
    'section' => 'decents_blog_archive_content_options',
    'priority' => 5,
    'type' => 'checkbox',
));

// Post View Archive Control
$wp_customize->add_setting('decents_blog_archive_co_view', array(
    'default' => true,
    'sanitize_callback' => 'decents_blog_sanitize_checkbox',
));

$wp_customize->add_control('decents_blog_archive_co_view', array(
    'label' => esc_html__('Display Post view count ', 'decents-blog') ,
    'section' => 'decents_blog_archive_content_options',
    'description' => 'Please Activate Post View Counter Plugin First',
    'priority' => 5,
    'type' => 'checkbox'
));

/*Blog Page Pagination Options*/
$wp_customize->add_section('decents_blog_pagination_section', array(
    'title' => __('Decent Blog Pagination Option', 'decents-blog') ,
    'panel' => 'decents_blog_theme_options',
    'priority' => 10
));

// Choose Pagination Option
$wp_customize->add_setting('decents_blog_pagination_options', array(
    'default' => esc_html__('loadmore', 'decents-blog') ,
    'sanitize_callback' => 'decents_blog_sanitize_select',
));

$wp_customize->add_control('decents_blog_pagination_options', array(
    'label' => esc_html__('Choose Pagination Option', 'decents-blog') ,
    'section' => 'decents_blog_pagination_section',
    'priority' => 2,
    'type' => 'select',
    'choices' => array(
        'number' => esc_html__('Number', 'decents-blog') ,
        'loadmore' => esc_html__('Load More', 'decents-blog') ,
    ) ,
));

/*Single Post Options*/
$wp_customize->add_section('decents_blog_single_content_options', array(
    'title' => __('Decent Blog Single Post Options', 'decents-blog') ,
    'panel' => 'decents_blog_theme_options',
    'priority' => 10,
    'description' => esc_html__('Setting will apply on the content of single posts.', 'decents-blog') ,
));

// Post Author Display Control
$wp_customize->add_setting('decents_blog_single_co_post_author', array(
    'default' => true,
    'sanitize_callback' => 'decents_blog_sanitize_checkbox',
));

$wp_customize->add_control('decents_blog_single_co_post_author', array(
    'label' => esc_html__('Display Author', 'decents-blog') ,
    'section' => 'decents_blog_single_content_options',
    'priority' => 2,
    'type' => 'checkbox',
));

// Post Date Display Control
$wp_customize->add_setting('decents_blog_single_co_post_date', array(
    'default' => true,
    'sanitize_callback' => 'decents_blog_sanitize_checkbox',
));

$wp_customize->add_control('decents_blog_single_co_post_date', array(
    'label' => esc_html__('Display Date', 'decents-blog') ,
    'section' => 'decents_blog_single_content_options',
    'priority' => 3,
    'type' => 'checkbox',
));

// Single Post Tags Display Control
$wp_customize->add_setting('decents_blog_single_co_post_tags', array(
    'default' => true,
    'sanitize_callback' => 'decents_blog_sanitize_checkbox',
));

$wp_customize->add_control('decents_blog_single_co_post_tags', array(
    'label' => esc_html__('Display Tags', 'decents-blog') ,
    'section' => 'decents_blog_single_content_options',
    'priority' => 5,
    'type' => 'checkbox',
));

// Comment Single Control
$wp_customize->add_setting('decents_blog_single_co_post_view', array(
    'default' => true,
    'sanitize_callback' => 'decents_blog_sanitize_checkbox',
));

$wp_customize->add_control('decents_blog_single_co_post_view', array(
    'label' => esc_html__('Display Post View Count single ', 'decents-blog') ,
    'section' => 'decents_blog_single_content_options',
    'priority' => 5,
    'description' => "Please Activate Post View Counter Plugin First",
    'type' => 'checkbox',
));

// Single Post Category Display Control
$wp_customize->add_setting('decents_blog_single_co_post_category', array(
    'default' => true,
    'sanitize_callback' => 'decents_blog_sanitize_checkbox',
));

$wp_customize->add_control('decents_blog_single_co_post_category', array(
    'label' => esc_html__('Display Category', 'decents-blog') ,
    'section' => 'decents_blog_single_content_options',
    'priority' => 5,
    'type' => 'checkbox',
));

// Featured Image Post Display Control
$wp_customize->add_setting('decents_blog_single_co_featured_image_post', array(
    'default' => true,
    'sanitize_callback' => 'decents_blog_sanitize_checkbox',
));

$wp_customize->add_control('decents_blog_single_co_featured_image_post', array(
    'label' => esc_html__('Display Featured Image', 'decents-blog') ,
    'section' => 'decents_blog_single_content_options',
    'priority' => 7,
    'type' => 'checkbox',
));

//Sidebar Section
$wp_customize->add_section('decents_blog_sidebar_section', array(
    'title' => __('Decent Blog Sidebar Setting', 'decents-blog') ,
    'panel' => 'decents_blog_theme_options',
    'priority' => 10
));

// Main Sidebar Position
$wp_customize->add_setting('decents_blog_sidebar_position', array(
    'default' => esc_html__('grid', 'decents-blog') ,
    'sanitize_callback' => 'decents_blog_sanitize_select',
));

$wp_customize->add_control('decents_blog_sidebar_position', array(
    'label' => esc_html__('Sidebar Position', 'decents-blog') ,
    'section' => 'decents_blog_sidebar_section',
    'priority' => 2,
    'type' => 'select',
    'choices' => array(
        'right' => esc_html__('Right Sidebar', 'decents-blog') ,
        'left' => esc_html__('Left Sidebar', 'decents-blog') ,
        'no' => esc_html__('No Sidebar', 'decents-blog') ,
        'grid' => esc_html__('Grid Layout', 'decents-blog')
    ) ,
));

//Footer Section
$wp_customize->add_section('decents_blog_footer_section', array(
    'title' => __('Decent Blog Footer Setting', 'decents-blog') ,
    'panel' => 'decents_blog_theme_options',
    'priority' => 10
));

//Footer bottom Copyright Display Control
$wp_customize->add_setting('decents_blog_footer_copyright_display', array(
    'default' => true,
    'sanitize_callback' => 'decents_blog_sanitize_checkbox',
));

$wp_customize->add_control('decents_blog_footer_copyright_display', array(
    'label' => esc_html__('Display Copyright Footer', 'decents-blog') ,
    'section' => 'decents_blog_footer_section',
    'priority' => 1,
    'type' => 'checkbox',
));

// Copyright Control
$wp_customize->add_setting('decents_blog_copyright', array(
    'default' => esc_html__('Proudly Powered By WordPress', 'decents-blog') ,
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control('decents_blog_copyright', array(
    'label' => esc_html__('Copyright', 'decents-blog') ,
    'section' => 'decents_blog_footer_section',
    'priority' => 2,
    'type' => 'textarea',
    'active_callback' => 'decents_blog_footer_copyright_callback'
));