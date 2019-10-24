<?php

defined('_JEXEC') or die;

class Webbase3ViewWebbase3 extends JViewLegacy
{
    public function display($tpl = null)
    {
        $sysVars = SysHelper::urlToArray(null, null, null);
        $this->sysVars = SysHelper::arraySwitchVar($sysVars, 'wb3_view', 'view');
        $this->sysVars['format'] = 'raw';
        $this->sysUrl = SysHelper::arrayToUrl('index.php', $this->sysVars);

        parent::display($tpl);
    }
}
