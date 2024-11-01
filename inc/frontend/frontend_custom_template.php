<?php defined('ABSPATH') or die('No scripts for you') ?>
<?php
	if (isset($template_details['box_shadow_status'])) {
		$x_offset = !empty($template_details['box_shadow_x_offset'])?intval($template_details['box_shadow_x_offset']):0;
		$y_offset = !empty($template_details['box_shadow_y_offset'])?intval($template_details['box_shadow_y_offset']):0;
		$shadow_blur = !empty($template_details['box_shadow_blur'])?intval($template_details['box_shadow_blur']):0;
		$shadow_color = !empty($template_details['box_shadow_color'])?esc_attr($template_details['box_shadow_color']):'black';
		$shadow_inset = !empty($template_details['box_shadow_inset'])?'inset':'';
	}
	if (isset($template_details['box_shadow_hover_status'])) {
		$hover_x_offset = !empty($template_details['box_shadow_hover_x_offset'])?intval($template_details['box_shadow_hover_x_offset']):0;
		$hover_y_offset = !empty($template_details['box_shadow_hover_y_offset'])?intval($template_details['box_shadow_hover_y_offset']):0;
		$hover_shadow_blur = !empty($template_details['box_shadow_hover_blur'])?intval($template_details['box_shadow_hover_blur']):0;
		$hover_shadow_color = !empty($template_details['box_shadow_hover_color'])?esc_attr($template_details['box_shadow_hover_color']):'black';
		$hover_shadow_inset = !empty($template_details['box_shadow_hover_inset'])?'inset':'';
	}
	if (isset($template_details['border_status'])) {
		$border_width = !empty($template_details['border_width'])?intval($template_details['border_width']):0;
		$border_style = !empty($template_details['border_style'])?esc_attr($template_details['border_style']):'solid';
		$border_color = !empty($template_details['border_color'])?esc_attr($template_details['border_color']):'black';
	}
	if (isset($template_details['hover_border_status'])) {
		$hover_border_width = !empty($template_details['hover_border_width'])?intval($template_details['hover_border_width']):0;
		$hover_border_style = !empty($template_details['hover_border_style'])?esc_attr($template_details['hover_border_style']):'solid';
		$hover_border_color = !empty($template_details['hover_border_color'])?esc_attr($template_details['hover_border_color']):'black';
	}
