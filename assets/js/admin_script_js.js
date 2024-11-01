jQuery(document).ready(function(){

	jQuery('.sstt_nav_wrap a.sstt_nav_item').on('click',function(e){
		var selection = jQuery(this).attr('id');
		jQuery( '.sstt_form_board_wrap .sstt_board_elements' ).hide();
		jQuery( '.sstt_form_board_wrap .' + selection + '_tab' ).show();
		jQuery('.sstt_nav_wrap a.sstt_nav_item').removeClass('nav-tab-active');
		jQuery(this).addClass('nav-tab-active');
		e.preventDefault(); //Due to unknown error occurence after this event
	});

	jQuery('button.sstt_icon_picker_selector').on('click',function(){
		jQuery(this).siblings('.sstt_icon_picker').toggle();
	});

	jQuery('li.sstt_icon_content').on('click',function(){
		
		var class_name = jQuery(this).data('value');

		jQuery('.sstt_content_icon_picker').val(class_name.replace(' ','|'));
		var selected_i = jQuery('i.sstt_icon_preview');
		selected_i.removeClass();
		selected_i.addClass('sstt_icon_preview');
		selected_i.addClass(class_name);

		jQuery(this).parent().parent().hide();
	});

	jQuery(document).mouseup(function(e){
		var container = jQuery('.sstt_icon_picker');
		if (!container.is(e.target) && container.has(e.target).length === 0) {
			container.hide();
		}
	});


	jQuery('.sstt_delete_marked').on('click',function(){
		var selected_elements = new Array();
		var del_nonce = jQuery('#sstt_del_mark_field').val();
		var type = jQuery(this).data('target');
		var iterator = 0;
		jQuery('.sstt_mark_individual').each(function(){
			if (jQuery(this).prop('checked')) {
				selected_elements[iterator] = jQuery(this).val();
				iterator++;
			}
		});
		var status = confirm(iterator + ' elements selected. Do you wish to delete selected '+ type +'s?');
		if (status) {
			if (type == 'element') {
				jQuery.post(
					ajaxurl,
					{
						'action':            'sstt_delete_marked',
						'nonce':             del_nonce,
						'selected_elements': selected_elements
					},
					function(response){
						var clear_response = response.slice(0,-1);
						if (clear_response == 'empty') {
							alert('Mark elements before deleting it');
						}
						else{
							alert(clear_response);
							location.reload();
						}
					}
				);
			}
			else if (type == 'template') {
				jQuery.post(
					ajaxurl,
					{
						'action': 			'sstt_delete_marked_template',
						'nonce': 			del_nonce,
						'selected_template':selected_elements
					},
					function(response){
						var clear_response = response.slice(0,-1);
						if (clear_response == 'empty') {
							alert('Mark templates before deleting it');
						}
						else{
							alert(clear_response);
							location.reload();
						}
					}
				);
			}
		}
		else{
			alert('Thats ok');
		}
	});



	// Validation
	// jQuery('#sstt_element_form').on('submit',function(e){
		
	// 	var text_status = true;
	// 	jQuery('.sstt_text_content').each(function(){
	// 	var text_content = jQuery(this);
	// 		if (!text_content.prop('disabled')) {
	// 			var text_value = text_content.val().trim();
	// 			jQuery(text_content).val(text_value);
	// 			var text_length = text_value.length;
	// 			if ((text_length > 12) || (text_length < 2)) {
	// 				alert('Length of Text should be 2 to 12 characters long');
	// 				text_status = false;
	// 			}
	// 		}
	// 	});

	// 	var element_content = jQuery('#sstt_element_name');
	// 	var element_name_value = element_content.val().trim();
	// 	var element_name_length = element_name_value.length;
	// 	jQuery(element_content).val(element_name_value);
	// 	if ((element_name_length > 12) || (element_name_length < 2)) {
	// 		alert('Name should be 2 to 12 characters in length');
	// 		return false;
	// 	}
	// 	return text_status;
	// });

	ssttIconNavChanger();

	jQuery('.sstt_copy_to_clipboard').on('click',function(){
		var copyText = jQuery(this).siblings('.sstt_copy_from_field');
		if (copyText.val()!='') {
			copyText.select();
			document.execCommand("Copy");
			copyText.blur();
			jQuery(this).text('Copied').delay(8000);
			jQuery(this).text('Copy to Clipboard');
		}
	});

	ssttImagePicker();

	ssttSmartScrollSelectField();

	ssttDisableCharacterChanges();

	ssttSlideToggleList();

	ssttRemoveGroup();

	ssttChangeGroupNameDynamically();

	ssttChangerStaticImage();

	ssttCheckUncheckAll();

	ssttTemplateVariationHandler();

	ssttCustomTemplateException();

	jQuery('.sstt_bulb_switch').on('click',function(){
		$this = this;
		display_bulb($this);
	});

	jQuery('.sstt_bulb_switch').each(function(){
		$this = this;
		display_bulb($this);
	});

});

