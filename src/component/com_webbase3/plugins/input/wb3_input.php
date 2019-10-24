<?php
function wb3_input($field, $fieldData)
{
    $input = '
  
        <input 
            type="text" 
            class="form-control form-control-sm" 
            id="' . $field->wb3_field . '" 
            name="' . $field->wb3_field . '" 
            placeholder="' . JText::_('COM_WEBBASE_INPUT_PLACEHOLDER') . ' ' . $field->wb3_title . '" 
            value="' . htmlspecialchars ($fieldData[$field->wb3_field]) . '">                   
    ';

    $return = '
        <div class="form-group">
            <label>' . $field->wb3_title . ':</label>
            <div class="input-group">                
                ' . $input . '        
            </div>
        </div>';

    return $return;

}