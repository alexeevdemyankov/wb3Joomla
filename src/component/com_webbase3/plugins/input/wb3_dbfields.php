<?php
function wb3_dbfields($field, $fieldData)
{
    $query = "
        select 
          TABLE_NAME,
          COLUMN_NAME,
          TABLE_SCHEMA
       from 
          INFORMATION_SCHEMA.COLUMNS
        where 
          TABLE_SCHEMA not like 'information_schema'
        and
           TABLE_SCHEMA not like 'mysql' 
        and
           TABLE_SCHEMA not like 'sys'
        and
           TABLE_SCHEMA not like 'performance_schema' 
        order by TABLE_SCHEMA,TABLE_NAME,COLUMN_NAME
        ";
    $rows = JFactory::getDbo()->setQuery($query)->loadObjectList();
    $option = "<option value=''>Нет</option>";
    foreach ($rows as $row) {
        unset($selected);
        if ($fieldData[$field->wb3_field] == $row->COLUMN_NAME) {
            $selected = "selected";
        }
        $option .= "<option value='" . $row->COLUMN_NAME . "' ".$selected.">" .$row->COLUMN_NAME." (".$row->TABLE_NAME."-".$row->TABLE_SCHEMA.")</option>";
    }
    $return = "<select class='form-control' type='text' name='" . $field->wb3_field . "' id='" . $field->wb3_field . "'>" . $option . "</select>";
    $return.="<script> jQuery('#" . $field->wb3_field . "').select2();</script>";
    $return .= " <style>.select2-container{width:100%!important;}</style>";

    return '
        <div class="form-group">
        <label>' . $field->wb3_title . '</label>
          ' . $return . '           
        </div>
    ';
}