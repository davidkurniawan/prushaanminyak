$(document).ready(function(){
	$('#menu ul li a').click(function(){
		$('#menu ul li a').removeClass('selected');
		$(this).addClass('selected');
		
		var submenu = $(this).next();
		
		if ($(submenu).is(':visible')){
			$(this).next().slideToggle('fast');
			return false;
		}
		
		if ($(submenu).is(':hidden')){
			$('#menu ul li ul:visible').slideToggle('fast');
			$(this).next().slideToggle('fast');
			return false;
		}
	});
	
	$(document).click(function(){
		$('#menu ul li ul').slideUp('fast');
		$('#menu ul li a').removeClass('selected');
	});
	
	$(window).scroll(function(){
		var height = $(window).scrollTop();
		if (height >= 50){
			$('#content div.heading').css({ 'top' : 0, 'z-index' : 9 });
		}
		else{
			$('#content div.heading').css({ 'top' : 35 + 'px' });
		}
	});
	
	$('#jclock').jclock({
		format: '%I:%M:%S %P'
	});
	
	$('label#date').jclock({
		format: '(%A, %d %B %Y) '
	});
	
});