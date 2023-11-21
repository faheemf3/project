<?php 
$grid_column=get_theme_mod('decents_blog_grid_column_setting', esc_html__( '5', 'decents-blog' ));
$grid_class='';
if($grid_column=='4'){
    $grid_class='grid_column_list';
}
else if($grid_column=='3'){
    $grid_class='grid_column_list_2';
}
?>
<section class="wp-index-blog-section" id="primary">
        <div class="container-fluid">
             <ul class="grid_list grid <?php echo esc_attr($grid_class);?>">
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
                        get_template_part( 'template-parts/content', 'grid');

                        endwhile;

                    else :

                    get_template_part( 'template-parts/content', 'none' );

                    endif;
                ?>
                
            </ul>
            <div class="defaultpag">
                    <?php
                     do_action( 'decents_blog_action_load_pagination');
                    ?> 

            </div>
        </div>  
</section>