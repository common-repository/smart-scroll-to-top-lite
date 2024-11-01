<?php defined('ABSPATH') or die('No scripts for you'); ?>
<?php
if (!class_exists('SSTT_Autoload_Lite')) {
	/**
	* When the plugin loads
	*/
	class SSTT_Autoload_Lite extends SSTT_Library_Lite
	{
		
		function __construct()
		{
            register_activation_hook( sstt_dir_path_lite . 'smart-scroll-to-top.php' , array( $this , 'sstt_plugin_activation' ) );
			add_action( 'plugins_loaded' , array( $this , 'on_plugin_loaded' ) );
			add_action('wp_footer',array($this,'sstt_frontend_display'));
		}

		public function on_plugin_loaded()
		{
			$this->load_text_domain();
			$this->load_default_options();
		}

		private function load_text_domain(){
			// $value = load_plugin_textdomain( 'smart-scroll-to-top-lite' , false , sstt_dir_path_lite . 'languages/' );
			$value = load_textdomain( 'smart-scroll-to-top-lite' , dirname( plugin_basename( __FILE__ ) ) . 'languages/' );
			// parent::print_array($value);
			// die();
		}

		private function load_default_options(){
			$option = array(
				'layout_options'	=> array(
										'layout_mode'			=> array('desktop','mobile'),
										'desktop_positions'		=> array('middle_left','middle_right','bottom_left','bottom_right'),
										'mobile_positions'		=> array('bottom_left','bottom_right'),
									),
				'display_options'	=> array(
										'trigger_offset_type'	=> array('pixels','percentage'),
										'scroll_back_position'	=> array('top'),
									),
				'template_options'	=> array(
										'template_1' 		=> array(
																'name'		=> 'Gallery',
																'slug'		=> 'template_1',
																'src'		=> sstt_images . 'template_images/template 1.PNG',
																'layouts'	=> array('square','rounded_square','circular'),
																),
										'template_2' 		=> array(
																'name'		=> 'Mongoose',
																'slug'		=> 'template_2',
																'src'		=> sstt_images . 'template_images/template 2.PNG',
																'layouts'	=> array('square','rounded_square','circular'),
																),
										'template_3' 		=> array(
																'name'		=> 'Flamingo',
																'slug'		=> 'template_3',
																'src'		=> sstt_images . 'template_images/template 3.PNG',
																'layouts'	=> array('square','rounded_square','circular'),
																),
										'template_4' 		=> array(
																'name'		=> 'Sunset Orange',
																'slug'		=> 'template_4',
																'src'		=> sstt_images . 'template_images/template 4.PNG',
																'layouts'	=> array('square','rounded_square','circular'),
																),
										'template_5' 		=> array(
																'name'		=> 'Aquamarine Semblance',
																'slug'		=> 'template_5',
																'src'		=> sstt_images . 'template_images/template 5.PNG',
																'layouts'	=> array('square','rounded_square','circular'),
																),
										'template_10' 		=> array(
																'name'		=> 'Layered Pizza',
																'slug'		=> 'template_10',
																'src'		=> sstt_images . 'template_images/template 10.PNG',
																'layouts'	=> array('pill','curved_edges','square'),
																),
										'template_12' 		=> array(
																'name'		=> 'Scooter',
																'slug'		=> 'template_12',
																'src'		=> sstt_images . 'template_images/template 12.PNG',
																'layouts'	=> array('pill','curved_edges','square'),
																),
										'template_18' 		=> array(
																'name'		=> 'Allports Hexed',
																'slug'		=> 'template_18',
																'src'		=> sstt_images . 'template_images/template 18.PNG',
																'layouts'	=> array('hexagonal'),
																),

										'template_22' 		=> array(
																'name'		=> 'Honey Flower',
																'slug'		=> 'template_22',
																'src'		=> sstt_images . 'template_images/template 22.PNG',
																'layouts'	=> array('hemisphere'),
																),
										'template_24' 		=> array(
																'name'		=> 'Picton Blue',
																'slug'		=> 'template_24',
																'src'		=> sstt_images . 'template_images/template 24.PNG',
																'layouts'	=> array('pill','curved_edges','square'),
																),
				),
				'display_on'		=> array('home_page','all_pages'),
				'instance_type'		=> array('single_instance'),
			);
			update_option('sstt_general_options_lite',$option);
		}

		public function load_default_settings(){

		}

		public function register_post_type(){
			
		}

		public function sstt_plugin_activation()
		{
			include_once sstt_dir_path_lite . 'settings/backend/advanced/activation_setting.php';
		}

		public function register_plugin_widget(){
			register_widget('sstt_Widget');
		}

		public function sstt_frontend_display()
		{
			include_once sstt_dir_path_lite . 'inc/frontend/frontend_main_file.php';
		}

		/**
        * This is a function checks whether the window is desktop or mobile
        * Translations
        *
        * @since 1.0.0
        *
        */
        public function mobile_view(){
          $useragent=$_SERVER['HTTP_USER_AGENT'];

          if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
            return false;
          }
          return true;
        }

        public function ssttGenerateIcons( $type , $data , $default_icon , $content = '')
        {
        	if ($type == 'default_icon') {
        		$resulting_string = "<i class='";
        		$resulting_string .= $default_icon;
        		$resulting_string .= "'>" . $content . "</i>";
        		echo $resulting_string;
        	}
        	elseif ($type == 'available_icons') {
        		$icon_index = explode('|', $data);

        		$resulting_string = "<i class='sstt_available_icon ";
        		$resulting_string .= $icon_index[0] . ' ';
        		$resulting_string .= isset($icon_index[1])?esc_attr($icon_index[1]):'';
        		$resulting_string .= "'>" . $content . "</i>";
        		echo $resulting_string;
        	}
        	elseif ($type == 'custom_icons') {
        		$image_url = wp_get_attachment_url(intval($data));
        		$resulting_string = "<img class='sstt_custom_icon' ";
        		$resulting_string .= "src='" . $image_url . "'>";
        		echo $resulting_string;
        	}
        }
	}
	new SSTT_Autoload_Lite();
}