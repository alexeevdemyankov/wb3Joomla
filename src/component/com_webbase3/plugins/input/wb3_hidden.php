<?php
function wb3_hidden($field, $fieldData)
{
    return '      
        <input 
            type="hidden" 
            class="form-control form-control-sm" 
            id="' . $field->wb3_field . '" 
            name="' . $field->wb3_field . '" 
            placeholder="' . JText::_('COM_WEBBASE_INPUT_PLACEHOLDER') . ' ' . $field->wb3_title . '" 
            value="' . $fieldData[$field->wb3_field] . '">';
}