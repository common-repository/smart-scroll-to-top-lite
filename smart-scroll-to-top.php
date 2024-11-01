<?php
defined('ABSPATH') or die('No scripts for you');
/*
  Plugin Name: Smart Scroll To Top Lite
  Plugin URI:  https://wordpress.org/plugins/smart-scroll-to-top-lite/
  Description: Plugin applies a back to top element that links back to the previous value
  Version:     1.0.5
  Author:      AccessPress Themes
  Author URI:  http://accesspressthemes.com
  Domain Path: /languages
  Text Domain: smart-scroll-to-top-lite
 */

/**
* Plugin Class
*/
if (!class_exists('SmartScroll_TTL')) {
	class SmartScroll_TTL
		{
			function __construct()
				{
		            $this->define_constants();
		            $this->includes();
				}

			public function define_constants()
				{
					global $wpdb;
					$this->define('sstt_dir_url_lite', plugin_dir_url( __FILE__ ));
					$this->define('sstt_dir_path_lite', plugin_dir_path( __FILE__ ));
					$this->define('sstt_version', '1.0.5');
					$this->define('sstt_css', sstt_dir_url_lite . 'assets/css/');
					$this->define('sstt_js', sstt_dir_url_lite . 'assets/js/');
					$this->define('sstt_images', sstt_dir_url_lite . 'assets/images/');
					$this->define('sstt_settings', sstt_dir_url_lite . 'settings/');
					$this->define('sstt_element_table', $wpdb->prefix . 'sstt_settings');
					$this->define('sstt_template_table', $wpdb->prefix . 'sstt_custom_template');
				}

			/**
           	* Define constant if not already set.
          	*/
          	private function define( $name, $value )
	          	{
		            if ( ! defined( $name ) ) {
		              define( $name, $value );
		            }
	          	}

			public function includes()
				{
					require_once sstt_dir_path_lite . 'inc/classes/sstt_library.php';
					require_once sstt_dir_path_lite . 'inc/classes/sstt_autoloads.php';
					require_once sstt_dir_path_lite . 'inc/classes/sstt_enqueues.php';
					require_once sstt_dir_path_lite . 'inc/classes/sstt_admin.php';
					require_once sstt_dir_path_lite . 'inc/classes/sstt_admin_post.php';
				}
		}
}
new SmartScroll_TTL();
