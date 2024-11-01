<?php defined('ABSPATH') or die('No scripts for you') ?>
<?php

if (current_user_can('manage_options')) {
	if (isset($_POST['sstt_setting_nonce_field']) && wp_verify_nonce($_POST['sstt_setting_nonce_field'],'sstt_setting_nonce')) {

foreach ($_POST['sstt_setting'] as $key => $value) {
		$$key = $value;
	}

	// parent::print_array($_POST);die();

$option = array(
	'status'					=> isset($status)?boolval($status):boolval(0),
	'mobile'					=> isset($mobile)?boolval($mobile):boolval(0),
	'instance'					=> !empty($instance)?sanitize_text_field($instance):'',
	'choosen_element'			=> (isset($choosen_element) && !empty($choosen_element))?intval($choosen_element):'-1',
	'display_on'				=> !empty($display_on)?sanitize_text_field($display_on):'',
);

$overall_status = update_option('sstt_selected_element',$option);

if ($overall_status) {
	wp_redirect(admin_url('admin.php') . '?page=sstt_setting_lite&message=1');
}
else{
	wp_redirect(admin_url('admin.php') . '?page=sstt_setting_lite&message=0');
}

	}
}