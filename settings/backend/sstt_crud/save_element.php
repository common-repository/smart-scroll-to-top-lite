<?php defined('ABSPATH') or die('No scripts for you') ?>
<?php
if (current_user_can('manage_options')) {
	if (isset($_POST['sstt_new_element_nonce_field']) && wp_verify_nonce($_POST['sstt_new_element_nonce_field'],'sstt_new_element_nonce')) {

	global $wpdb;
	$table_name = sstt_element_table;
	$name = '';
	$data = array();
	foreach ($_POST['sstt_array'] as $tab_index => $tab_index_array) {
		if (is_array($tab_index_array)) {
			foreach ($tab_index_array as $value) {
			$key = key($tab_index_array);
			$data[$key] = sanitize_text_field($value);
			next($tab_index_array);
			}
		}
		else{
			$name = $tab_index_array;
		}
	}

	parent::print_array($data);
	// die();

	// For checking the only rows in the table
	$count_query = "SELECT count(*) FROM $table_name";
	$num = intval($wpdb->get_var($count_query));

if (isset($_POST['id'])) {
// Edit existing settings
	$id = intval($_POST['id']);
	$status = $wpdb->update(
		$table_name,
		array(
			'name'			=> esc_attr($name),
			'sstt_settings'	=> maybe_serialize($data)
		),
		array('id'			=> $id),
		array(
			'%s',
			'%s'
		),
		array('%d')
	);

	if (false === $status) {
		wp_redirect(admin_url('admin.php') . '?page=smart-scroll-to-top-lite&edit='.$id.'&message=notEdited');
	}
	else{
		wp_redirect(admin_url('admin.php') . '?page=smart-scroll-to-top-lite&edit='.$id.'&message=edited');
	}
}
else{
// Add New Settings
	$status = $wpdb->insert(
		$table_name,
		array(
			'name'			=> esc_attr($name),
			'sstt_settings'	=> maybe_serialize($data)
		),
		array(
			'%s',
			'%s'
		)
	);
	$id = $wpdb->insert_id;

	if ($num == 0) {
		$option = array(
		'status'			=> boolval(1),
		'mobile'			=> boolval(1),
		'choosen_element'	=> $id,
		'display_on'		=> esc_attr('home_page'),
		'specific_page'		=> '-1',
		'specific_term'		=> '-1'
	);

	$overall_status = update_option('sstt_selected_element',$option);
	}

	if ($status) {
		wp_redirect(admin_url('admin.php') . '?page=smart-scroll-to-top-lite&edit='.$id.'&message=added');
	}
	else{
		wp_redirect(admin_url('admin.php') . '?page=add_new_sstt_lite&message=notAdded');
	}
}


	}
}