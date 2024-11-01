<?php defined('ABSPATH') or die('No scripts for you') ?>
<?php
$selected_element = get_option('sstt_selected_element');
if ($selected_element['status']) {

	// parent::print_array($selected_element);

	if (
		( ($selected_element['display_on'] == 'all_pages' ) ) ||
		( ($selected_element['display_on'] == 'home_page') && is_front_page() )
		)
	{
		global $wpdb;
		$table_name = $wpdb->prefix . 'sstt_settings';
		$element_id_array = array();

		if (isset($_GET['sstt_preview'])) {
			$id = intval($_GET['sstt_preview']);
			array_push($element_id_array, $id);
		}
		else{
		  	include sstt_dir_path_lite . 'settings/frontend/element_selection/default_setting_choice.php';
		}

		$view_status = true;
		if ($selected_element['mobile'] == 0) {
			$view_status = self::mobile_view();
		}

		if ($view_status) {

			if (is_array($element_id_array) && !empty($element_id_array)) {
				foreach ($element_id_array as $index => $id) {
					$sstt_element = $wpdb->get_row("SELECT * FROM $table_name WHERE id=$id");

			if (is_object($sstt_element)) {

				$sstt_settings = maybe_unserialize($sstt_element->sstt_settings);
				// parent::print_array($sstt_settings);
				
				// Display Structure
				$template = !empty($sstt_settings['choosen_template'])?esc_attr($sstt_settings['choosen_template']):esc_attr('template_1');
				$template_layout = !empty($sstt_settings[$template . '_layout'])?esc_attr($sstt_settings[$template . '_layout']):'';

				$desktop_position = !empty($sstt_settings['desktop_position'])?esc_attr($sstt_settings['desktop_position']):esc_attr('bottom_right');
				$mobile_position = !empty($sstt_settings['mobile_position'])?esc_attr($sstt_settings['mobile_position']):esc_attr('bottom_right');

				$offset_type = !empty($sstt_settings['scroll_offset_type'])?esc_attr($sstt_settings['scroll_offset_type']):esc_attr('pixels');
				$custom_element_offset = !empty($sstt_settings['element_id_name'])?esc_attr($sstt_settings['element_id_name']):intval(0);
				$offset_value = ($offset_type == 'pixels')?floatval($sstt_settings['offset_pixel']):(($offset_type == 'percentage')?floatval($sstt_settings['offset_percentage']):(($offset_type == 'custom_element')?$custom_element_offset:''));
				$scroll_speed = isset($sstt_settings['scroll_speed'])?floatval($sstt_settings['scroll_speed']):floatval(1);

				$auto_hide = isset($sstt_settings['auto_hide'])?esc_attr('true'):esc_attr('false');

				$auto_hide_time = isset($sstt_settings['auto_hide_time'])?intval($sstt_settings['auto_hide_time']):intval(5);

				$scroll_back_to_pos = !empty($sstt_settings['scroll_back_to_pos'])?esc_attr($sstt_settings['scroll_back_to_pos']):esc_attr('top');

				$id_name = (!empty($sstt_settings['id_name']) && ($scroll_back_to_pos == 'anchor'))?esc_attr($sstt_settings['id_name']):intval(0);

				$scroll_back_value = ($scroll_back_to_pos == 'top')?esc_attr('0'):(($scroll_back_to_pos == 'anchor')?esc_attr($id_name):'0');

				$position = self::mobile_view()?$desktop_position:$mobile_position;

				$position = ($template == 'template_22' || $template == 'template_23')?esc_attr('sticky'):$position;

				$auto_hide_time = (isset($sstt_settings['auto_hide']) && (intval($sstt_settings['auto_hide_time']) > 0))?intval($sstt_settings['auto_hide_time']):'';

				$icon_type = esc_attr('default_icon');

				$icon_data = '';

				// Custom Template
				include sstt_dir_path_lite . 'inc/frontend/frontend_structure_file.php' ;
			}
		}
	}
}
}
}