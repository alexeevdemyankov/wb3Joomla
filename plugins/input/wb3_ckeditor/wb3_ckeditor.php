<?php
function wb3_ckeditor($field, $fieldData)
{


    $schemeParams = SchemeHelper::getSchemeParams($field->wb3_scheme_id);
    if ($schemeParams['file_folder']) : $folder = $schemeParams['file_folder'];endif;
    if ($schemeParams['field_file_folder']):$folder .= '/' . $fieldData[$schemeParams['field_file_folder']];endif;
    if ($folder): JFactory::getSession()->set('file_folder', $folder);endif;


    $input = '<textarea
            type="text" 
            class="form-control form-control-sm" 
            id="' . $field->wb3_field . '" 
            name="' . $field->wb3_field . '" 
            placeholder="' . JText::_('COM_WEBBASE_INPUT_PLACEHOLDER') . ' ' . $field->wb3_title . '">' . $fieldData[$field->wb3_field] . '</textarea> 
            ';

    $keyField = SchemeHelper::getFields($field->wb3_scheme_id, 1)[0];
    if (!$fieldData[$keyField->wb3_field]):$input = '<p class="alert alert-sm alert-warning">Для использования редактора, сохраните запись.</p>';endif;

    $return = '
        <div class="form-group">
        <label>' . $field->wb3_title . '</label>
            ' . $input . '  
        </div>
    ';

    if ($fieldData[$keyField->wb3_field]) {

        $return .= "    
        
        
    
    
    
        <script>  
     CKEDITOR.editorConfig = function( config ) {
	config.toolbar = [
		{ name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
		{ name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
		{ name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
		{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
		'/',
		{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
		{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
		{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
		{ name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
		'/',
		{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
		{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
		{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },	
	];
        };
          
             
          CKEDITOR.replace(
                 '" . $field->wb3_field . "', {                      
                     fullPage : false,allowedContent: true,                                     
                     filebrowserBrowseUrl: '/templates/webbase/js/ckfinder/ckfinder.html',
                     filebrowserImageBrowseUrl: '/templates/webbase/js/ckfinder/ckfinder.html?type=Images',
                     filebrowserUploadUrl : '/templates/webbase/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                     filebrowserImageUploadUrl : '/templates/webbase/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'                                      	                 	               
              } );  
          
             
        
        </script>   
        
          
        
        
           
        ";
    }
    return $return;

}

/*
 *
 * В заголовок модуля
 *   $schemeParams = SchemeHelper::getSchemeParams($field->wb3_scheme_id);
    if ($schemeParams['file_folder']) : $folder = $schemeParams['file_folder'];endif;
    if ($schemeParams['field_file_folder']):$folder .= '/' . $fieldData[$schemeParams['field_file_folder']];endif;
    if ($folder): JFactory::getSession()->set('file_folder', $folder);endif;
 *
 *
 * В Ckfinder
 * function getBurl()
{
    $base_dir = __DIR__;
    $base_dir = str_replace('/templates/webbase/js/ckfinder', '', $base_dir);
    define('JPATH_BASE', $base_dir);
    define('_JEXEC', 1);
    define('DS', DIRECTORY_SEPARATOR);
    define('JPATH_BASE', dirname(__FILE__));
    require_once(JPATH_BASE . DS . 'includes' . DS . 'defines.php');
    require_once(JPATH_BASE . DS . 'includes' . DS . 'framework.php');
    $mainframe =& JFactory::getApplication('site');
    $mainframe->initialise();
    $fileFolder = JFactory::getSession()->get('file_folder');
    $fileFolder = ($fileFolder) ? $fileFolder : '/images/';

    $fileFolderArray = explode('/', $fileFolder);
    foreach ($fileFolderArray as $item) {
        $dir .= '/' . $item;
        if (!is_dir($dir)) {
            mkdir($dir);
        }
    }
    return $fileFolder;
}
 *
 * */
