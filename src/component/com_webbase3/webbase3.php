<?php
defined('_JEXEC') or die;

JLoader::register('SysHelper', JPATH_COMPONENT . '/helpers/syshelper.php');
JLoader::register('SchemeHelper', JPATH_COMPONENT . '/helpers/schemehelper.php');
JLoader::register('DataHelper', JPATH_COMPONENT . '/helpers/datahelper.php');
JLoader::register('InputHelper', JPATH_COMPONENT.'/helpers/inputhelper.php');
JLoader::register('PageHelper', JPATH_COMPONENT.'/helpers/pagehelper.php');

$controller = JControllerLegacy::getInstance('webbase3');
$controller->execute(JFactory::getApplication()->input->get('webbase3'));
$controller->redirect();


