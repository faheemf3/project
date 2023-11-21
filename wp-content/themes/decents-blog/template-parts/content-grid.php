<?php 
$grid_column=get_theme_mod('decents_blog_grid_column_setting', esc_html__( '5', 'decents-blog' ));
$showauthor=get_theme_mod('decents_blog_archive_co_post_author',true);
$showdate=get_theme_mod('decents_blog_archive_co_post_date',true);
$showimage=get_theme_mod('decents_blog_archive_co_featured_image',true);
$showcategory=get_theme_mod('decents_blog_archive_co_categories',true);
$showview=get_theme_mod('decents_blog_archive_co_view',true);
$showcomment=get_theme_mod('decents_blog_archive_co_comment',true);
$grid_class='';
if($grid_column=='4'){
    $grid_class='grid_column';
}
else if($grid_column=='3'){
    $grid_class='grid_column2';
}
?>
<li class="grid-item <?php echo esc_attr($grid_class);?>">
    <?php if($showauthor){?>
    <div class="grid-top">
        <div class="grid-useravatar"><?php echo get_avatar(get_the_author_meta('email')); ?></div>
        <div class="grid-username"><span class="post-text"></span><i></i> <?php decents_blog_posted_by();?></div>             
    </div>
    <?php } 
        if($showimage){
    ?>
    <figure class="borderhover">
       <?php decents_blog_post_thumbnail(); ?>
        <a href="#"></a>
    </figure>
    <?php } ?>

    <div class="grid-content">
        <?php if($showcategory){ ?><div class="article-category"><?php the_category(' '); ?></div><?php } ?><!-- end .article-category -->                          
        <!-- Title --><?php
                if ( is_singular() ) :
                the_title( '<h2 class="title mb-20">', '</h1>' );
                else :
                the_title( '<h2 class="title mb-20"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                endif;

            ?><div class="clear"></div>
        <!-- Date -->
        <?php if($showdate){ ?>
        <div class="dcblog-date"><i class="fa fa-clock-o"></i> <?php decents_blog_posted_on();?></div><?php } ?><div class="clear"></div></div>
        
    <!-- end .inner-cell --> 
    <?php if($showview!='' || $showcomment!='') { ?>
    <div class="grid-bottom">
        <?php if($showview) {
             
			?>
            <div class="post-views"> 
			         <i class="fa fa-eye"></i>
                    <?php if(decents_blog_get_post_view()!=0){ 
                         echo esc_html(decents_blog_get_post_view()); 
                     } else {
                            echo esc_html('0');
                     }?>
            </div>
        <?php } ?>

        <?php if($showcomment){ ?><div class="grid-comm"><i class="fa fa-comment"></i><?php decents_blog_entry_comments();?></div><?php } ?>
    </div>
    <?php } ?>
</li>