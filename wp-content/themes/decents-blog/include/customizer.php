<?php
function decents_blog_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh))
    {
        $wp_customize
            ->selective_refresh
            ->add_partial('blogname', array(
            'selector' => '.site-title a',
            'render_callback' => 'decents_blog_customize_partial_blogname',
        ));
        $wp_customize
            ->selective_refresh
            ->add_partial('blogdescription', array(
            'selector' => '.site-description',
            'render_callback' => 'decents_blog_customize_partial_blogdescription',
        ));
    }
    require get_template_directory() . '/include/customizer-settings.php';
}
add_action('customize_register', 'decents_blog_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function decents_blog_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function decents_blog_customize_partial_blogdescription()
{
    bloginfo('description');
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

function decents_blog_customize_preview_js()
{
    wp_enqueue_script('decents-blog-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array(
        'customize-preview'
    ) , _DECENT_BLOG_VERSION, true);

    wp_enqueue_style('decents-blog-customizer', get_template_directory_uri() . '/assets/css/customizer.css');
}
add_action('customize_preview_init', 'decents_blog_customize_preview_js');

if (!function_exists('decents_blog_social_active_callback')):
    function decents_blog_social_active_callback()
    {
        $show_social = get_theme_mod('decents_blog_banner_image_display', true);

        if ($show_social)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
endif;

if (!function_exists('decents_blog_footer_copyright_callback')):
    function decents_blog_footer_copyright_callback()
    {

        $show_copyright = get_theme_mod('decents_blog_footer_copyright_display', true);

        if (true == $show_copyright)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
endif;

if (!function_exists('decents_blog_copyright_callback')):
    function decents_blog_copyright_callback()
    {

        $show_copyright = get_theme_mod('decents_blog_footer_copyright_display', true);

        if (true == $show_copyright)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
endif;

if (!function_exists('decents_blog_slider_callback')):
    function decents_blog_slider_callback()
    {

        $show_slider = get_theme_mod('decents_blog_slider_display', true);

        if (true == $show_slider)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
endif;