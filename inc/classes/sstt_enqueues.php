<?php defined('ABSPATH') or die('No scripts for you') ?>
<?php
if (!class_exists('SSTT_Enqueue_Lite')) {
	/**
	* This class apply ui and ux related assets
	*/
	class SSTT_Enqueue_Lite
	{
		function __construct()
		{
			add_action( 'admin_enqueue_scripts' , array($this,'register_admin_assets'));
			add_action( 'wp_enqueue_scripts' , array($this,'register_frontend_assets'));
		}
		public function register_admin_assets(){

			wp_enqueue_script( 'sstt_unrestricted_script_js' , sstt_js . 'admin_unrestricted_js.js' , array('jquery') , sstt_version);
			
			if (self::within_this_plugin()) {

                wp_enqueue_media();
				wp_enqueue_script( 'sstt_admin_script_js' , sstt_js . 'admin_script_js.js' , array('jquery') , sstt_version);

				wp_enqueue_script( 'sstt_live_preview_js' , sstt_js . 'sstt_live_backend_preview.js' , array('jquery') , sstt_version);
				// wp_enqueue_style( 'sstt_admin_text_animation' , sstt_css . 'sstt_text_animation.css' , array() , sstt_version);
				// wp_enqueue_style( 'sstt_admin_animate_css' , sstt_css . 'animate.css' , array() , sstt_version );
				// wp_enqueue_style( 'sstt_admin_hover_css' , sstt_css . 'hover-min.css' , array() , sstt_version );

				// wp_enqueue_script( 'sstt_custom_live_preview_js' , sstt_js . 'sstt_custom_live_backend_preview.js' , array('jquery') , sstt_version);
				wp_enqueue_style( 'sstt_admin_style_css' , sstt_css . 'admin_style_css.css' , array() , sstt_version);
				wp_enqueue_style( 'sstt_admin_font_awesome_css' , sstt_css . 'available_icons/font-awesome.min.css' , array() , sstt_version);
				wp_enqueue_style( 'sstt_admin_icomoon_css' , sstt_css . 'available_icons/icomoon/icomoon.css' , array() , sstt_version);
				wp_enqueue_style( 'sstt_admin_icomoon_latest_css' , sstt_css . 'available_icons/icomoon.css' , array() , sstt_version);
				wp_enqueue_style( 'sstt_admin_linecon_css' , sstt_css . 'available_icons/linecon/linecon.css' , array() , sstt_version);
				wp_enqueue_style( 'sstt_admin_genericon_css' , sstt_css . 'available_icons/genericons.css' , array() , sstt_version);
				wp_enqueue_style( 'sstt_admin_themify_css' , sstt_css . 'available_icons/themify-icons.css' , array() , sstt_version);
				wp_enqueue_style( 'sstt_admin_ionicons_css' , sstt_css . 'available_icons/ionicons.css' , array() , sstt_version);
				wp_enqueue_style( 'sstt_admin_materialicons_css' , sstt_css . 'available_icons/material-icons.css' , array() , sstt_version);
				wp_enqueue_style( 'sstt_admin_fa_solid_css' , sstt_css . 'available_icons/fa-solid.css' , array() , sstt_version);

				wp_enqueue_style( 'sstt_admin_flaticons_1_css' , sstt_css . 'available_icons/flaticons/flaticons_1/flaticon.css' , array() , sstt_version);

				// wp_enqueue_style('wp-color-picker');
    //             wp_enqueue_script('sstt-colorpicker-alpha', sstt_js . 'wp-color-picker-alpha.js', array('wp-color-picker'), sstt_version);

                wp_enqueue_script('sstt-pro-webfont', '//ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js');
			}
		}

		public function register_frontend_assets(){
				wp_enqueue_script( 'sstt_frontend_script_js' , sstt_js . 'sstt_frontend_script_js.js' , array('jquery') , sstt_version);
				wp_enqueue_style( 'sstt_frontend_style_css' , sstt_css . 'sstt_frontend_style_css.css' , array() , sstt_version);
				wp_enqueue_style( 'sstt_frontend_fa_solid_css' , sstt_css . 'available_icons/fa-solid.css' , array() , sstt_version);
				wp_enqueue_style( 'sstt_font_awesome_css' , sstt_css . 'available_icons/font-awesome.min.css' , array() , sstt_version);
				wp_enqueue_style( 'sstt_icomoon_css' , sstt_css . 'available_icons/icomoon/icomoon.css' , array() , sstt_version);
				wp_enqueue_style( 'sstt_icomoon_latest_css' , sstt_css . 'available_icons/icomoon.css' , array() , sstt_version);
				wp_enqueue_style( 'sstt_linecon_css' , sstt_css . 'available_icons/linecon/linecon.css' , array() , sstt_version);
				wp_enqueue_style( 'sstt_genericon_css' , sstt_css . 'available_icons/genericons.css' , array() , sstt_version);
            	wp_enqueue_style( 'dashicons');

				wp_enqueue_style( 'sstt_frontend_themify_css' , sstt_css . 'available_icons/themify-icons.css' , array() , sstt_version);
				wp_enqueue_style( 'sstt_frontend_ionicons_css' , sstt_css . 'available_icons/ionicons.css' , array() , sstt_version);
				wp_enqueue_style( 'sstt_frontend_materialicons_css' , sstt_css . 'available_icons/material-icons.css' , array() , sstt_version);

				wp_enqueue_style( 'sstt_frontend_flaticons_1_css' , sstt_css . 'available_icons/flaticons/flaticons_1/flaticon.css' , array() , sstt_version);

	            wp_enqueue_style('sstt_font_families','https://fonts.googleapis.com/css?family=Open+Sans');

		}

		public function within_this_plugin(){
			$slugs = array('smart-scroll-to-top-lite','add_new_sstt_lite','sstt_setting_lite','sstt_custom_template_lite','sstt_about_us');
			if (isset($_GET['page']) && in_array(esc_attr($_GET['page']), $slugs)) {
				return true;
			}
			return false;
		}
	}
	new SSTT_Enqueue_Lite();
}