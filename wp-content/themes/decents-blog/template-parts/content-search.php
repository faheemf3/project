<li>
    <figure class="borderhover_right">
       <?php decents_blog_post_thumbnail(); ?>
        <a href="#"></a>
    </figure>

    <div class="grid-content-right">
        <div class="grid-top-right">
            <div class="grid-useravatar-right"><?php echo get_avatar( get_the_author_meta('email'), '60' ); ?></div>
            <div class="grid-username-right"><span class="post-text"><?php decents_blog_posted_by();?></div>            
        </div>
        <div class="article-category-right"><?php the_category(' '); ?></div><!-- end .article-category -->                          
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
        
        <!-- Date --><div class="dcblog-date-right"><i class="fa fa-clock-o"></i><?php decents_blog_posted_on();?></div><div class="clear"></div>
    </div><!-- end .inner-cell --> 
    

    <div class="grid-bottom-right">
        <div class="post-views-right">
            <span><i class="fa fa-eye"></i> 
                <?php 
                    echo esc_html(decents_blog_post_view_count());
                ?>
            </span>
        </div>
        <div class="grid-comm-right"><i class="fa fa-comment"></i><?php decents_blog_entry_comments();?></div>
    </div>
</li>