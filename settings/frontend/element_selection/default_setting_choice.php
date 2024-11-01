<?php
defined('ABSPATH') or die('No scripts for you');
if (!empty($selected_element['instance']) && $selected_element['instance'] == 'single_instance') {
	$id = intval($selected_element['choosen_element']);
	array_push($element_id_array, $id);
}
elseif (!empty($selected_element['instance']) && $selected_element['instance'] == 'multiple_instance') {
	if (!empty($selected_element['multiple_instance_type']) && $selected_element['multiple_instance_type'] == 'manually') {
		if (isset($selected_element['multiple_instances']) && !empty($selected_element['multiple_instances'])) {
			foreach ($selected_element['multiple_instances'] as $index => $value) {
				$id = intval($value);
				array_push($element_id_array, $id);
			}
		}
	}
	elseif (!empty($selected_element['multiple_instance_type']) && $selected_element['multiple_instance_type'] == 'smart_scroll_group') {
		$group_id = (isset($selected_element['smart_group_id']) && !empty($selected_element['smart_group_id']))?esc_attr($selected_element['smart_group_id']):esc_attr('none');
		if ($group_id != 'none') {
			if ($groups = get_option('sstt_miscellaneous_setting')) {
				$selected_group = $groups['groups'][$group_id];
				$group_members = maybe_unserialize($selected_group['group_member']);
				// parent::print_array($group_members);
				foreach ($group_members as $index => $elem_id) {
					$id = intval($elem_id);
					array_push($element_id_array, $id);
				}
			}
		}
	}
}
// parent::print_array($element_id_array);