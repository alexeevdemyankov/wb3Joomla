<?php

class Webbase3ModelWb3_menu extends JModelList
{

    public function getMenu()
    {
        $groups = JFactory::getUser()->getAuthorisedGroups();
        $groupsString = implode(',', $groups);
        $query = "
           SELECT           
            w3m.wb3_id,
            w3m.wb3_child,
            w3ml.wb3_name,
            w3ml.wb3_link      
           FROM
             wb3_menu as w3m,             
             wb3_menu_links as w3ml               
           WHERE         
             w3m.wb3_group in ($groupsString) 
           and 
             w3ml.wb3_id=w3m.wb3_link_id
           group by w3ml.wb3_id 
          order by w3ml.wb3_order ASC
           ";
        $items = JFactory::getDbo()->setQuery($query)->loadObjectList();
        $menu = $this->tree($items, 'wb3_id', 'wb3_child', 0, null);
        return $menu;
    }


    private function tree($items, $idField, $parentField, $parentId, $return)
    {
        foreach ($items as $item) {
            if ($item->$parentField == $parentId) {
                $return[$parentId][] = $item;
                $return = $this->tree($items, $idField, $parentField, $item->$idField, $return);
            }
        }
        return $return;
    }

}