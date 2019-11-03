/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'vi';
	config.uiColor = '#AADC6E';
	config.height = '600px';

	config.filebrowserBrowseUrl = '/templates/admin/ckfinder/ckfinder.html';
    config.filebrowserUploadUrl = '/templates/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserWindowWidth = '1200';
    config.filebrowserWindowHeight = '700'
};
