<?php 
$showauthor=get_theme_mod('decents_blog_archive_co_post_author',true);
$showdate=get_theme_mod('decents_blog_archive_co_post_date',true);
$showimage=get_theme_mod('decents_blog_archive_co_featured_image',true);
$showcategory=get_theme_mod('decents_blog_archive_co_categories',true);
$showview=get_theme_mod('decents_blog_archive_co_view',true);
$showcomment=get_theme_mod('decents_blog_archive_co_comment',true);
?>
<li>
    <?php if($showimage) { ?>
    <figure class="borderhover_right">
       <?php decents_blog_post_thumbnail(); ?>
        <a href="#"></a>
    </figure>
    <?php } ?>
    <div class="grid-content-right">
        <?php if($showauthor) { ?>
        <div class="grid-top-right">
            <div class="grid-useravatar-right"><?php echo get_avatar( get_the_author_meta('email'), '60' ); ?></div>
            <div class="grid-username-right"><span class="post-text"><?php decents_blog_posted_by();?></div>            
        </div>
        <?php }
            if($showcategory){
         ?>
        <div class="article-category-right"><?php the_category(' '); ?></div><?php } ?><!-- end .article-category -->                          
        <!-- Title --><?php
                if ( is_singular() ) :
                the_title( '<h1 class="title mb-20">', '</h1>' );
                else :
                the_title( '<h2 class="title mb-20"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                endif;

            ?>
            <div class="clear"></div>
       
            <?php
            if (is_singular()) {
                the_content();
            } else {
                    the_excerpt();
            }
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'decents-blog'),
                'after' => '</div>',
            ));
            ?>
        
        <!-- Date --><?php if($showdate){ ?><div class="dcblog-date-right"><i class="fa fa-clock-o"></i><?php decents_blog_posted_on();?></div><?php } ?><div class="clear"></div>
    </div><!-- end .inner-cell --> 
    
     <?php if($showview!='' || $showcomment!='') { ?>
    <div class="grid-bottom-right">
         <?php if($showview && decents_blog_post_view_count()) { ?>
        <div class="post-views-right">
            <span><i class="fa fa-eye"></i> 
                <?php 
                  echo esc_html(decents_blog_post_view_count());  
                ?>
            </span>
        </div>

        <?php } ?>
        <?php if($showcomment){ ?><div class="grid-comm-right"><i class="fa fa-comment"></i><?php decents_blog_entry_comments();?></div><?php } ?>
    </div>
    <?php } ?>
</li>