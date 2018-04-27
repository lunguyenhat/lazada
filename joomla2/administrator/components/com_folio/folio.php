<?php
defined('_JEXEC') or die;
if (!JFactory::getUser()->authorise('core.manage', 'com_folio'))
	{
		return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	}
	$controller = JControllerLegacy::getInstance('Folio');
	echo "<pre>";
	print_r($controller);
	echo "</pre>";
	$controller->execute(JFactory::getApplication()->input->get('task'));
	$controller->redirect();