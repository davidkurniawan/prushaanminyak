function remove_multipleimage() {
    $('.delete_multipleimage').click(function(){
        var id = $(this).attr('id');
        console.log(id);
        $('.' + id).remove(); 
    });
}

function trigger_image() {
	$('p.upload input.input-button').click(function(){
		$(this).siblings('.input-file').trigger('click');
		return false;
	});
	
	$('p.upload .input-file').change(function(){
		$(this).siblings('.input-text').val($(this).val());
	});
}

$(document).ready(function(){
    
    $('.delete_multiple_image').click(function(){
		if (confirm('Are you sure you want to delete this image?')){
            var table = $(this).attr('data-table');
            var id = $(this).attr('id');
            var item_id = id.replace('removemultipleimage', '');
            console.log(item_id);
            $.post(base_url + 'goadmin/'+table+'/delete_image/' + item_id, function(){
				$('.removemultipleimage' + item_id).remove();
			});
		}
    });
    
    $('#add_multipleimage').click(function(){
        var newdivid = $(this).siblings('.multipleimage').length + 1;
        html = '<p class="upload multipleimage removemultipleimage' + newdivid + '">';
            html += '<label for="testimonial_image">';
                html += '<a id="removemultipleimage' + newdivid + '" class="input-submit delete_multipleimage btn-remove" href="javascript:;">X</a>';
                html += '<span>Image</span>';
            html += '</label>';
            html += '<input type="text" class="input-text" />';
            html += '<input type="file" class="input-file" name="multipleimage[]" accept="jpg|jpeg|gif|png" size="36" />';
            html += '<input type="hidden" value="' + newdivid + '" name="multipleimage_sort[]" />';
            html += '<input type="button" class="input-button" value="Browse" />';
        html += '</p>';
        $(this).before(html);
        remove_multipleimage();
        trigger_image()
    });
    remove_multipleimage();
});