jQuery(document).ready(function(){
	ssttChangeSelection();
});

function ssttChangeSelection(){
	jQuery('.sstt_selector_field').on('change',function(){
		var group_selected = jQuery(this).attr('id');
		var selection = jQuery(this).val();
		jQuery(this).parent().siblings('.' + group_selected).hide();
		jQuery(this).parent().siblings('.' + group_selected).children('.sstt_input_field').prop('disabled',true);
		var target = '.' + group_selected + '.sstt_' + selection + '_option';
		jQuery(this).parent().siblings(target).show();
		jQuery(this).parent().siblings(target).children('.sstt_input_field').prop('disabled',false);
	});
	jQuery('.sstt_selector_field').trigger('change');
}