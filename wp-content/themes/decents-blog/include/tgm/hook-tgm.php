<?php
/**
 * Recommended plugins
 *
 * @package Decent Blog
 */

if ( ! function_exists( 'decents_blog_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function decents_blog_recommended_plugins() {
		
        $plugins = array(
            
			array(
                'name'     => esc_html__( 'News Gallery', 'decents-blog' ),
                'slug'     => 'photo-gallery-builder',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Accordion Slider Gallery', 'decents-blog' ),
                'slug'     => 'accordion-slider-gallery',
                'required' => false,
            ),
			array(
                'name'     => esc_html__( 'Timeline', 'decents-blog' ),
                'slug'     => 'timeline-event-history',
                'required' => false,
            ),
			array(
                'name'     => esc_html__( 'Blog Manager', 'decents-blog' ),
                'slug'     => 'blog-manager-wp',
                'required' => false,
            ),
			
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'decents_blog_recommended_plugins' );