<?php
function wb3_textprice($fieldKey, $field, $fieldData)
{

    $return = (array_key_exists('join__' . $field->wb3_field, $fieldData)) ? $fieldData['join__' . $field->wb3_field] : $fieldData[$field->wb3_field];
    return number_format($return, 2, '.', '');

}