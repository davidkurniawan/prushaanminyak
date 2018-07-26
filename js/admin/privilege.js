$(document).ready(function(){
	$('input.privilege').click(function(){
		var value = $(this).val();
		
		if (value == 3)
			$('#access-table').slideDown();
		else
			$('#access-table').slideUp();
	});

	$('.access-add').click(function(){
		if ($(this).attr('checked'))
		{
			$(this).parent('td').prev().children('.access-read').attr('checked', true);
			$(this).parent('td').next().children('.access-modify').attr('checked', true);
		}
	});
		
	// If edit is allowed, read is too.
	$('.access-modify').click(function(){
		if ($(this).attr('checked'))
		{
			$(this).parent('td').prev().prev().children('.access-read').attr('checked', true);
		}
		if ( !$(this).attr('checked'))
		{
			$(this).parent('td').prev().children('.access-add').attr('checked', false);
			$(this).parent('td').next().children('.access-delete').attr('checked', false);
		}
	});
	
	// If delete is allowed, read & edit is too
	$('.access-delete').click(function(){
		
		if ($(this).attr('checked')){
			$(this).parent('td').prev().prev().prev().children('.access-read').attr('checked', true);
			$(this).parent('td').prev().children('.access-modify').attr('checked', true);
		}
	});
	
	// If read is OFF, edit is OFF too
	$('.access-read').click(function(){
		if ( ! $(this).attr('checked')) {
			$(this).parent('td').next().next().children('.access-modify').attr('checked', false);
			$(this).parent('td').next().children('.access-add').attr('checked', false);
			$(this).parent('td').next().next().next().children('.access-delete').attr('checked', false);
		}
	});
	
	// Calculate total :)
	$('tr td input').click(function(){
		
		// Which module?
		var module = $(this).attr('name');
		
		// Get all value.
		var read = int($('input[name=' + module +'].access-read:checked').val());
		var add = int($('input[name=' + module +'].access-add:checked').val());
		var modify = int($('input[name=' + module +'].access-modify:checked').val());
		var del = int($('input[name=' + module +'].access-delete:checked').val());
		
		$('#total-' + module).val(read + add + modify + del);
	});
});