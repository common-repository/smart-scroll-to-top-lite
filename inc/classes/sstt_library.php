<?php
defined('ABSPATH') or die('No scripts for you');

if (!class_exists('SSTT_Library_Lite')) {
	/**
	* Library Class
	*/
	class SSTT_Library_Lite
	{
		var $options;
		/**
		* Displays array's format
		*
		* This function can also be implemented using var_dump()
		*
		* @param [array][$array_var]
		*/
		public function print_array($array_var){
			if (is_array($array_var)) {
				echo "<pre>";
				print_r($array_var);
				echo "</pre>";
			}
			elseif (is_object($array_var)) {
				echo "<pre>";
				print_r($array_var);
				echo "</pre>";
			}
			else{
				echo "Parameter Error: Not an array" . self::new_line();
				var_dump($array_var);
			}
		}

		public function new_line(){
			return "<br/>";
		}

		public function short_message($string_var)
		{
			$allowed_html = wp_kses_allowed_html('post');
			echo wp_kses("<i class='sstt_short_message'>" . $string_var . "</i>" , $allowed_html );
		}

		public function admin_alert_message($content,$type,$dismissible = true)
		{
			$allowed_html = wp_kses_allowed_html('post');
		 	echo wp_kses("<div class='sstt_admin_message notice notice-" . $type ." " . (isset($dismissible)?'is-dismissible':'') . "'><p>" . $content . "</p></div>",$allowed_html);
		}

	}
}