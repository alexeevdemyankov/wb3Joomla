<?php
function wb3_textarea($field, $fieldData)
{
    return '
        <div class="form-group">
        <label>' . $field->wb3_title . '</label>
            <div class="input-group"> 
                <textarea
                    type="text" 
                    class="form-control form-control-sm" 
                    id="' . $field->wb3_field . '" 
                    name="' . $field->wb3_field . '" 
                    placeholder="' . JText::_('COM_WEBBASE_INPUT_PLACEHOLDER') . ' ' . $field->wb3_title . '">' . $fieldData[$field->wb3_field] . '</textarea>
            </div>                
        </div>
    ';
}