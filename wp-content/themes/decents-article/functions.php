<?php
function article_decents_enqueue_scripts(){

    wp_enqueue_script('masonry');
    wp_enqueue_script( 'decents-article-main', get_stylesheet_directory_uri() . '/assets/js/decents-article-main.js',array('jquery'),true);
    wp_enqueue_style( 'decent-blog-parent-style', get_template_directory_uri() . '/style.css');  
    wp_enqueue_style('article-decents-style',get_stylesheet_uri());
    wp_enqueue_style('article-decents-font', 'https://fonts.googleapis.com/css2?family=Courgette&display=swap');
    wp_enqueue_style('article-decents-font2', 'https://fonts.googleapis.com/css2?family=Rakkas&display=swap');

    add_theme_support( 'automatic-feed-links' );

    function as_story_theme_setup() {

    // Adds <title> tag support
    add_theme_support( 'title-tag');  

}
add_action('after_setup_theme', 'as_story_theme_setup');

/**
 * Add a sidebar.
 */
    function wpdocs_theme_slug_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'decents-article' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'decents-article' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );

}
add_action('wp_enqueue_scripts','article_decents_enqueue_scripts');
require get_stylesheet_directory() . '/include/customizer.php';


