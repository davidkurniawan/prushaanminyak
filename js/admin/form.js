//window.onbeforeunload = askConfirm;
$(document).ready(function(){

	$('#language-bar li a').click(function(){
		
		$('#language-bar li a').removeClass('active');
		$(this).addClass('active');
		var id = $(this).attr('id');
		
		$('#form-content div.language').hide();
		$('#form-content div.language.' + id).fadeIn(300);
	});
	
	$('input.back').click(function(){
		history.go(-1);
	});
	
	$('input.back-to-admin').click(function(){
		window.location = base_url + 'goadmin/admin';
	});
	
	$('#content form input').keyup(function(){
//		needToConfirm = true;
	});
	
	$('#content form').validate({
		
//		submitHandler: function(form){
//			needToConfirm = false;
//			form.submit();
//		},
		
		messages : {
			'admin_re_password' : { equalTo: 'Enter the same password.' },
			'admin_username' : { remote: 'Username already taken.' },
			'old_password' : { remote: 'Wrong password.' },
			'setting_web_logo' : { accept: 'Only pictures are allowed' },
			'banner_link' : { url: 'URL must start with http://' }
		},
		
		rules : {
			old_password : {
				required: function(element) {
					return $('#admin_password').val() != '';
				},
				remote: base_url + 'goadmin/admin/check_password/' 
			}
		}
	});
	
	$('p.upload input.input-button').click(function(){
		$(this).siblings('.input-file').trigger('click');
		return false;
	});
	
	$('p.upload .input-file').change(function(){
		$(this).siblings('.input-text').val($(this).val());
	});
	
	$('p.upload img.delete-image').click(function(){
		
		var image_name = $(this).attr('src');
		
		if (confirm('Are you sure you want to delete this image?')){
			
			$(this).siblings('img.load').fadeIn();
			$(this).siblings('input.current-image').val('');
			$(this).siblings('a.hover-image').hide();
			var field_name = $(this).attr('id');
			
			$.post(base_url + 'goadmin/ajax/delete_image/', { id: $('#item-id').val(), table: $(this).attr('alt'), field: field_name }, function(){
				$('img.load.'+field_name+', #'+field_name).fadeOut();
			});
			$('#' + field_name).siblings('#delete_image').val('true');
		}
	});
	
	$('#module_parent').change(function(){
		var value = $(this).val();
		
		if (value == 0){
			$('#module_url').val('javascript:;');
		}
		else {
			if ($('#module_url').val() == 'javascript:;')
				$('#module_url').val('')
			else
				$('#module_url').addClass('required');
		}
	});
	
	$('#news_type').change(function(){
		var value = $(this).val();
		
		// If type == event
		if (value == 2){
			$('p.end-date').fadeIn().children('input').addClass('required').val('');
		}
		
		else{
			$('p.end-date').fadeOut().removeClass('required').children('input').val('');
		}
	});
	
	$('#gallery_category_type').change(function(){
		var value = $(this).val();
		
		$('#gallery_category_parent').load(base_url + 'goadmin/gallery_category/show_parent/' + value, function(){
			
		});
	});
	
	$('#item_category').change(function(){
		var value = $(this).val();
		
		$('#choose-subcategory img.load').fadeIn();
		
		$('#item_subcategory').load(base_url + 'goadmin/product_category/show_subcategory/' + value, function(){
			$('#choose-subcategory img.load').fadeOut();
		});
	});
});
