<?php defined('ABSPATH') or die('Scripts for you') ?>
<?php
/**
* 
*/
if (!class_exists('SSTT_Admin_Lite')) {
	class SSTT_Admin_Lite extends SSTT_Library_Lite
	{
		var $options;
		function __construct()
		{
			$this->options = get_option('sstt_general_options_lite');
			add_action('admin_menu',array($this,'sstt_menus'));
		}

		public function sstt_menus()
		{
			add_menu_page(esc_attr__('Smart Scroll','smart-scroll-to-top-lite') . '<br>' . esc_attr__('to Top Lite','smart-scroll-to-top-lite'),esc_attr__('Smart Scroll','smart-scroll-to-top-lite') . '<br>' . esc_attr__('to Top Lite','smart-scroll-to-top-lite'),'manage_options','smart-scroll-to-top-lite',array($this,'main_menu_listing'),'dashicons-arrow-up-alt2');

			$header_title = (isset($_GET['edit']) && is_numeric($_GET['edit']))?esc_attr__('Edit SSTT Setting','smart-scroll-to-top-lite'):esc_attr__('Element Listing','smart-scroll-to-top-lite');
			add_submenu_page('smart-scroll-to-top-lite',$header_title,esc_attr__('Element Listing','smart-scroll-to-top-lite'),'manage_options','smart-scroll-to-top-lite',array($this,'main_menu_listing'));
			
			global $wpdb;
			$table_name = $wpdb->prefix . 'sstt_settings';
			$count = intval($wpdb->get_var("SELECT count(*) FROM $table_name"));
			if ($count < 1) {
				add_submenu_page('smart-scroll-to-top-lite',esc_attr__('Add New Element','smart-scroll-to-top-lite'),esc_attr__('Add New Element','smart-scroll-to-top-lite'),'manage_options','add_new_sstt_lite',array($this,'add_new_element'));
			}

			add_submenu_page('smart-scroll-to-top-lite',esc_attr__('General Setting','smart-scroll-to-top-lite'),esc_attr__('General Setting','smart-scroll-to-top-lite'),'manage_options','sstt_setting_lite',array($this,'element_setting'));
			add_submenu_page('smart-scroll-to-top-lite',esc_attr__('More WordPress Stuff','smart-scroll-to-top-lite'),esc_attr__('More WordPress Stuff','smart-scroll-to-top-lite'),'manage_options','sstt_about_us',array($this,'about_us'));
		}

		public function main_menu_listing()
		{
			global $wpdb;
			$table_name = $wpdb->prefix . 'sstt_settings';
			if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
				$id = intval($_GET['edit']);
				$sstt_element = $wpdb->get_row("SELECT * FROM $table_name WHERE id=$id");
				$title = esc_attr__('Edit Setting','smart-scroll-to-top-lite');
				$options = $this->options;
				$sstt_settings = maybe_unserialize($sstt_element->sstt_settings);
				include_once sstt_dir_path_lite . 'inc/backend/sstt_pages/edit_element.php';
			}
			else{
				$sstt_elements = $wpdb->get_results("SELECT * FROM $table_name");
				$title = esc_attr__('Smart Scroll To Top Lite Elements Listing','smart-scroll-to-top-lite');
				$options = $this->options;
				include_once sstt_dir_path_lite . 'inc/backend/sstt_pages/main_menu_listing.php';
			}
		}
		
		public function add_new_element()
		{
			$title = esc_attr__('Add New Element','smart-scroll-to-top-lite');
			$options = $this->options;

			include_once sstt_dir_path_lite . 'inc/backend/sstt_pages/add_new_element.php';
		}

		public function element_setting()
		{
			global $wpdb;
			$table_name = $wpdb->prefix . 'sstt_settings';
			$sstt_elements = $wpdb->get_results("SELECT * FROM $table_name");
			$title = esc_attr__('General Setting','smart-scroll-to-top-lite');
			$sstt_setting = get_option('sstt_selected_element');
			include_once sstt_dir_path_lite . 'inc/backend/sstt_pages/element_setting.php';
		}

		
		public function about_us()
		{
			$title = 'More WordPress Stuff';
			include_once sstt_dir_path_lite . 'inc/backend/sstt_about.php';
		}

	}
	new SSTT_Admin_Lite();
}