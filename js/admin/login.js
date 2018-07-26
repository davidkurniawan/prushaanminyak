$(document).ready(function(){
	
	$('#username').select().focus();
	
	if ($('#login_error').html() != '')
	{
		$('#login_error').css({ 'display' : 'block' }).animate({ 'height' : 18 });
	}
	
	$('#login').validate({
			
		messages : {
			'username' : { required: 'Required.' },
			'password' : { required: 'Required.' }
			},
			
		submitHandler: function(form){
		
			$('img.load').fadeIn();
			
			$.ajax({
				type : 'POST',
				data : $('#login').serialize(),
				url : base_url + 'goadmin/login/validate',
				success : function(html){
					$('img.load').fadeOut();
					
					if (html == 'success'){
						$('body').fadeOut();
						window.location = base_url + 'goadmin';
					}
					else if (html == 'incorrect'){
						$('#login_error').html('username / password anda salah').css({ 'display' : 'block' }).animate({ 'height' : 18 });
					}
					else if (html == 'warning'){
						$('#login_error').html('username tidak aktif. hubungi bagian terkait.').css({ 'display' : 'block' }).animate({ 'height' : 18 });
					}
				}
			});
		}
	});
});