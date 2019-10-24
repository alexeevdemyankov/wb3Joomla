<?php

defined('_JEXEC') or die;

class Webbase3ViewWb3_select2 extends JViewLegacy
{
    public function display($tpl = null)
    {
        $model = $this->getModel();
        $this->data = $model->select2(JFactory::getApplication()->input);
        parent::display($tpl);
    }
}
