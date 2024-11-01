var prev_show_animation = jQuery('#sstt_show_animation').val();
var prev_hide_animation = jQuery('#sstt_hide_animation').val();

jQuery(document).ready(function(){
	
	if (jQuery('#postbox-container-1').hasClass('sstt_preview_area')) {
		ssttDefaultState();

		jQuery('.sstt_live_preview_changer').on('change',function(){

			// Content Type Changer
			ssttContentTypeChanger(jQuery('#sstt_content_type_switch').val());

			// Layout Changer
			ssttLayoutChanger(jQuery('#sstt_layout_select').val());

			if (jQuery('#sstt_animation_selector').prop('checked')) {
				// Hover Effect Changer
				ssttHoverEffectChanger(jQuery('#sstt_hover_animation').val());

				// Content Effect Changer
				ssttContentEffectChanger(jQuery('#sstt_content_animation').val());
			}
			else{
				ssttHoverEffectChanger();
				ssttContentEffectChanger();
			}

		});
	}


});

// When loaded, load the default state
function ssttDefaultState(){
	ssttLayoutChanger(jQuery('#sstt_layout_select').val());
	ssttContentTypeChanger(jQuery('#sstt_content_type_switch').val());
	if (jQuery('#sstt_animation_selector').prop('checked')) {
		ssttHoverEffectChanger(jQuery('#sstt_hover_animation').val());
		ssttContentEffectChanger(jQuery('#sstt_content_animation').val());
	}
}

// Dynamic Functions
function ssttLayoutChanger(type){
	jQuery('#sstt_preview_layout_wrap').removeClass();
	jQuery('#sstt_preview_layout_wrap').addClass('sstt_'+ type);
}

function ssttHoverEffectChanger(hover_class = ''){
	jQuery('#sstt_preview_body').removeClass();
	if (hover_class != '') {
		jQuery('#sstt_preview_body').addClass(hover_class);
	}
}

function ssttContentEffectChanger(change_type = ''){
	jQuery('#sstt_preview_content').removeClass();
	if (change_type != '') {
		jQuery('#sstt_preview_content').addClass('sstt_txt_' + change_type);
	}
}

function ssttContentTypeChanger(content_type){
	if (content_type == 'icon') {
		ssttDefaultIconValue();
		jQuery('#sstt_preview_content #sstt_preview_icon').show();
		jQuery('#sstt_preview_content #sstt_preview_text_inner').hide();
		jQuery('#sstt_preview_text_outer').hide();
	}
	else if(content_type == 'text'){
		jQuery('#sstt_preview_content #sstt_preview_icon').hide();
		jQuery('#sstt_preview_content #sstt_preview_text_inner').show();
		jQuery('#sstt_preview_text_outer').hide();
	}
	else if(content_type == 'icon_with_text'){
		ssttDefaultIconValue();
		jQuery('#sstt_preview_content #sstt_preview_icon').show();
		var text_position = jQuery('#sstt_text_position').val();
		if ( text_position == 'inside_button') {
			jQuery('#sstt_preview_text_outer').hide();
			jQuery('#sstt_preview_content #sstt_preview_text_inner').show();
		}
		else{
			jQuery('#sstt_preview_content #sstt_preview_text_inner').hide();
			jQuery('#sstt_preview_text_outer').show();
			ssttTextPositionChanger(text_position);
		}
	}
}

function ssttTextPositionChanger(text_position){
	jQuery('#sstt_preview_text_outer').removeClass();
	jQuery('#sstt_preview_text_outer').addClass('sstt_external_content');
	jQuery('#sstt_preview_text_outer').addClass('sstt_txt_position_' + text_position);
}

function ssttDefaultIconValue(){
	var icon_value = jQuery('.sstt_content_icon_picker').val();
	var icon_class = icon_value.split('|')[0] + ' ' + ((icon_value.split('|')[1] != undefined)?icon_value.split('|')[1]:'');
	jQuery('#sstt_preview_content #sstt_preview_icon i').removeClass();
	jQuery('#sstt_preview_content #sstt_preview_icon i').addClass(icon_class);
}