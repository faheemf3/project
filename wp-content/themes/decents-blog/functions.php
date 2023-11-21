<?php
if (!defined('_DECENT_BLOG_VERSION'))
{
    // Replace the version number of the theme on each release.
    define('_DECENT_BLOG_VERSION', '1.0.0');
}

if (!function_exists('decents_blog_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function decents_blog_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on decents blog, use a find and replace
         * to change 'decents-blog' to the name of your theme in all the template files.
        */

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
        */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'main-menu' => esc_html__('Primary', 'decents-blog') ,
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
        */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('decents_blog_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'decents_blog_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function decents_blog_content_width()
{
    $GLOBALS['content_width'] = apply_filters('decents_blog_content_width', 640);
}
add_action('after_setup_theme', 'decents_blog_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function decents_blog_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'decents-blog') ,
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'decents-blog') ,
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 1', 'decents-blog') ,
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here.', 'decents-blog') ,
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 2', 'decents-blog') ,
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here.', 'decents-blog') ,
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 3', 'decents-blog') ,
        'id' => 'footer-3',
        'description' => esc_html__('Add widgets here.', 'decents-blog') ,
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 4', 'decents-blog') ,
        'id' => 'footer-4',
        'description' => esc_html__('Add widgets here.', 'decents-blog') ,
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_widget('Decent_Blog_Widget_style');
}
add_action('widgets_init', 'decents_blog_widgets_init');

include_once (ABSPATH . 'wp-admin/includes/plugin.php');


/**
 * Enqueue scripts and styles.
 */
function decents_blog_scripts()
{
    wp_enqueue_style('decents-blog-style', get_stylesheet_uri() , array() , _DECENT_BLOG_VERSION);

    //CSS
    wp_enqueue_style('decents-blog-font-roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap');

    wp_enqueue_style('decents-blog-font-montercarlo', 'https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap');

    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');
    wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome.css');
    wp_enqueue_style('responsive-css', get_template_directory_uri() . '/assets/css/responsive.css');

    //JS
    wp_enqueue_script('masonry');

    wp_enqueue_script('decents-blog-main', get_template_directory_uri() . '/assets/js/decents-blog-main.js', array(
        'jquery'
    ) , _DECENT_BLOG_VERSION, true);

    global $wp_query;
    $paged = (get_query_var('paged') > 1) ? get_query_var('paged') : 1;
    
    $max_num_pages = $wp_query->max_num_pages;

    global $wp_query;
    $search_count = $wp_query->found_posts;
    $post_per_page = get_option('posts_per_page');
   
    if($search_count > $post_per_page){
        wp_localize_script('decents-blog-main', 'decents_blog_ajax', array(
            'ajaxurl' => admin_url('admin-ajax.php') ,
            'paged' => absint($paged) ,
            'max_num_pages' => absint($max_num_pages) ,
            'next_posts' => next_posts(absint($max_num_pages) , false) ,
            'show_more' => __('Load More', 'decents-blog') ,
            'no_more_posts' => __('No More', 'decents-blog') ,
        ));
    }else{
        wp_localize_script('decents-blog-main', 'decents_blog_ajax', array());
    }
    

    wp_enqueue_script('decents-blog-menu-accessibility.js', get_template_directory_uri() . '/assets/js/decents-blog-menu-accessibility.js', array() , _DECENT_BLOG_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments'))
    {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'decents_blog_scripts');

if (!function_exists('decents_blog_load_more_pagination')):
    function decents_blog_load_more_pagination()
    {

        $decents_blog_pagination_option = get_theme_mod('decents_blog_pagination_options', esc_html__('loadmore', 'decents-blog'));
        if ('number' == $decents_blog_pagination_option)
        {
            echo "<div class='pagination'>";
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))) ,
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')) ,
                'total' => $wp_query->max_num_pages,
                'prev_text' => __('<i class="fa fa-angle-left"></i>', 'decents-blog') ,
                'next_text' => __('<i class="fa fa-angle-right"></i>', 'decents-blog') ,
            ));
            echo "<div>";
        }
        elseif ('loadmore' == $decents_blog_pagination_option)
        {
            $page_number = get_query_var('paged');
            if ($page_number == 0)
            {
                $output_page = 2;
            }
            else
            {
                $output_page = $page_number + 1;
            }
            if (paginate_links())
            {
                echo "<div class='ajax-pagination text-center'><div class='show-more' data-number='$output_page'><i class='fa fa-refresh'></i>" . esc_html__('Load More', 'decents-blog') . "</div><div id='free-temp-post'></div></div></a>";
            }
        }
        else
        {
            return false;
        }
    }
endif;
add_action('decents_blog_action_load_pagination', 'decents_blog_load_more_pagination', 10);

/**
 * Custom template tags for this theme.
 */

require get_template_directory() . '/include/controls.php';

require get_template_directory() . '/include/template-tags.php';

/**
 * Decent Blog Custom Widgets.
 */
require get_template_directory() . '/include/decents-blog-widget.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/include/customizer.php';

require get_template_directory() . '/include/tgm/class-tgm-plugin-activation.php';

require get_template_directory() . '/include/tgm/hook-tgm.php';

require_once (trailingslashit(get_template_directory()) . '/include/custom-button/class-customize.php');

/**
 * Add theme admin page.
 */
if ( is_admin() ) {
	require get_parent_theme_file_path( 'include/about.php' );
}
