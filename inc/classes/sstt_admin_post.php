<?php defined('ABSPATH') or die('No Scripts for you') ?>
<?php
if (!class_exists('SSTT_Admin_Post_Lite')) {
	/**
	* Class for admin posts
	*/
	class SSTT_Admin_Post_Lite extends SSTT_Library_Lite
	{
		
		function __construct()
		{
			add_action( 'admin_post_sstt_new_element' , array( $this , 'sstt_new_element' ) );
			add_action( 'admin_post_sstt_delete_setting' , array( $this , 'sstt_delete_setting' ) );
			add_action( 'admin_post_sstt_save_main_setting' , array( $this , 'sstt_save_main_setting' ) );
		}

		public function sstt_new_element()
		{
			if (current_user_can('manage_options')) {
				if (isset($_POST['sstt_new_element_nonce_field']) && wp_verify_nonce($_POST['sstt_new_element_nonce_field'],'sstt_new_element_nonce')) {
					include_once sstt_dir_path_lite . 'settings/backend/sstt_crud/save_element.php';
				}
			}
		}

		public function sstt_save_main_setting()
		{
			if (current_user_can('manage_options')) {
				if (isset($_POST['sstt_setting_nonce_field']) && wp_verify_nonce($_POST['sstt_setting_nonce_field'],'sstt_setting_nonce')) {
					include_once sstt_dir_path_lite . 'settings/backend/save_sstt_setting.php';
				}
			}
		}

	}
	new SSTT_Admin_Post_Lite();
}
