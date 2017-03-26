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
class TeamManagementControllerPlayerManagement extends JControllerForm
{

	protected $default_view = 'playermanagement';

	public function display($cachable = false, $urlparams = array()){	
		return parent::display();
	}

	public function getModel($name = 'PlayerManagement', $prefix = 'TeamManagementModel', $config = array('ignore_request' => true)){
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}

	public function add(){
		$view = $this->getView("playermanagement", "html");
		$view->teams = $this->getModel($name='TeamManagement')->getAllTeams();
		$view->setLayout("edit");
		$this->display();
	}

	public function edit(){
		$model = $this->getModel();
		$view = $this->getView("playermanagement", "html");
		$view->teams = $this->getModel($name='TeamManagement')->getAllTeams();
		$id = $this->input->getData("id");
		$view->person = $model->getPlayerById($id);
		$view->personSelectedTeams = $model->getPersonSelectedTeams($view->person);
		$view->setLayout("edit");
		$this->display();
	}

	public function save(){
		$model = $this->getModel();
		$data = $this->input->post->getArray(array(), null, "raw");
		$file = JRequest::getVar('image', null, 'files', 'array');
		$model->save($data, $file);
		$view = $this->getView("playermanagement", "html");
		$view->setLayout("default");
		$this->display();
	}

	public function cancel(){
		$this->display();
	}

}