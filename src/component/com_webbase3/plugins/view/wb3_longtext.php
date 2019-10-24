<?php
function wb3_longtext($fieldKey, $field, $fieldData)
{
    return (strlen($fieldData[$field->wb3_field]) > 0) ? '<i class="far fa-file-alt"></i>' : '<i class="far fa-file"></i>';

}