<?php
get_header();
$sidebar_position = get_theme_mod('decents_article_sidebar_position', esc_html__( 'grid', 'decents-article' ));
    $grid='';
    if ($sidebar_position == 'left') {
        $sidebar_position = 'has-left-sidebar';
    } elseif ($sidebar_position == 'right') {
        $sidebar_position = 'has-right-sidebar';
    } elseif ($sidebar_position == 'no') {
        $sidebar_position = 'no-sidebar';
    }
    elseif ($sidebar_position == 'grid'){
        $grid='gridlayout';
    }
    if($grid=='gridlayout'){
        get_template_part( 'template-parts/content','grid');    
    }
    else{
?>
	<section class="wp-blog-section ptb-20 bg-color" id="primary">
		<div class="container">
			
			<div class="row <?php echo esc_attr($sidebar_position);?>">
				<?php if(is_active_sidebar( 'sidebar-1' )) { ?>
				<div class="col-lg-8">
					<?php } 
					else{
						?>
						<div class="col-lg-12">
						<?php
					}
					?>
                    <div class="blog-wrap">
                        <ul class="grid_list_right">
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
								get_template_part( 'template-parts/content', get_post_type() );

								endwhile;

							else :

							get_template_part( 'template-parts/content', 'none' );

							endif;
						?>

                        </ul>
                    </div>
                    
                    <div class="pagination">
                        <nav class="Page navigation">
                            <ul class="page-numbers">
                               <?php echo paginate_links(); ?>
                            </ul>
                        </nav>
                    </div>
				</div>
				<div class="col-lg-4">
                    <div class="sidebar-search sidebar pt-0">
                       <?php get_sidebar();?>
                    </div>
					
				</div>
			</div>
		</div>
	</section>
<?php
	}
get_footer();