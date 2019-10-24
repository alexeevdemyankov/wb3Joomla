<?php

defined('_JEXEC') or die;

class Webbase3ViewWb3_menu extends JViewLegacy
{
    public function display($tpl = null)
    {
        $model = $this->getModel();
        $this->items = $model->getMenu();
        parent::display($tpl);
    }
}
