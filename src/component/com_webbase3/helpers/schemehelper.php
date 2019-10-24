<?php

class SchemeHelper
{

    public static function getSchemeFieldsCount($schemeFields, $fieldKey, $fieldId)
    {
         $i = 0;
        foreach ($schemeFields as $field) {
            if ($fieldId > 0 && $fieldId <> $field->wb3_id):continue;endif;
            if ($field->$fieldKey > 0):$i++;endif;
        }
        return $i;
    }

    public static function getSchemeParams($schemeID)
    {
        $query = "
            SELECT 
              *
            FROM 
              wb3_scheme_params_link as w3spl,
              wb3_scheme_params as w3sp 
            WHERE
              w3sp.wb3_id=w3spl.wb3_param_id
            AND 
              w3spl.wb3_scheme_id=$schemeID     
          ";
        $items = JFactory::getDbo()->setQuery($query)->loadObjectList();
        foreach ($items as $item) {
            $return[$item->wb3_key] = $item->wb3_value;
        }
        return $return;

    }


    public static function getSchemeCount($schemeID, $sysVars)
    {
        $keyField = self::getFields($schemeID, 1)[0];
        $fields = self::getFields($schemeID, 0);
        return DataHelper::getSchemeData($keyField, $fields, $sysVars)['count'];
    }


    public static function getFields($schemeId, $keyFieldFlag) //Получить поле 1 если ключевое
    {
        $whereKey = ($keyFieldFlag == 1) ? ' and wb3_key=1' : null;
        return JFactory::getDbo()->setQuery("select * from wb3_scheme_fields where wb3_scheme_id=$schemeId " . $whereKey . " order by wb3_ordering ASC")->loadObjectList();
    }

    public static function getFieldById($fieldId)
    {
        return JFactory::getDbo()->setQuery("select * from wb3_scheme_fields where wb3_id=$fieldId")->loadObject();
    }

    public static function getSchemeInfo($schemeId)
    {
        return JFactory::getDbo()->setQuery("select * from wb3_scheme where wb3_id=$schemeId ")->loadObject();
    }

    public static function getSchemeLinks($schemeId)
    {
        $query = "
                select
                  w3mf.wb3_field as masterField,
                  w3sf.wb3_field as slaveField,
                  w3sf.wb3_scheme_id as slaveScheme,    
                  w3s.wb3_name slaveTitle,
                  w3s.wb3_faico slaveIco
                from
                  wb3_scheme_link as w3sl
                  LEFT JOIN wb3_scheme_fields as w3mf on(w3mf.wb3_id=w3sl.wb3_master_id)
                  LEFT JOIN wb3_scheme_fields as w3sf on(w3sf.wb3_id=w3sl.wb3_slave_id)
                  LEFT JOIN wb3_scheme as w3s on (w3s.wb3_id=w3sf.wb3_scheme_id)
                where
                  w3sl.wb3_master_id in (select wb3_id from wb3_scheme_fields where wb3_scheme_id=$schemeId)
                  ";

        return JFactory::getDbo()->setQuery($query)->loadObjectList();
    }


    public static function getSchemePlugins($schemeId)
    {
        $query = "
                select                
                  wpd.*
                from                
                  wb3_scheme_plugin_links as wspl,
                  wb3_plugin_data wpd
                where
                  wpd.wb3_id=wspl.wb3_plugin_id
                and 
                  wpd.wb3_active=1
                and
                  wspl.wb3_scheme_id=$schemeId";
        return JFactory::getDbo()->setQuery($query)->loadObjectList();
    }

    public static function getPluginById($pluginId)
    {
        $query = "
                select                
                  wpd.*
                from                                  
                  wb3_plugin_data wpd
                where              
                  wpd.wb3_active=1
                and
                  wpd.wb3_id=$pluginId";
        return JFactory::getDbo()->setQuery($query)->loadObject();
    }


}