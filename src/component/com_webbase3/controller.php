<?php

class Webbase3Controller extends JControllerLegacy
{
    public function display($cachable = false, $urlparams = false)
    {
        $document = JFactory::getDocument();
        $vFormat = $document->getType();
        $vName = $this->input->getCmd('view', $_GET['view']);
        $lName = $this->input->getCmd('layout', 'default');
        $model = $this->getModel($_GET['view']);
        $view = $this->getView($vName, $vFormat);
        $view->document = $document;
        $view->setModel($model, true);
        $view->setLayout($lName);
        $view->display();
    }
}

