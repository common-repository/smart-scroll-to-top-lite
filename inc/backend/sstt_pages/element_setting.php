<?php
defined('ABSPATH') or die('No scripts for you');
if (current_user_can('manage_options')) {
$options = get_option('sstt_general_options_lite');
?>
<div class="sstt_main_container">
	<?php 
		include_once sstt_dir_path_lite . 'inc/header/sstt_header.php';
		if (isset($_GET['message']) && $_GET['message'] == 1){
	 		parent::admin_alert_message(esc_attr__('Successful','smart-scroll-to-top-lite'),'success');
		}
	 ?><div class="sstt_form_wrapper">
	 	<form method="post" action="<?=admin_url('admin-post.php') ?>">
	 		<label class="sstt_title_label"><?php esc_attr_e('General Setting','smart-scroll-to-top-lite') ?></label>
	 		<input type="hidden" name="action" value="sstt_save_main_setting">
	 		<?php wp_nonce_field('sstt_setting_nonce','sstt_setting_nonce_field') ?>
	 		<div class="sstt_form_field_wrap">
	 			<label><?php esc_attr_e('Enable/Disable','smart-scroll-to-top-lite') ?></label>
	 			<div class="sstt_checkbox_wrap">
		 			<input type="checkbox" id="sstt_status_box" name="sstt_setting[status]" value="1" <?php checked((isset($sstt_setting['status'])?boolval($sstt_setting['status']):boolval(0)),1) ?>>
		 			<label for="sstt_status_box"></label>
	 			</div>
	 		</div>
	 		<div class="sstt_form_field_wrap">
	 			<label><?php esc_attr_e('Mobile Mode','smart-scroll-to-top-lite') ?></label>
	 			<div class="sstt_checkbox_wrap">
		 			<input type="checkbox" id="sstt_mobile_status_box" name="sstt_setting[mobile]" value="1" <?php checked((isset($sstt_setting['mobile'])?boolval($sstt_setting['mobile']):boolval(0)),1) ?>>
		 			<label for="sstt_mobile_status_box"></label>
	 			</div>
	 		</div>
	 		<div class="sstt_form_field_wrap">
	 			<label><?php esc_attr_e('Choose from','smart-scroll-to-top-lite') ?></label>
	 			<select name="sstt_setting[instance]" class="sstt_selector_field" id="sstt_button_instance_selector">
	 				<?php foreach ($options['instance_type'] as $index => $value):
	 					$inst_index = explode('_', $value);
	 					?>
	 					<option value="<?=esc_attr($value) ?>" <?php selected((isset($sstt_setting['instance'])?esc_attr($sstt_setting['instance']):''),$value) ?>><?=esc_attr(ucwords($inst_index[0] . ' ' . $inst_index[1])) ?></option>
	 				<?php endforeach ?>
	 			</select>
	 		</div>
	 		<div class="sstt_button_instance_selector sstt_single_instance_option" style="display: none;">
		 		<div class="sstt_form_field_wrap">
		 			<label><?php esc_attr_e('Choose Default Element','smart-scroll-to-top-lite') ?></label>
		 			<?php if (!empty($sstt_elements)): ?>
		 				<select name="sstt_setting[choosen_element]">
			 				<?php foreach ($sstt_elements as $index => $element_obj): ?>
			 					<option value="<?=intval($element_obj->id) ?>" <?php selected((isset($sstt_setting['choosen_element'])?intval($sstt_setting['choosen_element']):''),$element_obj->id) ?>><?=esc_attr($element_obj->name) ?></option>
			 				<?php endforeach ?>
		 				</select>
		 			<?php else: ?>
		 				<span><?php esc_attr_e('No Elements added so far','smart-scroll-to-top-lite') ?></span>
		 			<?php endif ?>
		 		</div>
	 		</div>
	 		<div class="sstt_form_field_wrap">
	 			<label><?php esc_attr_e('Display On','smart-scroll-to-top-lite') ?></label>
	 			<select name="sstt_setting[display_on]" class="sstt_selector_field" id="sstt_specific_page_selector">
	 				<?php foreach ($options['display_on'] as $index => $value): ?>
	 					<?php $s_name = explode('_', $value) ?>
	 					<option value="<?=esc_attr($value) ?>" <?php selected((isset($sstt_setting['display_on'])?esc_attr($sstt_setting['display_on']):''),$value) ?>><?=ucwords(esc_attr($s_name[0] . ' ' . $s_name[1])) ?></option>
	 				<?php endforeach ?>
	 			</select>
	 		</div>
	 		<div class="sstt_specific_page_selector sstt_specific_pages_option" style="display: none;">
	 			<?php include_once sstt_dir_path_lite . 'inc/backend/sstt_pages/specific_pages_selector/sstt_setting_inner_page.php'; ?>
	 		</div>
	 		<div class="sstt_buttons_wrap">
		 		<button class="sstt_button_action sstt_save_button" type="submit"><?php esc_attr_e('Save Setting','smart-scroll-to-top-lite') ?></button>
	 		</div>
	 	</form>
	 </div>
</div>
<?php
}
?>