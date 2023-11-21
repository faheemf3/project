<?php 

$showdate=get_theme_mod('decents_article_archive_co_post_date',true);
$showimage=get_theme_mod('decents_article_archive_co_featured_image',true);
$showcategory=get_theme_mod('decents_article_archive_co_categories',true);
$showcomment=get_theme_mod('decents_article_archive_co_comment',true);

?>
<section class="wp-index-blog-section" id="primary">
        <div class="container-fluid">
            <div class="row">
                <div class=" col-md-12 col-sm-12 content_side">
                    <div class="grid">
                <?php
                    if ( have_posts() ) :

                        if ( is_home() && ! is_front_page() ) :
                        ?>
                        <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                        </header>
                        <?php
                        endif;

                        /* Start the Loop */
                        while ( have_posts() ) :
                        the_post();

                        /*
                        * Include the Post-Type-specific template for the content.
                        * If you want to override this in a child theme, then include a file
                        * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                        */
                        ?>
                            <div class="grid-item">
                                <div class="grid_post">
                                    <?php if($showimage){ decents_blog_post_thumbnail(); } ?>
                                    <div class="grid_content">
                                        <?php
                                        if($showcategory){
                                        ?>
                                        <span class="grid_category">
                                            <?php the_category(' '); ?>
                                        </span>
                                        <?php 
                                        }
                                        if ( is_singular() ) :
                                        the_title( '<h2 class="title">', '</h1>' );
                                        else :
                                        the_title( '<h2 class="title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                        endif;                
                                
                                        the_excerpt();
                                        if($showdate){
                                        ?>
                                        <div class="home-meta">
                                                <?php if($showdate) { ?>
                                                <div class="an-display-time"><?php decents_blog_posted_on();?></div>
                                                <?php } ?>
                                                <?php if($showcomment) { ?><li><i class="fa fa-comment"></i> <?php echo esc_html(get_comments_number());  ?> </li><?php } ?>                     
                                                <div class="clear"></div> 
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>      
                        <?php

                        endwhile;

                    else :

                    get_template_part( 'template-parts/content', 'none' );

                    endif;
                ?>
                
                </div>
                <div class="defaultpag">
                    <?php
                     do_action( 'decents_blog_action_load_pagination');
                    ?> 

                </div>
            </div>
            
        </div>  
    </div>
</section>