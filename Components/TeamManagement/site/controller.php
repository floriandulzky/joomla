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

	public function getModel($name = 'TeamManagement', $prefix = 'TeamManagementModel', $config = array('ignore_request' => true)){
		$model = parent::getModel($name, $prefix, $config);
 
		return $model;
	}

	public function display(){
		$view = $this->getView("teammanagement", "html");
		$view->teams = $this->getModel()->getAllTeams();
		parent::display();
	}
}