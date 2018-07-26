$(document).ready(function(){
	
	$('textarea.content').ckeditor({
		customConfig: base_url + 'js/ckeditor/custom_config.js',
		filebrowserBrowseUrl : base_url + 'js/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : base_url + 'js/ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : base_url + 'js/ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : base_url + 'js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : base_url + 'js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : base_url + 'js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
		
		on :
		{
			instanceReady: function(ev)
			{
				this.dataProcessor.writer.setRules('p',
				{
					indent: false,
					breakBeforeOpen : true,
					breakAfterOpen : false,
					breakBeforeClose : false,
					breakAfterClose : true
				});
			}
		}
	});
});