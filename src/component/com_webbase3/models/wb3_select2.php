<?php

class Webbase3ModelWb3_select2 extends JModelList
{
    function select2($jinput)
    {
        $base = $jinput->get('base', '', '');
        $table = $jinput->get('table', '', '');
        $field = $jinput->get('field', '', '');
        $key = $jinput->get('key', '', '');
        $q = $jinput->get('q', '', '');

        $currentTable = ($base) ? '`' . $base . '`.`' . $table . '`' : '`' . $table . '`';


        $q = str_replace('*', '%', $q);

        $items = JFactory::getDbo()->setQuery("select `$field`,`$key` from $currentTable where `$field` like '" . $q . "%' limit 50")->loadObjectList();
        $json[0] = ['id' => 'null', 'text' => 'Нет'];
        foreach ($items as $item) {
            $json[] = ['id' => $item->$key, 'text' => $item->$field];
        }
        return json_encode($json);
    }
}

