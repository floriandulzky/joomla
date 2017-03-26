<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
/**
 * Hello World Component Controller
 *
 * @since  0.0.1
 */
class TeamManagementController extends JControllerLegacy
{
	public function display($cachable = false, $urlparams = array()){	
		return parent::display();
	}

	public function delete(){
		$id = $this->input->getData("id");
		$model = $this->getModel();
		$delSuccess = $model->delTeam($id);
		if($delSuccess){
			JFactory::getApplication()->enqueueMessage('Team erfolgreich gelöscht');
		}else{
			JFactory::getApplication()->enqueueMessage('Das Team konnte nicht gelöscht werden');
		}
		$this->display();
	}

	public function edit(){
		$id = $this->input->getData("id");
		$model = $this->getModel();
		$team = $model->getTeam($id);
		echo "<pre>";
		var_dump($team);
		echo "</pre>";
		exit();
		$view = $this->getView("teammanagement", "html");	
		$view->setLayout("edit");
		$view->team = $team;
		$view->display();
	}

	public function cancel(){
		$this->dsiplay();
	}
}