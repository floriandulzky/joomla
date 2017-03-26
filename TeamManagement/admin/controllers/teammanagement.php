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
class TeamManagementControllerTeammanagement extends JControllerForm
{

	protected $default_view = 'teammanagement';

	public function display($cachable = false, $urlparams = array()){	
		return parent::display();
	}

	public function getModel($name = 'TeamManagement', $prefix = 'TeamManagementModel', $config = array('ignore_request' => true)){
		$model = parent::getModel($name, $prefix, $config);
 
		return $model;
	}

	public function saveTeam(){
		$data = $this->input->post->getArray(); //getData("name");
		$file = JRequest::getVar('image', null, 'files', 'array');
		$model = $this->getModel();
		$model->saveTeam($data, $file);
		JFactory::getApplication()->enqueueMessage('Team gespeichert');
		$this->display();
	}

	public function addPerson(){
		$data = $this->input->post->getArray();
		$model = $this->getModel();
		$view = $this->getView("teammanagement", "html");
		$view->team = $model->getTeam($data["id"]);
		$view->setLayout("editPlayer");
		$view->display();
	}

	public function savePlayer(){
		$data = $this->input->post->getArray();
		$model = $this->getModel();
		$model->savePlayer($data);
		$team = $model->getTeam($data["teamid"]);
		$view = $this->getView("teammanagement", "html");	
		$view->setLayout("edit");
		$view->team = $team;
		$view->display();
	}

	public function cancelEditPlayer(){
		$data = $this->input->post->getArray();
		$model = $this->getModel();
		$team = $model->getTeam($data["teamid"]);
		$view = $this->getView("teammanagement", "html");	
		$view->setLayout("edit");
		$view->team = $team;
		$view->display();
	}

	public function cancel(){
		$this->display();
	}

}