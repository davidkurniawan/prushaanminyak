/***************************
	Javascript Parse Int
	Author: Wilson Li
****************************/
function int(amount){
	var i = parseInt(amount);
	if (isNaN(i)) i = 0;
	return i;
}

/* Temporarily disabled due to bugs with jquery validation plugin.
needToConfirm = false;
	
function askConfirm(){
	if (needToConfirm) return "You have unsaved changes.";
}
*/