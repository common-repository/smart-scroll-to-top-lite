<?php defined('ABSPATH') or die('No scripts for you') ?>
<div class="sstt_template_selector sstt_<?=$temp_opt['slug'] ?>_option" <?=($temp_opt['slug'] != 'template_1')?("style='display:none;'"):'' ?>>
	<div class="sstt_form_field_wrap">
		<label><?php esc_attr_e('Layout Type','smart-scroll-to-top-lite') ?></label>
		<select name="sstt_array[layout_settings][<?=$temp_opt['slug'] ?>_layout]">
			<?php
			foreach ($temp_opt['layouts'] as $index => $value):
			$layout_index = explode('_', $value);
				?>
				<option value="<?=esc_attr($value) ?>" <?php selected(isset($sstt_settings[esc_attr($temp_opt['slug']) . '_layout'])?$sstt_settings[esc_attr($temp_opt['slug']) . '_layout']:'',$value) ?>><?=esc_attr(ucwords($layout_index[0] . ' ' . (isset($layout_index[1])?$layout_index[1]:''))) ?></option>	
			<?php endforeach ?>
		</select>
	</div>
</div>