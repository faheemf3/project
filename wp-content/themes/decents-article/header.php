<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); 

$banner_image = get_theme_mod('decents_article_banner_image_setting',get_theme_file_uri('/assets/images/dcb-default-banner.jpg'));
$display_image = get_theme_mod('decents_article_banner_image_display',true);
$sticky_menu = get_theme_mod('decents_article_sticky_menu_enable',true);
$banner_link = get_theme_mod('decents_article_banner_link_url','');
$menu_sticky='';
if($sticky_menu){
    $menu_sticky='enable_sticky';
}
?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'decents-article' ); ?></a>
    <header class="wp-main-header" id="header">
        <div class="nav-brand <?php echo esc_attr($menu_sticky);?> <?php if(is_user_logged_in()) { ?>news-decent-sticky<?php } ?>">
            <div class="container-fluid decents-article-header">
                <div class="row">
                    <div class="col-md-12 logo_heading">
                        
                        <?php
                
                        the_custom_logo();
                        if ( is_front_page() && is_home() ) :
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php
                        else :
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php
                        endif;
                        $decents_article_description = get_bloginfo( 'description', 'display' );
                        if ( $decents_article_description || is_customize_preview() ) :
                        ?>
                        <p class="site-description"><?php echo esc_html($decents_article_description); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                        <?php endif; ?>

                    </div>
                    <div class="col-md-12 menu_side">
                    <nav id="site-navigation" class="decents-blog-main-navigation">
                        <button class="toggle-button" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle">
                        <div class="toggle-text"></div>
                            <span class="toggle-bar"></span>
                            <span class="toggle-bar"></span>
                            <span class="toggle-bar"></span>
                        </button>
                        <div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">
                        <button class="close close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal"></button>
                            <div class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'decents-article' ); ?>">
                                <?php
                                    wp_nav_menu( array(
                                    'theme_location' => 'main-menu',
                                    'menu_id'        => 'primary-menu',
                                    'menu_class'     => 'nav-menu main-menu-modal',
                                    
                                    ) );
                                ?>
                            </div>
                        </div>
                    </nav><!-- #site-navigation -->
                    </div>
                </div>
            </div>
        </div>
    </header>