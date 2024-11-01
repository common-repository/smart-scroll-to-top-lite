<?php
defined('ABSPATH') or die('No scripts for you');
$sstt_post_meta_select = $sstt_post_meta[0];
if ($sstt_post_meta_select['choosen_type'] == 1) {
	// Single Instance
	$id = intval($sstt_post_meta_select['single_instance']);
	array_push($element_id_array, $id);
}else{
	// Multiple Instances
	if ($sstt_post_meta_select['multiple_instance_type'] == 'manually') {
		$multiple_instances = $sstt_post_meta_select['multiple_instances'];
		if (is_array($multiple_instances) && !empty($multiple_instances)) {
			foreach ($multiple_instances as $index => $value) {
				$id = intval($value);
				array_push($element_id_array, $id);
			}
		}
	}
	elseif ($sstt_post_meta_select['multiple_instance_type'] == 'smart_scroll_group') {
		$group_id = esc_attr($sstt_post_meta_select['smart_group_id']);
		if ($group_id != 'none') {
			if ($groups = get_option('sstt_miscellaneous_setting')) {
				$selected_group = $groups['groups'][$group_id];
				$group_members = maybe_unserialize($selected_group['group_member']);
				foreach ($group_members as $index => $elem_id) {
					$id = intval($elem_id);
					array_push($element_id_array, $id);
				}
			}
		}
	}
}