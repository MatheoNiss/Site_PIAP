/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
CKEDITOR.config.allowedContent = true;
CKEDITOR.config.extraAllowedContent = 'video [*]{*}(*);source [*]{*}(*);';
//extraAllowedContent: 'video[*]{*};source [*]{*}';
	
	CKEDITOR.editorConfig = function( config ) {
		
		 // Define changes to default configuration here. For example:
	config.language = 'fr';
	config.uiColor = '#AADC6E';
		
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		'/',
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		'/',
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'Preview,Form,Checkbox,Radio,TextField,Textarea,Select,ImageButton,Button,HiddenField,Iframe,About,Source,Templates,Print,NewPage,Save,PasteText,PageBreak,Maximize,ShowBlocks';
	
	

	config.toolbar_MyToolbar_article_title =
    [    
    [ 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo', '-', 'cleanup', '-', 'RemoveFormat'],
    [ 'Link', 'Unlink', 'Anchor', '-', 'Subscript', 'Superscript', '-', 'Bold', 'TextColor','Format', 'Font', 'FontSize' ] 
    ];

    config.toolbar_MyToolbar_link =
    [    
    [ 'Link', 'Unlink'] 
    ];
    config.toolbar_MyToolbar_empty =
    [    
    ];
	
	config.toolbar_MyToolbar_image = 
	[
		[ 'Image', 'Flash', 'NonverBlaster', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', '-', 'Link', 'Unlink', '-', 'RemoveFormat']
	];

	config.toolbar_MyToolbar_title =
    [    
    [ 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo', '-', 'cleanup', '-', 'RemoveFormat'],
    [ 'Link', 'Unlink', 'Anchor', '-', 'Subscript', 'Superscript', '-', 'Bold', 'TextColor','Format', 'Font', 'FontSize' ] 
    ];

	config.toolbar_MyToolbar_ressources = 
	[
		[ 'Save', '-', 'Cut', 'Copy', 'Paste', 'PasteFromWord', '-', 'Undo', 'Redo' ],
		[ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ],
		'/',
		[ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ],
		'/',
		[ 'Find', 'Replace', '-', 'SelectAll', '-' ],
		[ 'Link', 'Unlink', 'Anchor', 'Smiley', 'SpecialChar', '-', 'Table', 'HorizontalRule', '-', 'Image', 'Video','-', 'NonverBlaster', 'Flash'],
		'/',
		[ 'Styles', 'Format', 'Font', 'FontSize' ],
		[ 'TextColor', 'BGColor' ]	
	];
	
	
    config.toolbar_MyToolbar_article_contenu = [
		{ name: 'document', groups: ['mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		'/',
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		'/',
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];
	config.toolbar = 'MyToolbar_ressources';

	
	/*integration de kcFinder*/
	/*
	config.filebrowserBrowseUrl = './ckeditor/kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = './ckeditor/kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = './ckeditor/kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = './ckeditor/kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = './ckeditor/kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = './ckeditor/kcfinder/upload.php?type=flash';
	*/
	
	config.filebrowserBrowseUrl = './elfinder/elfinder.html?type=file';
	config.filebrowserImageBrowseUrl = './elfinder/elfinder.html?type=image';
	config.filebrowserFlashBrowseUrl = './elfinder/elfinder.html?type=flash';
	
	
	config.enterMode = CKEDITOR.ENTER_BR; // inserts `<br />`
	//config.enterMode = CKEDITOR.ENTER_P; // inserts `<p>...</p>`
	//config.enterMode = CKEDITOR.ENTER_DIV; // inserts `<div></div>`
	
   
   //pour empecher CkEditor de remplacer les accents par des codes
	config.entities = false;
	config.entities_latin = false;
	
	//config.smiley_path = window.CKEDITOR_BASEPATH + 'plugins/smiley/images/';
	config.smiley_path = './ckeditor/plugins/smiley/images/';
	
	//config.extraPlugins='jwplayer';
	//config.extraPlugins = 'video';
	
	//Videos and More with New CKEditor Embedded Content Plugin : http://www.getmura.com/blog/videos-and-more-with-new-ckeditor-embedded-content-plugin/
	//config.extraPlugins = 'embed,embedbase,widget,lineutils,clipboard,dialog,dialogui,notificationaggregator,notification,toolbar,button';
	
	//config.extraPlugins = 'allmedias';
	
	config.extraPlugins = 'video,NonverBlaster,bootstrapTabs';

	
};

 
 
