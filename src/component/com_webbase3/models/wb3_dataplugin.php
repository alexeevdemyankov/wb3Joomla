<?php

class Webbase3ModelWb3_dataplugin extends JModelList
{


    public function getPlugin($pluginId)
    {
        return SchemeHelper::getPluginById($pluginId);
    }


}