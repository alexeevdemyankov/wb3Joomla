<?php

defined('_JEXEC') or die;

class Webbase3ViewWb3_Viewport extends JViewLegacy
{
    public function display($tpl = null)
    {
        $this->sysVars = SysHelper::urlToArray(null, null, null);
        $this->schemeRights = SysHelper::getSchemeRights($this->sysVars['wb3_scheme']);
        if ($this->schemeRights['wb3_r'] == 1) {
            $searchId= 's' . $this->sysVars['wb3_scheme'].'k'.$this->sysVars['wb3_key'].'v'.$this->sysVars['wb3_val'];
            //Set defaults pagination & order &search
            if ($this->sysVars['wb3_search_clear'] == 1) {
                SysHelper::clearDefaults('wb3_search' . '_' . $searchId);
                SysHelper::clearDefaults('wb3_search_field' . '_' . $searchId);
            }
            SysHelper::setDefaults('wb3_onpage', $this->sysVars['wb3_onpage']);
            SysHelper::setDefaults('wb3_order' . '_' . $this->sysVars['wb3_scheme'], $this->sysVars['wb3_order']);
            SysHelper::setDefaults('wb3_direction' . '_' . $this->sysVars['wb3_scheme'], $this->sysVars['wb3_direction']);
            SysHelper::setDefaults('wb3_search' . '_' . $searchId, $this->sysVars['wb3_search']);
            SysHelper::setDefaults('wb3_search_field' . '_' . $searchId, $this->sysVars['wb3_search_field']);
            unset($this->sysVars['wb3_onpage']);
            unset($this->sysVars['wb3_order']);
            unset($this->sysVars['wb3_direction']);
            unset($this->sysVars['wb3_search']);
            unset($this->sysVars['wb3_search_field']);
            unset($this->sysVars['wb3_search_clear']);

            $this->wb3Order = SysHelper::getDefaults('wb3_order' . '_' . $this->sysVars['wb3_scheme']);
            $this->wb3Direction = SysHelper::getDefaults('wb3_direction' . '_' . $this->sysVars['wb3_scheme']);
            $this->wb3Search = SysHelper::getDefaults('wb3_search' . '_' . $searchId);
            $this->wb3SearchField = SysHelper::getDefaults('wb3_search_field' . '_' . $searchId);


            $model = $this->getModel();
            $this->currentScheme = $model->getScheme($this->sysVars);
            $this->pagination = PageHelper::getPagination($this->currentScheme->schemeData['count'], SysHelper::arrayToUrl('index.php', $this->sysVars), 'Ajax');
            parent::display($tpl);
        } else {
            echo SysHelper::denyMsg(JText::_('COM_WEBBASE_MSG_DENY'));
        }
    }
}