// Checkbox script
function display_bulb( current , $ = jQuery ){
	if ($(current).prop('checked')) {
		$(current).parent().parent().next('.sstt_light_bulb').show();
	}
	else{
		$(current).parent().parent().next('.sstt_light_bulb').hide();
	}
}

function ssttIconNavChanger( $ = jQuery ) {
	var current = $('.sstt_icon_nav_item.sstt_right_nav').data('current');
	var prev = $('.sstt_icon_nav_item.sstt_left_nav').data('prev');
	var next = $('.sstt_icon_nav_item.sstt_right_nav').data('next');

	$('.sstt_icon_nav_item').on('click',function(){
		if ($(this).hasClass('sstt_left_nav')) {
			$('.sstt_icon_index_' + current).hide();
			$('.sstt_right_nav').attr('data-next',current);
			next = current;

			$('.sstt_icon_index_' + prev).show();
			$('.sstt_right_nav').attr('data-current',prev);
			$(this).attr('data-current',prev);
			current = prev;

			if (prev == 0) {
				prev--;
				$(this).prop('disabled',true);
			}
			else if (prev>0) {
				prev = prev - 24;
			}
			$(this).attr('data-prev',prev);

			$('.sstt_icon_nav_item.sstt_right_nav').prop('disabled',false);

		}
		else if ($(this).hasClass('sstt_right_nav')) {
			$('.sstt_icon_index_' + current).hide();
			$('.sstt_left_nav').attr('data-prev',current);
			prev = current;

			$('.sstt_icon_index_'+next).show();
			$('.sstt_left_nav').attr('data-current',next);
			$(this).attr('data-current',next);
			current = next;

			next = next+24;
			$(this).attr('data-next',next);


			if (current >= 48) {
				$(this).prop('disabled',true);
			}
			$('.sstt_icon_nav_item.sstt_left_nav').prop('disabled',false);
			
		}
	});
}

function ssttImagePicker(){
	jQuery('button.sstt_media_manager').click(function(e) {

	var title = 'Choose an Icon';
	var button = 'Select Icon';
	var hidden_field = jQuery(this).data('input');
	var preview_img = jQuery(this).data('preview');

	if (jQuery(this).attr('id') == 'sstt_bg_image_manager') {
		title = 'Select Background Image';
		button = 'Select Image';
	}

     e.preventDefault();
     $this = this;
       var image = wp.media({
            title: title,
            multiple: false,
            library : {
                type : 'image',
            },
            button:{
            	text: button
            }
        }).open()
                .on('select', function (e) {
                    var uploaded_image = image.state().get('selection').first();
                    var wpcui_img_url = uploaded_image.toJSON().url;
                    jQuery($this).parent().children('.' + hidden_field).val(uploaded_image.id);
                    jQuery($this).parent().children('.' + preview_img).attr('src', wpcui_img_url);
                });

     });
}

