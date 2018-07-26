$(document).ready(function(){
	if ($.browser.msie) {
		if ($.browser.version <= 6) { window.location = base_url + 'ie6'; }
	}
	
	$("img").hide().not(function() {
		return this.complete && $(this).fadeIn();
	}).bind("load", function(){ $(this).fadeIn(); });
});
// function validateForm(arr, arremail){
// 	var counter = 0;
// 	for(var i = 0; i < arr.length; i++){
// 		if($('[name="'+arr[i]+'"]').first().val().trim() == ""){
// 			$('[name="'+arr[i]+'"]').first().next().html("Required");
// 			$('[name="'+arr[i]+'"]').first().val("");
// 			counter++;
// 		}else if($('[name="'+arr[i]+'"]').first().val().trim() != ""){
// 			$('[name="'+arr[i]+'"]').first().next().html("");
// 			if(!validateEmail(arremail)) counter++;
// 		}
// 	}
// 	if(counter == 0) return true;
// 	if(counter > 0) return false;
// }

