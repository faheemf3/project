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

$banner_image = get_theme_mod('decents_blog_banner_image_setting',get_theme_file_uri('/assets/images/dcb-d        efault-banner.jpg'));
$display_image = get_theme_mod('decents_blog_banner_image_display',true);
$sticky_menu = get_theme_mod('decents_blog_sticky_menu_enable',true);
$banner_link = get_theme_mod('decents_blog_banner_link_url','');
?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'decents-blog' ); ?></a>
    <header class="wp-main-header" id="header">
        <div class="nav-brand">                                                                                  
            <div class="container-fluid">
                <div class="row">
                    <?php if(!$display_image) { 
                        ?>
                            <div class="col-lg-12 logo-area text-center">
                        <?php
                        }
                        else{
                    ?>

                    <div class="col-lg-4 logo-area text-center">
                        <?php
                    }
                        the_custom_logo();
                        if ( is_front_page() && is_home() ) :
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php
                        else :
                        ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php
                        endif;
                        $decents_blog_description = get_bloginfo( 'description', 'display' );
                        if ( $decents_blog_description || is_customize_preview() ) :
                        ?>
                        <p class="site-description"><?php echo $decents_blog_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if($display_image){ ?>
                    <div class="col-lg-8 banner">
                        <div class="add-banner">
                            <?php if($banner_image==''){ ?>
                           <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=decents_blog_banner_image_section' ) ); ?>"><img class="cta-wrap" src="<?php  echo esc_url( get_template_directory_uri() ) ; ?>/assets/images/dcb-default-banner.jpg"/></a>
                       <?php }
                            else{
                                ?>
                                    <a href="<?php echo esc_url($banner_link);?>" target="_blank"><img src="<?php echo esc_url($banner_image);?>"/></a>
                                <?php
                            }
                       ?>
                        </div>
                    </div>
                    <?php }
                        $menu_sticky='';
                        if($sticky_menu){
                            $menu_sticky='enable_sticky';
                        }

                    ?>
                </div>
            </div>
        </div>
        <nav id="site-navigation" class="decents-blog-main-navigation <?php echo esc_attr($menu_sticky);?>">
            <button class="toggle-button" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle">
            <div class="toggle-text"></div>
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
            </button>
            <div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">
            <button class="close close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal"></button>
                <div class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'decents-blog' ); ?>">
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
    </header>