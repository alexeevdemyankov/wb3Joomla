<?php

defined('_JEXEC') or die;

class Webbase3ViewWb3_del extends JViewLegacy
{
    public function display($tpl = null)
    {
        $this->sysVars = SysHelper::urlToArray(null, null, null);
        if (!$this->sysVars['wb3_checked']):$tpl = 'blank';endif;
        parent::display($tpl);
    }
}
