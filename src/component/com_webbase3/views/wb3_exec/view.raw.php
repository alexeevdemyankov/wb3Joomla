<?php

defined('_JEXEC') or die;

class Webbase3ViewWb3_exec extends JViewLegacy
{
    public function display($tpl = null)
    {

        $this->sysVars = SysHelper::urlToArray(null, null, null);
        $this->schemeRights = SysHelper::getSchemeRights($this->sysVars['wb3_scheme']);
        $model = $this->getModel();

        switch (JFactory::getApplication()->input->get('action')) {
            case 'insert':
                if ($this->schemeRights['wb3_w'] == 1) {
                    $this->return = $model->insert($this->sysVars['wb3_scheme'], $_GET, $_POST, $_FILES);
                } else {
                    echo SysHelper::denyMsg(JText::_('COM_WEBBASE_MSG_DENY'));
                }
                break;
            case 'copy':
                if ($this->schemeRights['wb3_w'] == 1) {
                    $this->return = $model->copy($this->sysVars['wb3_scheme'], $_GET, $_POST, $_FILES);
                } else {
                    echo SysHelper::denyMsg(JText::_('COM_WEBBASE_MSG_DENY'));
                }
                break;
            case 'edit':
                if ($this->schemeRights['wb3_w'] == 1) {
                    $this->return = $model->edit($this->sysVars['wb3_scheme'], $_GET, $_POST, $_FILES);
                } else {
                    echo SysHelper::denyMsg(JText::_('COM_WEBBASE_MSG_DENY'));
                }
                break;
            case 'delete':
                if ($this->schemeRights['wb3_x'] == 1) {
                    $this->return = $model->delete($this->sysVars['wb3_scheme'], $_GET, $_POST, $_FILES);
                } else {
                    echo SysHelper::denyMsg(JText::_('COM_WEBBASE_MSG_DENY'));
                }
                break;
        }
        $tpl = ($this->return['success'] > 0) ? null : 'blank';
        parent::display($tpl);

    }
}
