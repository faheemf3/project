<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class decents_blog_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . '/include/custom-button/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'decents_blog_Customize_Section_Pro' );

		// doc sections.
		$manager->add_section(
			new decents_blog_Customize_Section_Pro(
				$manager,
				'decents-blog',
				array(
					'title'    => esc_html__( 'Recommended Plugins', 'decents-blog' ),
					'pro_text' => esc_html__( 'Install Now', 'decents-blog' ),
					'pro_url'  => 'themes.php?page=tgmpa-install-plugins',
					'priority'  => 0
				)
			)
		);
		$manager->add_section(
			new decents_blog_Customize_Section_Pro(
				$manager,
				'anymags_section_demo',
				array(
					'title'    => 'Check Premium',
					'description'=>__( 'View Now', 'decents-blog' ),
					'pro_text' => esc_html__( 'Click here','decents-blog' ),
					'pro_url'  => 'https://blogwpthemes.com/downloads/decent-blog-pro-wordpress-theme/',
					'priority' => 0,					
				)
			)
		);
		
		 
		 	}
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'decents-blog-customize-controls', trailingslashit( get_template_directory_uri() ) . '/include/custom-button/customize-controls.js', array( 'customize-controls' ) );
		
		wp_enqueue_style( 'decents-blog-customize-controls', trailingslashit( get_template_directory_uri() ) . '/include/custom-button/customize-controls.css' );
	}
}
decents_blog_Customize::get_instance();