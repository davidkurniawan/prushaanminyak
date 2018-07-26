// Configure this to match the view on front-page
CKEDITOR.stylesSet.add( 'custom_styles',
[
/*
    // Block-level styles
    { name : 'Blue Title', element : 'h2', styles : { 'color' : 'Blue' } },
    { name : 'Red Title' , element : 'h3', styles : { 'color' : 'Red' } },
 
    // Inline styles
    { name : 'CSS Style', element : 'span', attributes : { 'class' : 'my_style' } },
    { name : 'Marker: Yellow', element : 'span', styles : { 'background-color' : 'Yellow' } },
	*/
]);

/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	 config.uiColor = '#EEE';
	 config.toolbar = 'Custom';
	 
	 config.toolbar_Custom =
	 [
		{ name: 'clipboard', items : [ 'Cut','Copy','Paste','-','Undo','Redo', 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
		{ name: 'editing', items : [ 'Find','Replace','-',/*'SelectAll'*/ ] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
				'/',
		{ name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule', 'TextColor','BGColor' ] },
		{ name: 'styles', items : [ /*'Styles',*/'Link','Unlink', 'Format','Font','FontSize','Maximize', 'Source' ] },
	 ];
	 
	 config.stylesSet = 'custom_styles';
};
