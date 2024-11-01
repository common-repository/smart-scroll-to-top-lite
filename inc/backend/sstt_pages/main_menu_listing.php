<?php
defined('ABSPATH') or die('No scripts for you');
if (current_user_can('manage_options')) {
?>
<div class="sstt_main_container">
<?php
include_once sstt_dir_path_lite . 'inc/header/sstt_header.php';
?>

<table class="widefat">
	<thead>
		<tr>
			<th><?php esc_attr_e('Name','smart-scroll-to-top-lite') ?></th>
			<th><?php esc_attr_e('Template','smart-scroll-to-top-lite') ?></th>
			<th><?php esc_attr_e('Layout','smart-scroll-to-top-lite') ?></th>
			<th><?php esc_attr_e('Actions','smart-scroll-to-top-lite') ?></th>
		</tr>
	</thead>
	<tbody>
		<?php if (!empty($sstt_elements)):
		$count = 0;
		?>
			<?php foreach ($sstt_elements as $index => $element_obj):
			$sstt_settings = maybe_unserialize($element_obj->sstt_settings);
			$count++;
			?>
				<tr <?=(($count % 2) != 0)?('class="alternate"'):'' ?>>

					<td><a href="<?=admin_url('admin.php') . '?page=smart-scroll-to-top-lite&edit='. $element_obj->id; ?>" class="sstt_element_name"><?=esc_attr($element_obj->name) ?></a></td>
					<td>
						<span class="sstt_element_template_type"><?php

						if (!empty($sstt_settings['choosen_template'])) {
							$cont_index = explode('_', $sstt_settings['choosen_template']);
							echo ucwords(esc_attr($cont_index[0]) . ' ' . (isset($cont_index[1])?esc_attr($cont_index[1]):'') . ' ' . (isset($cont_index[2])?esc_attr($cont_index[2]):''));
						}
						?></span>
					</td>
					<td>
						<span class="sstt_element_layout_type"><?=ucwords(esc_attr($sstt_settings[esc_attr($sstt_settings['choosen_template']) . '_layout'])) ?></span>
					</td>
					<td>
						<a href="<?=admin_url('admin.php') . '?page=smart-scroll-to-top-lite&edit='. $element_obj->id; ?>" class="sstt_button_action sstt_edit_button"></a>

						<a href="<?=get_home_url() ?>?sstt_preview=<?=$element_obj->id ?>" target="_blank" class="sstt_button_action sstt_preview_button"></a>
					</td>
				</tr>
			<?php endforeach ?>
		<?php else: ?>
			<tr>
				<td>&nbsp;</td>
				<td><?php esc_attr_e('No Elements added so far','smart-scroll-to-top-lite') ?></td>
				<td>&nbsp;</td>
			</tr>
		<?php endif ?>
	</tbody>
	<tfoot>
		<tr>
			<th><?php esc_attr_e('Name','smart-scroll-to-top-lite') ?></th>
			<th><?php esc_attr_e('Template','smart-scroll-to-top-lite') ?></th>
			<th><?php esc_attr_e('Layout','smart-scroll-to-top-lite') ?></th>
			<th><?php esc_attr_e('Actions','smart-scroll-to-top-lite') ?></th>
		</tr>
	</tfoot>
</table>

</div>
<?php
}
?>