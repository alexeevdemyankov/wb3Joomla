<?php
function wb3_checkbox($fieldKey, $field, $fieldData)
{
    $ico=($fieldData[$field->wb3_field])?'far fa-check-square':'far fa-square';
    return '<i class="'.$ico.'"></i>';
}
