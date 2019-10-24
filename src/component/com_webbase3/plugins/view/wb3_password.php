<?php
function wb3_password($fieldKey, $field, $fieldData)
{
    return (strlen($fieldData[$field->wb3_field]) > 0) ? '******' : ' ';
}