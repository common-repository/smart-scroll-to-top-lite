jQuery(document).ready(function(){

	ssttStickyDesign();

	jQuery('.sstt_whole_div_wrap').each(function(){
		var target_div = jQuery(this);
		var source_div = jQuery(this).children('.sstt_main_display_wrap');
		var auto_hide_time = source_div.data('hide');
		var offset = source_div.data('offset');
		var offset_type  = offset.split(':')[0];
		var offset_value  = offset.split(':')[1];

		var back_to = source_div.data('dest');
		var back_to_type = back_to.split('_')[0];
		var back_to_value = back_to.split('_')[1];
		// alert(back_to_value);
		var recollect = 0;

		if (back_to_type != 0) {
			var temp = jQuery('#' + back_to_value).offset();
			if (temp) {
				recollect = temp.top;
				// alert(recollect);
			}
		}

	var scrollSpeed = source_div.data('speed');
	var scrollStyle = 'swing';
	var auto_hide_counter = 1;

	var displayed_status = false;

	var text_changed = false;

	// Offset Function
	jQuery(window).scroll(function(){
			auto_hide_counter = 0;
			var scrollTopPos = jQuery(window).scrollTop();

			if (offset_type == 'pixels') {
				if (scrollTopPos > offset_value) {
					if (!displayed_status) {
						sstt_element_show(target_div);
						displayed_status = true;
					}
				}
				else{
					if (displayed_status) {
						sstt_element_hide(target_div);
						displayed_status = false;
					}
				}
			}
			else if (offset_type == 'percentage') {
				var window_height = jQuery(window).height();
				var document_height = jQuery(document).height();
				var halfwayPos = (scrollTopPos + window_height)/2;
				var support_var = ((document_height/2) - (window_height/2))*(offset_value/100);
				var pivot_pos = support_var + (window_height/2) ;
				// alert(pivot_pos);
				if (window_height == document_height) {
						if (!displayed_status) {
							sstt_element_show(target_div);
							displayed_status = true;
						}
					}
				else if (halfwayPos > pivot_pos){
					if (!displayed_status) {
						sstt_element_show(target_div);
						displayed_status = true;
					}
				}
				else{
					if (displayed_status) {
						sstt_element_hide(target_div);
						displayed_status = false;
					}
				}
			}
			else if (offset_type == 'custom_element') {
				if (offset_value == 0) {
					if (scrollTopPos > 0) {
						sstt_element_show(target_div);
					}
					else{
						sstt_element_hide(target_div);
					}
				}
				else{
					if (jQuery('#' + offset_value).offset()) {
						var custom_element_top = jQuery('#' + offset_value).offset().top;
						if (parseFloat(custom_element_top) < (parseFloat(scrollTopPos) - 10)) {
							if (!displayed_status) {
								sstt_element_show(target_div);
								displayed_status = true;
							}
						}
						else{
							if (displayed_status) {
								sstt_element_hide(target_div);
								displayed_status = false;
							}
						}
					}
				}
			}
	});
	// Scroll function ends

	if (auto_hide_time != null && auto_hide_time != '' && auto_hide_time != 'no') {
		setInterval(function(){
			auto_hide_counter++;
			if (auto_hide_counter >= auto_hide_time) {
				auto_hide_counter = 0;
				sstt_element_hide(target_div);
				displayed_status = false;
			}
		}, 1200);
	}

	jQuery(target_div).hover(function(){
		auto_hide_counter = 0;
	});
	

	// Scroll Speed behaviour
	source_div.on('click',function(){
		
		sstt_scroll_to_top(recollect,scrollSpeed,scrollStyle);

		}); //End of Scroll Speed Bahviour
	}); // End of jquery each loop

});

var show_animation;
var hide_animation;
var active = false;

function sstt_element_show(target_div){

	target_id = target_div.attr('id');
	target_div_1 = jQuery('#' + target_id);

	var source_div = jQuery(target_div_1).children('.sstt_main_display_wrap');
	target_div_1.addClass('sstt_active_btn');
	if (source_div.data('entry') == 'none') {
		target_div_1.show();
	}
	else{
		if (show_animation == undefined) {
			show_animation = source_div.data('entry');
		}
		target_div_1.show();
		target_div_1.addClass('animated');
		target_div_1.addClass(show_animation);
		setTimeout(function() {
			// target_div_1.removeClass('animated');
			target_div_1.removeClass(show_animation);
        }, 1500);
	}
}

function sstt_element_hide(target_div){
	
	target_id = target_div.attr('id');
	target_div_1 = jQuery('#' + target_id);

	var source_div = jQuery(target_div_1).children('.sstt_main_display_wrap');
	target_div_1.removeClass('sstt_active_btn');
	if (source_div.data('exit') == 'none') {
		target_div_1.hide();
	}
	else{
		// target_div_1.addClass('animated');
		if (hide_animation == undefined) {
			hide_animation = source_div.data('exit');
		}
		target_div_1.addClass(hide_animation);
		setTimeout(function() {
			// target_div_1.removeClass('animated');
			target_div_1.removeClass(hide_animation);
			if (!target_div_1.hasClass('sstt_active_btn')) {
				target_div_1.hide();
			}
        }, 1500);
	}
}


function sstt_scroll_to_top( recollect, scrollSpeed, scrollStyle ){
	jQuery('html, body').animate( { scrollTop:recollect } , scrollSpeed, scrollStyle );
}

function ssttStickyDesign($ = jQuery){
	$('.sstt_position_sticky').prependTo('footer');
		if ($('.sstt_whole_div_wrap').hasClass('sstt_position_sticky')) {
		
			var window_state = 0;

			jQuery(window).scroll(function(){
				var scrollTopPos = jQuery(window).scrollTop();
				if (window_state < parseFloat(scrollTopPos)) {
					if (jQuery('.sstt_whole_div_wrap.sstt_position_sticky').hasClass('sstt_show_sticky')) {
						jQuery('.sstt_whole_div_wrap.sstt_position_sticky').removeClass('sstt_show_sticky');
					}
				}
				else{
					if (!jQuery('.sstt_whole_div_wrap.sstt_position_sticky').hasClass('sstt_show_sticky')) {
						jQuery('.sstt_whole_div_wrap.sstt_position_sticky').addClass('sstt_show_sticky');
					}
				}
				window_state = parseFloat(scrollTopPos);
			});
		}
}