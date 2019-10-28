<?php

class SysHelper
{


    public static function getHeaderLibs()
    {
        $query = "select  wb3_patch from wb3_libs where wb3_active=1";
        return implode(' ', JFactory::getDbo()->setQuery($query)->loadColumn());

    }

    public static function pluginLockGet($id)
    {
        if (!$id):return null;endif;
        $query = "select  wb3_busy from wb3_plugin_data where wb3_id=$id";
        return JFactory::getDbo()->setQuery($query)->loadResult();
    }


    public static function pluginLock($id, $lock)
    {
        if (!$id):return null;endif;
        $query = "UPDATE wb3_plugin_data SET wb3_busy=$lock where wb3_id=$id";
        JFactory::getDbo()->setQuery($query)->execute();
    }


    //Подготавливает данные для записи в JSON
    public static function safe_json_for_encode($json)
    {
        $search = array('\\', "\n", "\r", "\f", "\t", "\b", "'");
        $replace = array('\\\\', "\\n", "\\r", "\\f", "\\t", "\\b", "&#039");
        $json = str_replace($search, $replace, $json);
        return $json;
    }


    public static function setLog($database, $table, $method, $data)
    {
        if (!$database):$database = JFactory::getConfig()->get('db');endif;
        if (!$table):return null;endif;
        $userId = JFactory::getUser()->id;
        $query = "SELECT * FROM wb3_log_list where wb3_database='$database' and wb3_table='$table' and wb3_active=1";
        $logItems = JFactory::getDbo()->setQuery($query)->loadObjectList();
        if (sizeof($logItems) < 1):return null;endif;
        $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        $data = self::safe_json_for_encode($data);
        foreach ($logItems as $logItem) {
            $query = "insert into wb3_log_history(wb3_log_id,wb3_table,wb3_method,wb3_data,wb3_user,wb3_stream) 
              values(" . $logItem->wb3_log_id . ",'" . $logItem->wb3_table . "','" . $method . "','" . $data . "',$userId," . $logItem->wb3_stream . ")";
            JFactory::getDbo()->setQuery($query)->execute();
        }
    }


    public static function setDefaults($name, $value)
    {
        if (!$name or !$value):return null;endif;
        JFactory::getSession()->set($name, $value);
    }

    public static function getDefaults($name)
    {
        if (!$name):return null;endif;
        return JFactory::getSession()->get($name);
    }

    public static function clearDefaults($name)
    {
        if (!$name):return null;endif;
        return JFactory::getSession()->clear($name);
    }


//функции разбора урла
    public static function urlToArray($url, $include, $exclude)
    {
        $url = (!$url) ? urldecode($_SERVER['REQUEST_URI']) : $url;
        if (!is_array($include)):$include = explode(',', $include);endif;
        if (!is_array($exclude)):$exclude = explode(',', $exclude);endif;
        $urlItems = explode('&', explode('?', $url)[1]);
        foreach ($urlItems as $item) {
            $itemData = explode('=', $item);
            $return[$itemData[0]] = $itemData[1];
        }
        $include = array_diff($include, array(''));
        $exclude = array_diff($exclude, array(''));

        if (sizeof($include) > 0) {
            foreach ($include as $includeKey) {
                $returnInclude[$includeKey] = $return[$includeKey];
            }
            return $returnInclude;
        }
        if (sizeof($exclude) > 0) {
            foreach ($exclude as $excludeKey) {
                unset($return[$excludeKey]);
            }
        }
        return $return;
    }

    public static function arraySwitchVar($array, $from, $to)
    {
        $array[$to] = $array[$from];
        unset($array[$from]);
        return $array;

    }

    public static function arrayToUrl($root, $array)
    {
        if (sizeof($array) > 0) {
            foreach ($array as $key => $arrayItem) {
                $urlVarsArray[] = $key . '=' . $arrayItem;
            }
        }
        return $root . '?' . implode('&', $urlVarsArray);
    }


    public static function getPluginRights($wb3PluginId)
    {
        $groups = implode(',', JFactory::getUser()->groups);
        $query = "
          select 
            	wb3_access  
          from 
            	wb3_plugin_rights       
          where                       
           wb3_group_id in ($groups) 
          AND
            wb3_plugin_id=$wb3PluginId
            ";
        return JFactory::getDbo()->setQuery($query)->loadResult();

    }

    public static function getSchemeRights($wb3_scheme)
    {

        $groups = implode(',', JFactory::getUser()->groups);
        $query = "
          select 
            max(wb3_r) as wb3_r,
            max(wb3_w) as wb3_w,
            max(wb3_x) as wb3_x    
          from 
            wb3_scheme_rights       
          where                       
           wb3_group_id in ($groups) 
          AND
            wb3_scheme_id=$wb3_scheme
          group by wb3_scheme_id
            ";
        return JFactory::getDbo()->setQuery($query)->loadAssoc();
    }

    public static function denyMsg($msg)
    {
        return "<p class='alert alert-danger'>$msg</palert>";
    }


}


