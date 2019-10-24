<?php

function wb3_select2($field, $fieldData)
{
    if ($field->wb3_field_slave) {
        $currentTable = ($field->wb3_base_slave) ? '`' . $field->wb3_base_slave . '`.`' . $field->wb3_table_slave . '`' : '`' . $field->wb3_table_slave . '`';
        $query = "
          SELECT
          `" . $field->wb3_field_slave . "` 
          FROM
          " . $currentTable . "
          WHERE
            `" . $field->wb3_key_slave . "`= '" . $fieldData[$field->wb3_field] . "'  
            ";
        $replaceValue = JFactory::getDbo()->setQuery($query)->loadResult();
    }

    $return = '
      <div class="form-group">
            <label>' . $field->wb3_title . ':</label>    
            <div class="input-group"> 
                <select  name="' . $field->wb3_field . '" id="' . $field->wb3_field . '"></select>
            </div>
      </div>
        ';

    $return .= "
    <script>
           var base='" . $field->wb3_base_slave . "';
           var table='" . $field->wb3_table_slave . "';
           var field='" . $field->wb3_field_slave . "';
           var key='" . $field->wb3_key_slave . "';
           var select2url='index.php?option=com_webbase3&view=wb3_select2&format=raw';
           select2url=select2url+'&base='+base;
           select2url=select2url+'&table='+table;
           select2url=select2url+'&field='+field;
           select2url=select2url+'&key='+key;
           jQuery('#" . $field->wb3_field . "').select2({
            placeholder: '" . $field->wb3_title . "',
            ajax: {
                url: select2url,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
                }
             });
    </script>    
    ";

    $return .= "<style>.select2-container{width:100%!important;}</style>";

    if ($replaceValue) {
        $return .= "
         <script>
            var option = jQuery('<option selected></option>').val('" . $fieldData[$field->wb3_field] . "').text('" . $replaceValue . "');
            jQuery('#" . $field->wb3_field . "').append(option).trigger('change');
          </script>
        ";
    }

    return $return;


}



