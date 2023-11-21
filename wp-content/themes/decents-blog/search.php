<?php get_header(); 
$sidebar_position = get_theme_mod('decents_blog_sidebar_position', esc_html__( 'right', 'decents-blog' ));
?>
	<section class="wp-blog-section ptb-20 bg-color" id="primary">
		<div class="container">
			<?php
        	if ($sidebar_position == 'left') {
                $sidebar_position = 'has-left-sidebar';
            } elseif ($sidebar_position == 'right') {
                $sidebar_position = 'has-right-sidebar';
            } elseif ($sidebar_position == 'no') {
                $sidebar_position = 'no-sidebar';
            }elseif ($sidebar_position == 'grid') {
                $sidebar_position = 'has-right-sidebar';
            }
        	?>
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
					if ( have_posts() ) : ?>

							<header class="page-header">
								<h1 class="page-title">
									<?php
									/* translators: %s: search query. */
									printf( esc_html__( 'Search Results for: %s', 'decents-blog' ), '<span>' . get_search_query() . '</span>' );
									?>
								</h1>
							</header><!-- .page-header -->

							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

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
get_footer();
?>