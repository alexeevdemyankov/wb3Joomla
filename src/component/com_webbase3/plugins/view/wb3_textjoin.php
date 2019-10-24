<?php
function wb3_textjoin($fieldKey, $field, $fieldData)
{
    return (array_key_exists('join__' . $field->wb3_field, $fieldData)) ? '[' . $fieldData[$field->wb3_field] . '] ' . $fieldData['join__' . $field->wb3_field] : $fieldData[$field->wb3_field];
}