function ssttCreateNewGroup(){
	var group_name = prompt("New Group Name", "");
		if ((group_name != null) && (group_name != '')) {
			var group_nonce = jQuery('#sstt_create_group_nonce').val();
			jQuery.post(
					ajaxurl,
					{
						'action':            'sstt_create_smart_group',
						'nonce':             group_nonce,
						'group_name': 		 group_name
					},
					function(clear_response){
						if (clear_response == 'exists') {
							alert("Group Name Already exists");
						}
						else{
							alert(clear_response);
							location.reload();
						}
					}
				);
		}
}

function ssttSlideToggleList(){
	jQuery('.sstt_group_wrap_header').on('click',function(){
		jQuery(this).siblings('.sstt_group_details').slideToggle();
	});
}

function ssttEditGroup(current){
	jQuery(current).siblings('.sstt_group_names').prop('readonly',false);
	jQuery(current).remove();
}

function ssttCancelGroupChanges(){
	jQuery('.sstt_smart_scroll_btn button').prop('disabled',false);
	jQuery('.sstt_smart_group_container').removeClass('sstt_active_group_model');
	jQuery('.sstt_smart_group_container').empty();
}

function ssttSmartScrollSelectField(){
	jQuery('.sstt_select_field').on('click',function(){
		var current = jQuery(this);
		current.select();
		document.execCommand("Copy");
		current.blur();
	});
}

function ssttDisableCharacterChanges(){
	jQuery('.sstt_smart_elem').on("keydown",function(e){
		// if user writes a char at index === 0 that is not an arrow or HOME or END
		if ((jQuery(this).get(0).selectionStart < 17 && (e.keyCode < 35 || e.keyCode > 40))
		  // or if user tries to erase first char
		  || (jQuery(this).get(0).selectionStart < 18 && jQuery(this).get(0).selectionEnd < 18 && e.keyCode === 8)) {
		  // don't write the character
		  return false;
		}
	});
	// prevent right click
	jQuery(".sstt_smart_elem").bind("contextmenu", function(e) {
	  e.preventDefault();
	});
}

function ssttRemoveGroup(){
	jQuery('.sstt_group_remove').on('click',function(e){
		e.stopPropagation();
		var status = confirm('Are you sure you want to remove this group?');
		if (status) {
			jQuery(this).parent().parent().remove();
		}
	});
}

function ssttChangeGroupNameDynamically(){
	jQuery('.sstt_group_name').on('keyup',function(){
		var group_name = jQuery(this).val();
		jQuery(this).closest('.sstt_group_wrap').find('.sstt_group_title').html(group_name);
	});
}

function ssttChangerStaticImage(){
	jQuery('.sstt_static_preview_selector').on('change',function(){
		var target_src = jQuery('option:selected',this).data('src');
		if (jQuery(this).hasClass('sstt_template_image_selector')) {
			jQuery('.sstt_template_preview img.sstt_static_preview_image').attr('src',target_src);
		}
	});
}

function ssttCheckUncheckAll(){
	// Checked and unchecked for sstt_elements
	jQuery('.sstt_mark_all_elements').on('click',function(){
		if (jQuery(this).prop('checked')) {
			jQuery('.sstt_mark_all_elements').prop('checked',true);
			jQuery('.sstt_mark_individual').each(function(){
				jQuery(this).prop('checked',true);
			});
			jQuery('.sstt_delete_marked').show();
		}
		else{
			jQuery('.sstt_mark_all_elements').prop('checked',false);
			jQuery('.sstt_mark_individual').each(function(){
				jQuery(this).prop('checked',false);
			});
			jQuery('.sstt_delete_marked').hide();
		}
	});
	jQuery('.sstt_mark_individual').on('click',function(){
		var status = true;
		var individuals = false;
		jQuery('.sstt_mark_individual').each(function(){
			if (!jQuery(this).prop('checked')) {
				status = false;
			}
			else{
				individuals = true;
			}
		});
		if (individuals) {
			jQuery('.sstt_delete_marked').show();	
		}
		else{
			jQuery('.sstt_delete_marked').hide();	
		}
		jQuery('.sstt_mark_all_elements').prop('checked',status);
	});
}

