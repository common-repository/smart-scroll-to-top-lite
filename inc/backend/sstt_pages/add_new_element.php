<?php defined('ABSPATH') or die('No scripts for you');
if (current_user_can('manage_options')) {
//parent::print_array($options);
?>
<div class="sstt_main_container">
<?php
	include_once sstt_dir_path_lite . 'inc/header/sstt_header.php';
	// echo do_shortcode("[sstt_shortcode title='Books']This is it[/sstt_shortcode]");
	if (isset($_GET['message']) && $_GET['message'] == 'notAdded') {
		parent::admin_alert_message(esc_attr__('Could not add','smart-scroll-to-top-lite'),'error');
	}
?>	

<div class="sstt_post_box">
		<div class="sstt_main_wrap metabox-holder columns-2" id="post-body">
			<div class="sstt_form_wrapper post-body-content sstt_contains_preview">
				<form method="post" action="<?php echo admin_url('admin-post.php') ?>">
					
					<div class="sstt_name_field_wrap">
						<label><?php esc_attr_e('Element Name','smart-scroll-to-top-lite') ?></label>
						<input type="text" id="sstt_element_name" name="sstt_array[name]">
					</div>
					<input type="hidden" name="action" value="sstt_new_element">
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
						<button class="sstt_button_action sstt_save_button" type="submit"><?php esc_attr_e('Add New','smart-scroll-to-top-lite') ?></button>
						<a href="<?=admin_url('admin.php') ?>?page=smart-scroll-to-top" class="sstt_button_action sstt_cancel_button"><?php esc_attr_e('Cancel','smart-scroll-to-top-lite') ?></a>
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

