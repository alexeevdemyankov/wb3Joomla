<?php

defined('_JEXEC') or die;

class Webbase3ViewWb3_edit extends JViewLegacy
{
    public function display($tpl = null)
    {
        $this->sysVars = SysHelper::urlToArray(null, null, null);
        if (!$this->sysVars['wb3_checked']) {
            $tpl = 'blank';
        } else {
            $model = $this->getModel();
            $this->currentScheme = $model->getScheme($this->sysVars);

            if (SchemeHelper::getSchemeFieldsCount($this->currentScheme->schemeFields, 'wb3_input_edit', $this->sysVars['wb3_field']) == 0):$tpl = 'blank';endif;
        }
        parent::display($tpl);
    }
}
