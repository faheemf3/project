<?php get_header(); ?>
		<div class="error-page-section">
            <div class="container">
                <div class="error-page-inner">
                    <h1><?php echo esc_html__('404','decents-blog');?></h1>
                    <h3><i class="fa fa-exclamation-triangle"></i><?php echo esc_html__('Oops! Page Not Found','decents-blog')?></h3>
                    <p><?php echo esc_html__('It looks like nothing was found at this location.','decents-blog')?></p>
                    <div class="btn-group">
                        <a href="<?php echo esc_url(home_url());?>" class="btn">
                            <?php echo esc_html__('Go Back To Home','decents-blog');?> 
                        </a>
                    </div>
                </div>
            </div>
        </div>
<?php get_footer(); ?>