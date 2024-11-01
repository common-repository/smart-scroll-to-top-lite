<?php defined('ABSPATH') or die('No scripts for you') ?>
<div class="sstt_whole_div_wrap sstt_position_<?=$position ?>" id="sstt_element_<?=$id?>">

	<div class="sstt_main_display_wrap sstt_template_<?=$template ?> <?=!empty($template_layout)?esc_attr('sstt_layout_' . $template_layout):'' ?> <?=isset($sstt_settings['custom_template'])?esc_attr($hover_animation):'' ?>"

		data-offset="<?=$offset_type ?>:<?=$offset_value ?>"
		data-speed="<?=$scroll_speed ?>"
		data-dest="<?=$scroll_back_to_pos ?>_<?=$scroll_back_value ?>"
		data-hide="<?=($auto_hide == 'true')?$auto_hide_time:'no' ?>"
		data-entry="<?=isset($sstt_settings['custom_template'])?esc_attr($show_animation):'none' ?>"
		data-exit="<?=isset($sstt_settings['custom_template'])?esc_attr($hide_animation):'none' ?>"
		>

		<?php
		// For templates 18 19 20 21
		$intermediate_layer_array = array('template_18','template_19','template_20','template_21');
		if (in_array($template, $intermediate_layer_array)): ?>
			<span class="sstt_intermediate_layer">
				<span class="sstt_extra_layer">
				</span>
			<?php endif ?>

		<span class="sstt_content_div">

			<?php
			// For templates 18 19 20 21
			if (in_array($template, $intermediate_layer_array)): ?>
				<span class="sstt_inner_layer_1">

					<span class="sstt_inner_layer_2">

						<span class="sstt_inner_layer_3">
			<?php endif ?>

					<?php include sstt_dir_path_lite . 'inc/frontend/frontend_content_file.php'; ?>

			<?php
			// For templates 18 19 20 21
			if (in_array($template, $intermediate_layer_array)): ?>
						</span>
					</span>
				</span>
			<?php endif ?>


		</span>

		<?php
			// For templates 18 19 20 21
			if (in_array($template, $intermediate_layer_array)): ?>
			</span>
		<?php endif ?>


	</div>
		
</div>