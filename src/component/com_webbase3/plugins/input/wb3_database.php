<?php
function wb3_database($field, $fieldData)
{
    $rows = JFactory::getDbo()->setQuery("SHOW DATABASES")->loadColumn();
    $option = null;
    foreach ($rows as $row) {
        unset($selected);
        if ($fieldData[$field->wb3_field] == $row) {
            $selected = "selected";
        }
        $option .= '<option value="' . $row . '" ' . $selected . '>' . $row . '</option>';
    }
    $option = '<option value="">Нет</option>' . $option;
    $return = "<select class='form-control' type='text' name='" . $field->wb3_field . "' id='" . $field->wb3_field . "'>" . $option . "</select>";
    $return .= "<script> jQuery('#" . $field->wb3_field . "').select2();</script>";
    $return .= "<style>.select2-container{width:100%!important;}</style>";

    return '
        <div class="form-group">
            <label>' . $field->wb3_title . ':</label>
            <div class="input-group">' . $return . '</div>  
        </div>
    ';
}