<?php defined('ABSPATH') or die('No scripts for you') ?>
<div class="sstt_board_elements sstt_action_board_tab" style="display: none;">
	<label class="sstt_title_label"><?php esc_attr_e('Action Setting','smart-scroll-to-top-lite') ?></label>
	<div class="sstt_form_field_wrap">
		<label><?php esc_attr_e('Scroll Offset From','smart-scroll-to-top-lite') ?></label>
		<select name="sstt_array[action_settings][scroll_offset_type]" class="sstt_selector_field" id="sstt_scroll_offset_selector">
			<?php foreach ($options['display_options']['trigger_offset_type'] as $value):
				$offset_index = explode('_', $value);
				?>
				<option value="<?=esc_attr($value) ?>" <?php selected((isset($sstt_settings['scroll_offset_type'])?esc_attr($sstt_settings['scroll_offset_type']):''),$value) ?>><?=esc_attr(ucwords($offset_index[0] . ' ' . (isset($offset_index[1])?esc_attr($offset_index[1]):''))) ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="sstt_form_field_wrap sstt_scroll_offset_selector sstt_pixels_option">
		<label><?php esc_attr_e('Pixels','smart-scroll-to-top-lite') ?></label>
		<input type="number" class="sstt_input_field" name="sstt_array[action_settings][offset_pixel]" value="<?=isset($sstt_settings['offset_pixel'])?intval($sstt_settings['offset_pixel']):intval(0) ?>">
	</div>
	<div class="sstt_form_field_wrap sstt_scroll_offset_selector sstt_percentage_option" style="display: none;">
		<label><?php esc_attr_e('Percentage','smart-scroll-to-top-lite') ?></label>
		<input type="number" class="sstt_input_field" name="sstt_array[action_settings][offset_percentage]" min="0" max="100" step=".5" value="<?=isset($sstt_settings['offset_percentage'])?floatval($sstt_settings['offset_percentage']):intval(0) ?>"><span class="sstt_after_input"></span>
	</div>
	<div class="sstt_form_field_wrap">
		<label><?php esc_attr_e('Scroll Speed','smart-scroll-to-top-lite') ?></label>
		<input type="number" name="sstt_array[action_settings][scroll_speed]" min="0" value="<?=isset($sstt_settings['scroll_speed'])?intval($sstt_settings['scroll_speed']):intval(1000) ?>"><span class="sstt_after_input"><?php esc_attr_e('ms','smart-scroll-to-top-lite') ?></span>
	</div>
	<div class="sstt_form_field_wrap">
		<label><?php esc_attr_e('Auto Hide','smart-scroll-to-top-lite') ?></label>
		<div class="sstt_checkbox_wrap">
			<input id="sstt_auto_hide_selector" type="checkbox" name="sstt_array[action_settings][auto_hide]" class="sstt_bulb_switch" value="1" <?php checked((isset($sstt_settings['auto_hide'])?boolval($sstt_settings['auto_hide']):boolval(0)),1) ?>>
			<label for="sstt_auto_hide_selector"></label>
		</div>
	</div>
	<div class="sstt_light_bulb" style="display: none;">
		<div class="sstt_form_field_wrap">
			<label><?php esc_attr_e('Auto Hide Time','smart-scroll-to-top-lite') ?></label>
			<input type="number" name="sstt_array[action_settings][auto_hide_time]" min="0" max="60" step=".2" value="<?=isset($sstt_settings['auto_hide_time'])?floatval($sstt_settings['auto_hide_time']):'' ?>">
		</div>
	</div>
	<div class="sstt_form_field_wrap">
		<label><?php esc_attr_e('Scroll Back To Position','smart-scroll-to-top-lite') ?></label>
		<select name="sstt_array[action_settings][scroll_back_to_pos]" class="sstt_selector_field" id="sstt_back_to_selector">
			<?php foreach ($options['display_options']['scroll_back_position'] as $value): ?>
				<option value="<?=esc_attr($value) ?>" <?php selected((isset($sstt_settings['scroll_back_to_pos'])?esc_attr($sstt_settings['scroll_back_to_pos']):''),$value) ?>><?=ucwords(esc_attr($value)) ?></option>
			<?php endforeach ?>
		</select>
	</div>
</div>