?>
<style type="text/css">

	/* Icon and text styling */
	.sstt_main_display_wrap.sstt_template_<?=$template ?> span.sstt_icon_container i,
	.sstt_main_display_wrap.sstt_template_<?=$template ?> span.sstt_button_text_container span{
		<?=(!empty($template_details['content_color'])?('color: ' . esc_attr($template_details['content_color']) . ';'):'') ?>
	}
	.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover span.sstt_icon_container i,
	.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover span.sstt_button_text_container span{
		<?=(!empty($template_details['hover_color'])?('color: ' . esc_attr($template_details['hover_color']) . ';'):'') ?>
	}

	/* Box-shadow Styling */
	<?php if ($template == 'template_4'): ?>
		<?php if (isset($template_details['box_shadow_status'])): ?>
			.sstt_main_display_wrap.sstt_template_<?=$template ?>:after{
				<?=(isset($template_details['box_shadow_status'])?('box-shadow: ' . $shadow_inset . ' ' . $x_offset . 'px ' . $y_offset . 'px ' . $shadow_blur . 'px ' . $shadow_color . ';'):'') ?>
			}
		<?php endif ?>
		<?php if (isset($template_details['box_shadow_hover_status'])): ?>
			.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover:after{
				<?=(isset($template_details['box_shadow_hover_status'])?('box-shadow: ' . $hover_shadow_inset . ' ' . $hover_x_offset . 'px ' . $hover_y_offset . 'px ' . $hover_shadow_blur . 'px ' . $hover_shadow_color . ';'):'') ?>
			}
		<?php endif ?>
	<?php elseif ($template == 'template_8') : ?>
		<?php if (isset($template_details['box_shadow_status'])): ?>
			.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_icon_container .circle{
				<?=(isset($template_details['box_shadow_status'])?('box-shadow: ' . $shadow_inset . ' ' . $x_offset . 'px ' . $y_offset . 'px ' . $shadow_blur . 'px ' . $shadow_color . ';'):'') ?>
			}
		<?php endif ?>
		<?php if (isset($template_details['box_shadow_hover_status'])): ?>
			.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_icon_container:hover .circle{
				<?=(isset($template_details['box_shadow_hover_status'])?('box-shadow: ' . $hover_shadow_inset . ' ' . $hover_x_offset . 'px ' . $hover_y_offset . 'px ' . $hover_shadow_blur . 'px ' . $hover_shadow_color . ';'):'') ?>
			}
		<?php endif ?>
	<?php elseif ($template == 'template_9') : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:before{
			<?=(isset($template_details['box_shadow_status'])?('box-shadow: ' . $shadow_inset . ' ' . $x_offset . 'px ' . $y_offset . 'px ' . $shadow_blur . 'px ' . $shadow_color . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover:before{
			<?=(isset($template_details['box_shadow_hover_status'])?('box-shadow: ' . $hover_shadow_inset . ' ' . $hover_x_offset . 'px ' . $hover_y_offset . 'px ' . $hover_shadow_blur . 'px ' . $hover_shadow_color . ';'):'') ?>
		}
	<?php elseif ($template == 'template_17') : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:after,
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:before{
			<?=(isset($template_details['box_shadow_status'])?('box-shadow: ' . $shadow_inset . ' ' . $x_offset . 'px ' . $y_offset . 'px ' . $shadow_blur . 'px ' . $shadow_color . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover:after,
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover:before{
			<?=(isset($template_details['box_shadow_hover_status'])?('box-shadow: ' . $hover_shadow_inset . ' ' . $hover_x_offset . 'px ' . $hover_y_offset . 'px ' . $hover_shadow_blur . 'px ' . $hover_shadow_color . ';'):'') ?>
		}
	<?php elseif (($template == 'template_22') || ($template == 'template_23')) : ?>
		<?php if (isset($template_details['box_shadow_status'])): ?>
			.sstt_main_display_wrap.sstt_template_<?=$template ?>,
			.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_icon_container:after{
				<?=(isset($template_details['box_shadow_status'])?('box-shadow: ' . $shadow_inset . ' ' . $x_offset . 'px ' . $y_offset . 'px ' . $shadow_blur . 'px ' . $shadow_color . ';'):'') ?>
				<?=('z-index: -1;') ?>
			}
		<?php endif ?>
		<?php if (isset($template_details['box_shadow_hover_status'])): ?>
			.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover,
			.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover .sstt_icon_container:after{
				<?=(isset($template_details['box_shadow_hover_status'])?('box-shadow: ' . $hover_shadow_inset . ' ' . $hover_x_offset . 'px ' . $hover_y_offset . 'px ' . $hover_shadow_blur . 'px ' . $hover_shadow_color . ';'):'') ?>
			}
		<?php endif ?>
	<?php elseif (($template == 'template_24') || ($template == 'template_25')) : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_icon_container,
		.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_button_text_container{
			<?=(isset($template_details['box_shadow_status'])?('box-shadow: ' . $shadow_inset . ' ' . $x_offset . 'px ' . $y_offset . 'px ' . $shadow_blur . 'px ' . $shadow_color . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover .sstt_content_div .sstt_icon_container,
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover .sstt_content_div .sstt_button_text_container{
			<?=(isset($template_details['box_shadow_hover_status'])?('box-shadow: ' . $hover_shadow_inset . ' ' . $hover_x_offset . 'px ' . $hover_y_offset . 'px ' . $hover_shadow_blur . 'px ' . $hover_shadow_color . ';'):'') ?>
		}
	<?php else: ?>
		<?php if (isset($template_details['box_shadow_status'])): ?>
			.sstt_main_display_wrap.sstt_template_<?=$template ?>{
				<?=(isset($template_details['box_shadow_status'])?('box-shadow: ' . $shadow_inset . ' ' . $x_offset . 'px ' . $y_offset . 'px ' . $shadow_blur . 'px ' . $shadow_color . ';'):'') ?>
			}
		<?php endif ?>
		<?php if (isset($template_details['box_shadow_hover_status'])): ?>
			.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover{
				<?=(isset($template_details['box_shadow_hover_status'])?('box-shadow: ' . $hover_shadow_inset . ' ' . $hover_x_offset . 'px ' . $hover_y_offset . 'px ' . $hover_shadow_blur . 'px ' . $hover_shadow_color . ';'):'') ?>
			}
		<?php endif ?>
	<?php endif ?>

	<?php if ($template == 'template_1'): ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?>{
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';'):'') ?>
			<?=(isset($template_details['box_shadow_status'])?('box-shadow: ' . $shadow_inset . ' ' . $x_offset . 'px ' . $y_offset . 'px ' . $shadow_blur . 'px ' . $shadow_color . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover{
			<?=(!empty($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';'):'') ?>
		}
	<?php elseif ($template == 'template_2') : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:after{
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:before{
			<?=(isset($template_details['border_status'])?('border: ' . esc_attr($border_width). 'px ' . esc_attr($border_style). ' ' . esc_attr($border_color) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover:before{
			<?=(isset($template_details['hover_border_status'])?('border: ' . esc_attr($hover_border_width). 'px ' . esc_attr($hover_border_style). ' ' . esc_attr($hover_border_color) . ';'):'') ?>
		}
	<?php elseif ($template == 'template_3') :; ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?>{
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';'):'') ?>
		}
		<?php if ($icon_type == 'default_icon'): ?>
			.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_icon_container:before,
			.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_icon_container:after,
			.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_icon_container i:after{
				<?=(!empty($template_details['content_color'])?('background: ' . esc_attr($template_details['content_color']) . ';'):'') ?>
			}
			.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover .sstt_icon_container:before,
			.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover .sstt_icon_container:after,
			.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover .sstt_icon_container i:after{
				<?=(!empty($template_details['hover_color'])?('background: ' . esc_attr($template_details['hover_color']) . ';'):'') ?>
			}
		<?php else: ?>
			.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_icon_container:before,
			.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_icon_container:after,
			.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_icon_container i:after{
				display: none;
			}
		<?php endif ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover{
			<?=(!empty($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:before{
			<?=(isset($template_details['hover_border_status'])?('box-shadow: ' . esc_attr('0 0 0 ' . $hover_border_width . 'px ' . $hover_border_color) . ';'):'') ?>
		}
	<?php elseif ($template == 'template_4') : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:after{
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover:after{
			<?=(!empty($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>{
			<?=(isset($template_details['border_status'])?('box-shadow: ' . esc_attr('0 0 0 ' . $border_width . 'px ' . $border_color . ';')):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover{
			<?=(isset($template_details['hover_border_status'])?('box-shadow: ' . esc_attr('0 0 0 ' . $hover_border_width . 'px ' . $hover_border_color . ';')):'') ?>
		}
	<?php elseif ($template == 'template_5') : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?>{
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';'):'') ?>
			<?=(isset($template_details['border_status'])?('border: ' . esc_attr($border_width . 'px ' . $border_style . ' ' . $border_color . ';')):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover{
			<?=(isset($template_details['hover_border_status'])?('border: ' . esc_attr($hover_border_width . 'px ' . $hover_border_style . ' ' . $hover_border_color . ';')):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:before{
			<?=(isset($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';'):'') ?>
		}
	<?php elseif ($template == 'template_6') : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:before{
			<?=(isset($template_details['border_status'])?('box-shadow: ' . esc_attr('inset 0 0 0 ' . $border_width . 'px ' . $border_color . ';')):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover:before{
			<?=(!empty($template_details['hover_bg'])?('box-shadow: ' . esc_attr('inset 0 0 0 35px ' . $template_details['hover_bg'] . ';')):'') ?>
		}
	<?php elseif ($template == 'template_7') : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:before{
			<?=(!empty($template_details['bg_color'])?('box-shadow: ' . esc_attr('inset 0 0 0 35px ' . $template_details['bg_color'] . ';')):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover:before{
			<?=(isset($template_details['hover_border_status'])?('box-shadow: ' . esc_attr('inset 0 0 0 ' . $hover_border_width . 'px ' . $hover_border_color . ';')):'') ?>
		}
	<?php elseif ($template == 'template_8') : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?>.sstt_layout_circular .sstt_icon_container:hover .circle span em{
			<?=(isset($template_details['hover_border_status'])?('background: ' . esc_attr($hover_border_color) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>.sstt_layout_circular .sstt_icon_container .circle span em{
			<?=(isset($template_details['border_status'])?('background: ' . esc_attr($border_color) . ';'):'') ?>
		}
	<?php elseif ($template == 'template_9') : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:before{
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover:after,
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:active:after{
			<?=(!empty($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:after{
			<?=(isset($template_details['border_status'])?('border: ' . esc_attr($border_width . 'px ' . $border_style . ' ' . $border_color) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover:after{
			<?=(isset($template_details['hover_border_status'])?('border: ' . esc_attr($hover_border_width . 'px ' . $hover_border_style . ' ' . $hover_border_color) . ';'):'') ?>
		}
	<?php elseif ($template == 'template_10') : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div{
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div:after{
			<?=(!empty($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div:before{
			<?=(!empty($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';opacity: 0.5;'):'') ?>
		}
	<?php elseif ($template == 'template_11') : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div:after{
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_template_11 .sstt_content_div:hover{
			<?=(!empty($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_icon_container i{
			<?=(!empty($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover .sstt_icon_container i{
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';'):'') ?>
		}
	<?php elseif ($template == 'template_12') : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div:after{
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div{
			<?=(!empty($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div{
			<?=(isset($template_details['border_status'])?('border: ' . $border_width . 'px ' . $border_style . ' ' . $border_color . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover .sstt_content_div{
			<?=(isset($template_details['hover_border_status'])?('border: ' . $hover_border_width . 'px ' . $hover_border_style . ' ' . $hover_border_color . ';'):'') ?>
		}
	<?php elseif ($template == 'template_13') : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div:after{
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div:hover:after{
			<?=(!empty($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div:before{
			<?=(isset($template_details['hover_border_status'])?('background: ' . esc_attr($hover_border_color) . ';'):'') ?>
		}
	<?php elseif ($template == 'template_14') : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?>{
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';'):'') ?>
			<?=(isset($template_details['border_status'])?('border: ' . esc_attr($border_width . 'px ' . $border_style . ' ' . $border_color) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover{
			<?=(!empty($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';'):'') ?>
			<?=(isset($template_details['hover_border_status'])?('border: ' . esc_attr($hover_border_width . 'px ' . $hover_border_style . ' ' . $hover_border_color) . ';'):'') ?>
		}
	<?php elseif ($template == 'template_15') : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:after{
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover:after{
			<?=(!empty($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';'):'') ?>
		}
	<?php elseif ($template == 'template_16') : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?>{
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover{
			<?=(!empty($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';'):'') ?>
		}
	<?php elseif ($template == 'template_17') : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:before{
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';opacity: 0.5;'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover:before{
			<?=(!empty($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';opacity: 0.5;'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:after{
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';opacity: 0.2;'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover:after{
			<?=(!empty($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';opacity: 0.2;'):'') ?>
		}
	<?php elseif ($template == 'template_22') : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?>,
		.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_icon_container:after{
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover,
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover .sstt_icon_container:after{
			<?=(!empty($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';'):'') ?>
		}
	<?php elseif ($template == 'template_23') : ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?>,
		.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_icon_container:after{
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover,
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover .sstt_icon_container:after{
			<?=(!empty($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';'):'') ?>
		}
	<?php elseif ($template == 'template_24') : ?>
		.sstt_position_middle_left .sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_icon_container,
		.sstt_position_top_left .sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_icon_container,
		.sstt_position_bottom_left .sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_icon_container,
		.sstt_position_middle_right .sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_icon_container,
		.sstt_position_top_right .sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_icon_container,
		.sstt_position_bottom_right .sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_icon_container,
		.sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div{
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover .sstt_content_div .sstt_icon_container,
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover .sstt_content_div{
			<?=(!empty($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';'):'') ?>
		}
	<?php elseif ($template == 'template_25') : ?>
		.sstt_position_middle_left .sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_icon_container,
		.sstt_position_top_left .sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_icon_container,
		.sstt_position_bottom_left .sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_icon_container,
		.sstt_position_middle_right .sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_icon_container,
		.sstt_position_top_right .sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_icon_container,
		.sstt_position_bottom_right .sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_icon_container{
			<?=(isset($template_details['border_status'])?('border: ' . esc_attr($border_width . 'px ' . $border_style . ' ' . $border_color) . ';'):'') ?>
			<?=(!empty($template_details['bg_color'])?('background: ' . esc_attr($template_details['bg_color']) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_<?=$template ?>:hover .sstt_content_div .sstt_icon_container{
			<?=(isset($template_details['hover_border_status'])?('border: ' . esc_attr($hover_border_width . 'px ' . $hover_border_style . ' ' . $hover_border_color) . ';'):'') ?>
			<?=(!empty($template_details['hover_bg'])?('background: ' . esc_attr($template_details['hover_bg']) . ';'):'') ?>
		}
		.sstt_position_middle_left .sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_button_text_container,
		.sstt_position_top_left .sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_button_text_container,
		.sstt_position_bottom_left .sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_button_text_container,
		.sstt_position_middle_right .sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_button_text_container,
		.sstt_position_top_right .sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_button_text_container,
		.sstt_position_bottom_right .sstt_main_display_wrap.sstt_template_<?=$template ?> .sstt_content_div .sstt_button_text_container{
			<?=(isset($template_details['border_status'])?('background: ' . esc_attr($border_color) . ';'):'') ?>
		}
		.sstt_main_display_wrap.sstt_template_template_25:hover .sstt_content_div .sstt_button_text_container{
			<?=(isset($template_details['hover_border_status'])?('background: ' . esc_attr($hover_border_color) . ';'):'') ?>
		}
	<?php endif ?>

	<?php if ($icon_type == 'available_icons'): ?>
		.sstt_main_display_wrap.sstt_template_<?=$template ?> span.sstt_icon_container i.sstt_available_icon:before{
			margin-left: 0px;
		}
	<?php endif ?>

	.sstt_main_display_wrap.sstt_template_<?=$template ?> span.sstt_button_text_container span{
		<?=(isset($template_details['font_family'])?('font-family: ' . esc_attr($template_details['font_family']) . ';'):'') ?>
	}

</style>