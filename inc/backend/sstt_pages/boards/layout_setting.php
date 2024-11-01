<?php defined('ABSPATH') or die('No scripts for you') ?>
<div class="sstt_board_elements sstt_layout_board_tab">
	<label class="sstt_title_label"><?php esc_attr_e('Layout Setting','smart-scroll-to-top-lite') ?></label>
	<div class="sstt_form_field_wrap">
		<label><?php esc_attr_e('Template','smart-scroll-to-top-lite') ?></label>
		<select name="sstt_array[layout_settings][choosen_template]" class="sstt_static_preview_selector sstt_template_exception_cases sstt_template_image_selector sstt_selector_field" id="sstt_template_selector">
			<?php foreach ($options['template_options'] as $index => $temp_opt): ?>
				<option value="<?=esc_attr($temp_opt['slug']) ?>" data-src="<?=esc_url($temp_opt['src']) ?>" <?php selected((isset($sstt_settings['choosen_template'])?esc_attr($sstt_settings['choosen_template']):''),$temp_opt['slug']) ?>><?=esc_attr($temp_opt['name']) ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<?php
	foreach ($options['template_options'] as $index => $temp_opt) {
		include sstt_dir_path_lite . 'inc/backend/sstt_pages/boards/template_variations.php';
	}
	?>
	<div class="sstt_form_field_wrap sstt_button_txt_section" style="display: none;">
		<label><?php esc_attr_e('Button Text','smart-scroll-to-top-lite') ?></label>
		<input type="text" name="sstt_array[layout_settings][button_txt]" value="<?=(isset($sstt_settings['button_txt'])?esc_attr($sstt_settings['button_txt']):'') ?>">
	</div>

	<div class="sstt_position_based_template_settings">
		<div class="sstt_form_field_wrap">
			<label><?php esc_attr_e('Desktop Position','smart-scroll-to-top-lite') ?></label>
			<select name="sstt_array[layout_settings][desktop_position]" id="sstt_desktop_position_selector">
				<?php foreach ($options['layout_options']['desktop_positions'] as $temp): ?>
					<?php $value = explode('_', $temp) ?>
					<option value="<?=esc_attr($temp) ?>" <?php selected((isset($sstt_settings['desktop_position'])?esc_attr($sstt_settings['desktop_position']):''),$temp) ?>><?=ucwords(esc_attr($value[0] . ' ' . $value[1])) ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="sstt_form_field_wrap">
			<label><?php esc_attr_e('Mobile Position','smart-scroll-to-top-lite') ?></label>
			<select name="sstt_array[layout_settings][mobile_position]" id="sstt_mobile_position_selector">
				<?php foreach ($options['layout_options']['mobile_positions'] as $temp): ?>
					<?php $value = explode('_', $temp) ?>
					<option value="<?=esc_attr($temp) ?>" <?php selected((isset($sstt_settings['mobile_position'])?esc_attr($sstt_settings['mobile_position']):''),$temp) ?>><?=ucwords(esc_attr($value[0] . ' ' . $value[1])) ?></option>
				<?php endforeach ?>
			</select>
		</div>
	</div>
</div>