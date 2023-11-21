<?php 

$showauthor=get_theme_mod('decents_article_single_co_post_author',true);
$showdate=get_theme_mod('decents_article_single_co_post_date',true);
$showimage=get_theme_mod('decents_article_single_co_featured_image_post',true);
$showcategory=get_theme_mod('decents_article_single_co_post_category',true);
$showtag=get_theme_mod('decents_article_single_co_post_tags',true);
$showcomment=get_theme_mod('decents_article_single_co_post_comment',true);


?>
<div class="blog-wrap">
    <?php if($showimage){ ?>
    <div class="image-part ">
        <?php decents_blog_post_thumbnail(); ?>
    </div>
    <?php } ?>
    <div class="content-part p-0">
       <?php if($showcategory) { ?><div class="category-name"> <?php the_category(' '); ?></div><?php } ?> 
        <?php
            if ( is_singular() ) :
            the_title( '<h2 class="title mb-20">', '</h2>' );
            else :
            the_title( '<h3 class="title mb-20"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
            endif;
        ?>
        <div class="post-sub-link mb-25">
        <ul>
            <?php if($showauthor){?>
            <li class="post-auther-detail">
                <?php echo get_avatar( get_the_author_meta('email'), '60' ); ?><?php decents_blog_posted_by();?>
                <?php if($showcomment) { ?><li><i class="fa fa-comment"></i> <?php echo esc_html(get_comments_number());  ?></li><?php } ?>
            </li>
            <?php }
                if($showdate){
            ?>
            <li class="post-date">
                <time>                
                       <i class="fa fa-clock-o"></i><?php the_date();?>
                </time>
            </li>
            <?php }
             ?>
        </ul>
    </div>                             
    <?php
        
        if (is_singular()) {
            the_content();
        } else {
                the_excerpt();
        }
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'decents-article'),
            'after' => '</div>',
        ));

        if(!the_excerpt()){
    ?>
        <blockquote class="block">
            <?php the_excerpt();?>
        </blockquote>
        <?php } 
        if($showtag){?>
        <div class="post-tags">
            <a href="#"><?php the_tags(null, ' ', '<br />'); ?></a>
        </div>

        <?php
            }
            $prevPost = get_previous_post();
            $nextPost = get_next_post();
            $previous_post_url = esc_url(get_permalink( get_adjacent_post(false,'',true)));
            $next_post_url = esc_url(get_permalink( get_adjacent_post(false,'',false)));
            if(get_previous_post_link()!='' || get_next_post_link()!=''){
            ?>
            <div class="post-navigation">
                <?php if (get_previous_post_link()) {  ?>
                <div class="post-prev">
                    <a href="<?php echo esc_url($previous_post_url); ?>">
                        <div class="postnav-image">
                            <i class="fa fa-chevron-left"></i>
                            <div class="overlay"></div> 
                        </div>
                        <div class="prev-post-title">
                            <span><?php echo esc_html__('Previous Post','decents-article'); ?></span>
                    </a>
                            <h6><?php (previous_post_link( '%link', '%title', true )) ?></h6>
                        </div>
                </div>
                <?php } 
                     if (get_next_post_link()) {  ?>
                <div class="post-next">
                    <a href="<?php echo esc_url($next_post_url); ?>">
                        <div class="postnav-image">
                            <i class="fa fa-chevron-right"></i>
                            <div class="overlay"></div> 
                        </div> 
                        <div class="next-post-title">
                            <span><?php echo esc_html__('Next Post','decents-article');?></span>
                    </a>
                            <h6><?php next_post_link( '%link', '%title', true ); ?></h6>
                        </div>               
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>