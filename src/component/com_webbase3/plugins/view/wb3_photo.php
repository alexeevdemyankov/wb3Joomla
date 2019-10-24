<?php
function wb3_photo($fieldKey, $field, $fieldData)
{
    $return = (array_key_exists('join__' . $field->wb3_field, $fieldData)) ? $fieldData['join__' . $field->wb3_field] : $fieldData[$field->wb3_field];
    return "<img width='50px' height='auto' src='" . $return . "'>";
}