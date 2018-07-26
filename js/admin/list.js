$(document).ready(function(){
	$('table.tablesorter')
		.tablesorter({ widgets: ['zebra'] })
		.tablesorterPager({ container: $('#pager'), seperator: " of ", positionFixed: false, size: 25 });
	
	$('table.tablesorter').delegate('td.flag span','click', function(){
		if (confirm('Change Status?')){
			
			var memo = prompt('Reason');
			
			if (memo && memo != ' '){
				
				var load_img = $(this).next('img.load');
				$(load_img).fadeIn();
				
				// Get current flag
				var flag = $(this).parent().attr('class').split('flag ')[1];
				var table_name = $(this).parents('table.tablesorter').attr('id');
				var item_id = $(this).parent().attr('id').split('item-')[1];
				
				if (flag == 1){
					var changeTo = '2';
					var color = '#F00';
				}
				else if (flag == 2){
					var changeTo = '1';
					var color = '#090';
				}
				
				
				$.post(base_url + 'goadmin/ajax/flag/', { new_flag: changeTo, table: table_name, id: item_id, flag_memo: memo }, function(){
					
					$(load_img).fadeOut();
					
					$('#item-' + item_id).removeClass(flag).addClass(changeTo);
					$('#item-' + item_id).children('span').css({ 'background': color });
					
					$('#memo-' + item_id).html(memo);
				});
				
			}
			else alert('Field cannot be blank');
		}
	});
	
	$('table.tablesorter td.del a.delete').click(function(){
		
		if (confirm('Delete this item?')){
			var table_name = $(this).parents('table.tablesorter').attr('id');
			var item_id = $(this).attr('id').split('row-')[1];
			
			$('#item-' + item_id).children('img.load').fadeIn();

			$.post(base_url + 'goadmin/ajax/delete', { table: table_name, id: item_id }, function(){
				$('#row-' + item_id).parents('tr').fadeOut();
			});
		}
	});
	
	$('.filter select').change(function(){
		$(this).parent('form').submit();
	});
});