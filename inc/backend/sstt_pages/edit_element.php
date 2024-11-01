<?php
defined('ABSPATH') or die('No scripts for you');
if (current_user_can('manage_options')) {
?>
<div class="sstt_main_container">
<?php
	include_once sstt_dir_path_lite . 'inc/header/sstt_header.php';
?>	
	<?php if (isset($_GET['message']) && $_GET['message'] == 'added'): ?>
		<?php parent::admin_alert_message(esc_attr__('Added Successfully','smart-scroll-to-top-lite'),'success') ?>
	<?php elseif(isset($_GET['message']) && $_GET['message'] == 'edited') : ?>
		<?php parent::admin_alert_message(esc_attr__('Edit Successful','smart-scroll-to-top-lite'),'success') ?>
	<?php elseif(isset($_GET['message']) && $_GET['message'] == 'notEdited') : ?>
		<?php parent::admin_alert_message(esc_attr__('Edit Not Successful','smart-scroll-to-top-lite'),'error') ?>
	<?php endif ?>

	<div class="sstt_post_box">
		<div class="sstt_main_wrap metabox-holder columns-2" id="post-body">
			<div class="sstt_form_wrapper post-body-content sstt_contains_preview">
				

				<form method="post" action="<?php echo admin_url('admin-post.php') ?>" id="sstt_element_form">
					
					<div class="sstt_name_field_wrap">
						<label><?php esc_attr_e('Element Name','smart-scroll-to-top-lite') ?></label>
						<input type="text" id="sstt_element_name" name="sstt_array[name]" value="<?=(!empty($sstt_element->name)?esc_attr($sstt_element->name):'') ?>">
					</div>
					<input type="hidden" name="action" value="sstt_new_element">
					<input type="hidden" name="id" value="<?=intval($sstt_element->id) ?>">
					<?php wp_nonce_field('sstt_new_element_nonce','sstt_new_element_nonce_field') ?>

					<div class="sstt_navigation_panel">
						<ul class="sstt_nav_wrap nav-tab-wrapper">
							<a href="javascript:void()" class="sstt_nav_item nav-tab nav-tab-active" id="sstt_layout_board"><li><?php esc_attr_e('Layout Setting','smart-scroll-to-top-lite') ?></li></a>
							<a href="javascript:void()" class="sstt_nav_item nav-tab" id="sstt_action_board"><li><?php esc_attr_e('Action Setting','smart-scroll-to-top-lite') ?></li></a>
						</ul>
					</div>

					<div class="sstt_form_board_wrap">
						<?php
						include_once sstt_dir_path_lite . 'inc/backend/sstt_pages/boards/layout_setting.php';
						include_once sstt_dir_path_lite . 'inc/backend/sstt_pages/boards/action_setting.php';
						?>
					</div>
					<div class="sstt_buttons_wrap">
						<button class="sstt_button_action sstt_save_button" type="submit"><?php esc_attr_e('Save Setting','smart-scroll-to-top-lite') ?></button>
						<a href="<?=get_home_url() ?>?sstt_preview=<?=$sstt_element->id ?>" class="sstt_button_action sstt_preview_next" target="_blank"><?php esc_attr_e('Preview','smart-scroll-to-top-lite') ?></a>
						<a href="<?=admin_url('admin.php') ?>?page=smart-scroll-to-top" class="sstt_button_action sstt_cancel_button"><?php esc_attr_e('Discard Changes','smart-scroll-to-top-lite') ?></a>
					</div>
				</form>
			</div>
			<div class="sstt_preview_area postbox-container" id="postbox-container-1">
				<div class="meta-box-sortables">
					<div class="postbox">
						<h2><span><?php esc_attr_e('Template Preview','smart-scroll-to-top-lite') ?></span></h2>
						<div class="inside">
							<div class="sstt_template_preview">
								<img src="<?=(sstt_images . 'template_images/template 1.PNG') ?>" class="sstt_static_preview_image">
							</div>
						</div>
						<!-- .inside -->
					</div>
					<!-- .postbox -->
				</div>
				<!-- .meta-box-sortables -->
			</div>
		</div>
	</div>
</div>
<?php
}
?>