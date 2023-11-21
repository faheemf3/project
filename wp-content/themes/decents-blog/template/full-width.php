<?php
/**
Template Name:Full Width Page
**/
get_header();?>
<div class="container-fluid pt-5" id="main">
	<?php
		while (have_posts()):
			the_post();
			
			decents_blog_post_thumbnail(); ?>
				<div class="entry-content">
					<?php
						the_content();

							wp_link_pages(
							array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'decents-blog' ),
							'after'  => '</div>',
							)
						);
					?>
				</div><!-- .entry-content -->
			<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()):
				comments_template();
			endif;
		endwhile; // End of the loop.
	?>
</div>
<?php get_footer();?>