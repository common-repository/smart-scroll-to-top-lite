<?php defined('ABSPATH') or die('No scripts for you');

$chevron_classes = array('template_1','template_8','template_19');
$angle_up_classes = array('template_14','template_15');
$arrow_up_classes = array('template_4','template_11','template_18','template_21');
$uparrow_classes = array('template_5','template_20','template_25');
$up_alt_classes = array('template_10','template_24');
$thin_arrow_up_classes = array('template_2','template_6','template_7','template_12','template_13','template_23');
$no_txt_behind = array('template_1','template_2','template_3','template_4','template_5','template_6','template_7','template_8','template_9','template_11','template_12','template_13','template_18');
$txt_before_icon = array('template_11','template_12','template_13');

?>

<?php if (in_array($template, $txt_before_icon)): ?>
	<span class="sstt_button_text_container">
		<span><?=!empty($sstt_settings['button_txt'])?esc_attr($sstt_settings['button_txt']):'' ?></span>
	</span>
<?php endif ?>

<span class="sstt_icon_container">
	<?php if (in_array($template, $chevron_classes)): ?>
		<?php self::ssttGenerateIcons($icon_type , $icon_data , 'fa fa-chevron-up') ?>
		<?php if ($template == 'template_8'): ?>
			<span class="circle">
			    <span>
			        <em></em>
			    </span>
			    <span>
			        <em></em>
			    </span>
			</span>
		<?php endif ?>
	<?php elseif (in_array($template, $arrow_up_classes)) : ?>
		<?php self::ssttGenerateIcons($icon_type , $icon_data , 'icomoon icomoon-arrow-up') ?>
	<?php elseif (in_array($template, $uparrow_classes)) : ?>
		<?php self::ssttGenerateIcons($icon_type , $icon_data , 'genericon genericon-uparrow') ?>
	<?php elseif (in_array($template, $up_alt_classes)) : ?>
		<?php self::ssttGenerateIcons($icon_type , $icon_data , 'ti ti-arrow-up') ?>
	<?php elseif (in_array($template, $thin_arrow_up_classes)) : ?>
		<?php self::ssttGenerateIcons($icon_type , $icon_data , 'ti ti-angle-up') ?>
	<?php elseif ($template == 'template_3') : ?>
		<?php self::ssttGenerateIcons($icon_type , $icon_data , 'icon ico ion-arrow-up-b') ?>
	<?php elseif ($template == 'template_9') : ?>
		<?php self::ssttGenerateIcons($icon_type , $icon_data , 'material-icons' , 'navigation') ?>
	<?php elseif (in_array($template,$angle_up_classes)) : ?>
		<?php self::ssttGenerateIcons($icon_type , $icon_data , 'dashicons dashicons-arrow-up-alt2') ?>
	<?php elseif ($template == 'template_16') : ?>
		<?php self::ssttGenerateIcons($icon_type , $icon_data , 'icon icon-arrow-up2') ?>
	<?php elseif ($template == 'template_22') : ?>
		<?php if ($template_layout == 'hemisphere'): ?>
			<?php self::ssttGenerateIcons($icon_type , $icon_data , 'ti ti-angle-up') ?>
		<?php endif ?>
	<?php endif ?>
</span>

<?php if (!in_array($template, $no_txt_behind)): ?>
	<span class="sstt_button_text_container">
		<span><?=!empty($sstt_settings['button_txt'])?esc_attr($sstt_settings['button_txt']):'' ?></span>
	</span>
<?php endif ?>