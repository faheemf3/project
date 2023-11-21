<?php
/**
 * excerpt lenth.
 */
if (!class_exists('WP_Customize_Control'))
{
    return null;
}

if (!function_exists('decents_blog_custom_excerpt_length')):
    function decents_blog_custom_excerpt_length($length)
    {
        if (is_admin())
        {
            return $length;
        }
        $ext_length = get_theme_mod('decents_blog_excerpt_length', '55', 'decents-blog');
        if (!empty($ext_length))
        {
            return $ext_length;
        }
        return 50;
    }
endif;
add_filter('excerpt_length', 'decents_blog_custom_excerpt_length', 999);

function decents_blog_sanitize_select($input, $setting)
{
    // Ensure input is a slug.
    $input = sanitize_key($input);

    // Get list of choices from the control associated with the setting.
    $choices = $setting
        ->manager
        ->get_control($setting->id)->choices;

    // If the input is a valid key, return it; otherwise, return the default.
    return (array_key_exists($input, $choices) ? $input : $setting->default);
}

function decents_blog_sanitize_checkbox($checked)
{
    return ((isset($checked) && true === $checked) ? true : false);
}

function decents_blog_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'decents_blog_post_views_count', true );
    return "$count";
}
function decents_blog_set_post_view() {
    $key = 'decents_blog_post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}