<?php

function wb3_checkbox($field, $fieldData)
{
    $checked = ($fieldData[$field->wb3_field] == 1) ? 'checked' : null;
    $checkBox = '<input id="checkbox__' . $field->wb3_field . '"  type="checkbox" class="form-check-input" ' . $checked . '>';

    $input = '      
        <input 
            type="hidden" 
            class="form-control form-control-sm" 
            id="' . $field->wb3_field . '" 
            name="' . $field->wb3_field . '" 
            placeholder="' . JText::_('COM_WEBBASE_INPUT_PLACEHOLDER') . ' ' . $field->wb3_title . '" 
            value="' . $fieldData[$field->wb3_field] . '">                                 
    ';

    $script = "
    <script>
         jQuery('#checkbox__" . $field->wb3_field . "').change(function() {
         if(jQuery(this).is(':checked')) {
             jQuery('#" . $field->wb3_field . "').val(1);
          }else{
             jQuery('#" . $field->wb3_field . "').val(0);
          }
    });
    </script>
    ";


    $return = '
    <div class="form-group">
        <div class="form-check">
            ' . $checkBox . '
            <label class="form-check-label">' . $field->wb3_title . '</label>
        </div>
    </div>
        ' . $input . ' ' . $script;

    return $return;
}

