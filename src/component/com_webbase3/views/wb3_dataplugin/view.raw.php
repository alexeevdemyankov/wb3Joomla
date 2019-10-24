<?php

defined('_JEXEC') or die;

class Webbase3ViewWb3_dataplugin extends JViewLegacy
{
    public function display($tpl = null)
    {

        $this->sysVars = SysHelper::urlToArray(null, null, null);
        $this->schemeRights = SysHelper::getSchemeRights($this->sysVars['wb3_scheme']);
        $this->pluginRights = SysHelper::getPluginRights($this->sysVars['wb3_plugin']);

        if ($this->pluginRights == 1 or $_GET['allowcron'] == 1) {
            $model = $this->getModel();
            $this->plugin = $model->getPlugin($this->sysVars['wb3_plugin']);
            $action = (JFactory::getApplication()->input->get('action', '', '')) ? JFactory::getApplication()->input->get('action', '', '') : 'index';
            $moduleFile = JPATH_COMPONENT . "/plugins/data/" . $this->plugin->wb3_function . '/' . $action . '.php';
        }
        if (is_file($moduleFile)) {
            $tpl = ($action == 'index') ? $action : 'exec';
            require_once($moduleFile);
        } else {
            $tpl = 'blank';

        }
        parent::display($tpl);

    }
}
