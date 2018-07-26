$(document).ready(function(){	
	$('table#action-log')
			.tablesorter({ widgets: ['zebra'] })
			.tablesorterPager({ container: $('#pager'), seperator: " of ", positionFixed: false, size: 25 });
});