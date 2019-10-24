<?php

defined('_JEXEC') or die;

class Webbase3ViewWb3_add extends JViewLegacy
{
    public function display($tpl = null)
    {
        $this->sysVars = SysHelper::urlToArray(null, null, null);
        $model = $this->getModel();
        $this->currentScheme = $model->getScheme($this->sysVars);
        parent::display($tpl);
    }
}
