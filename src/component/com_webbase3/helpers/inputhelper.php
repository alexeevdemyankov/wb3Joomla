<?php

class InputHelper
{

    public static function makeInput($field, $fieldData, $type)
    {
        $type = 'wb3_input_' . $type;
        $function = self::getInputFunction($field->$type, 'wb3_plugin_input');
        if (is_file(JPATH_ROOT . '/components/com_webbase3/plugins/input/' . $function . '.php')) {
            require_once(JPATH_ROOT . '/components/com_webbase3/plugins/input/' . $function . '.php');
            return $function($field, $fieldData);
        }
    }

    public static function makeView($fieldKey, $field, $fieldData)
    {
        $function = self::getInputFunction($field->wb3_input_view, 'wb3_plugin_view');
        if (is_file(JPATH_ROOT . '/components/com_webbase3/plugins/view/' . $function . '.php')) {
            require_once(JPATH_ROOT . '/components/com_webbase3/plugins/view/' . $function . '.php');
            return $function($fieldKey, $field, $fieldData);
        } else {
            return $fieldData[$field->wb3_field];
        }
    }


    public static function getInputFunction($id, $table)
    {
        return JFactory::getDbo()->setQuery("select wb3_function from $table  where wb3_id=$id")->loadResult();
    }


    public static function makeSchemeLink($schemeLinks, $fieldData)
    {
        foreach ($schemeLinks as $link) {
            $field = $link->masterField;
            $sysVars['wb3_scheme'] = $link->slaveScheme;
            $sysVars['wb3_key'] = $link->slaveField;
            $sysVars['wb3_val'] = $fieldData[$field];
            $count = '<span class="badge badge-secondary">' . SchemeHelper::getSchemeCount($link->slaveScheme, $sysVars) . '</span>';
            $ico = '<i class="' . str_replace('fa-lg', '', $link->slaveIco) . '"></i>';
            $url = "/index.php?option=com_webbase3&wb3_view=wb3_viewport&wb3_scheme=" . $link->slaveScheme . "&wb3_key=" . $link->slaveField . "&wb3_val=" . $fieldData[$field];

            $returnString[] = ' <a class="dropdown-item" href="' . $url . '">' . $ico . ' ' . $link->slaveTitle . ' ' . $count . ' </a>';
        }
        return implode('', $returnString);
    }

    public static function makeSchemePlugins($plugins, $sysVars)
    {
        $sysVars['format'] = 'raw';
        $sysVars['view'] = 'wb3_dataplugin';
        unset($sysVars['wb3_view']);
        foreach ($plugins as $plugin) {
            $sysVars['wb3_plugin'] = $plugin->wb3_id;
            $returnString[] = "<a class='dropdown-item' onclick=loadModal('" . SysHelper::arrayToUrl('index.php', $sysVars) . "');>" . $plugin->wb3_name . " </a>";
        }
        return implode('', $returnString);
    }

}