function ssttTemplateVariationHandler($ = jQuery){
	$('.sstt_template_image_selector').on('change',function(){
		var template_id = $(this).val().split('_')[1];

		// No Button Text for templates below 10
		if (parseInt(template_id) > 9) {
			$('.sstt_button_txt_section').show();
		}
		else{
			$('.sstt_button_txt_section').hide();
		}

		// No Positioning Variation for templates from 22 to 25
		if (parseInt(template_id) > 21) {
			$('.sstt_advanced_pos_wrap').hide();
		}
		else{
			$('.sstt_advanced_pos_wrap').show();
		}

		if (parseInt(template_id) == 22 || parseInt(template_id) == 23 ) {
			$('.sstt_position_based_template_settings').hide();
		}
		else{
			$('.sstt_position_based_template_settings').show();
		}

		$('.sstt_bulb_switch').each(function(){
			$this = this;
			display_bulb($this);
		});

	});
	$('.sstt_template_image_selector').trigger('change');
}

function ssttCustomTemplateException($ = jQuery){
	// Exception for 18 to 21
	$('#sstt_template_selector').on('change',function(){
		var choosenTemplate = $(this).val();
		if (
			(choosenTemplate == 'template_18') ||
			(choosenTemplate == 'template_19') ||
			(choosenTemplate == 'template_20') ||
			(choosenTemplate == 'template_21')
		) {
			$('.sstt_custom_template_section').hide();
		}
		else{
			$('.sstt_custom_template_section').show();
		}

		var desktop_option_selected = $('#sstt_desktop_position_selector option:selected').val();
		var mobile_option_selected = $('#sstt_desktop_position_selector option:selected').val();

		if (choosenTemplate == 'template_16') {
			if ((desktop_option_selected != 'bottom_left') && (desktop_option_selected != 'bottom_right')) {
				$('#sstt_desktop_position_selector>option:eq(3)').prop('selected',true);
			}
			if ((mobile_option_selected != 'bottom_left') && (mobile_option_selected != 'bottom_right')) {
				$('#sstt_mobile_position_selector>option:eq(2)').prop('selected',true);
			}

			$('#sstt_desktop_position_selector option').hide();
			$('#sstt_mobile_position_selector option').hide();
			
			$('#sstt_desktop_position_selector option[value=bottom_left]').show();
			$('#sstt_desktop_position_selector option[value=bottom_right]').show();

			$('#sstt_mobile_position_selector option[value=bottom_left]').show();
			$('#sstt_mobile_position_selector option[value=bottom_right]').show();


		}
		else if ((choosenTemplate == 'template_24') || (choosenTemplate == 'template_25')) {
			$('#sstt_desktop_position_selector option').hide();
			$('#sstt_mobile_position_selector option').hide();

			$('#sstt_desktop_position_selector option[value=top_left]').show();
			$('#sstt_desktop_position_selector option[value=top_right]').show();
			$('#sstt_desktop_position_selector option[value=middle_left]').show();
			$('#sstt_desktop_position_selector option[value=middle_right]').show();
			$('#sstt_desktop_position_selector option[value=bottom_left]').show();
			$('#sstt_desktop_position_selector option[value=bottom_right]').show();

			$('#sstt_mobile_position_selector option[value=top_left]').show();
			$('#sstt_mobile_position_selector option[value=top_right]').show();
			$('#sstt_mobile_position_selector option[value=middle_left]').show();
			$('#sstt_mobile_position_selector option[value=middle_right]').show();
			$('#sstt_mobile_position_selector option[value=bottom_left]').show();
			$('#sstt_mobile_position_selector option[value=bottom_right]').show();

			if ((desktop_option_selected == 'top_middle') || (desktop_option_selected == 'bottom_middle')) {
				$('#sstt_desktop_position_selector>option:eq(0)').prop('selected',true);
			}

		}
		else{
			$('#sstt_desktop_position_selector option').show();
			$('#sstt_mobile_position_selector option').show();
		}
	});
	$('#sstt_template_selector').trigger('change');

}