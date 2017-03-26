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
jimport('joomla.application.component.helper'); 
/**
 * HTML View class for the HelloWorld Component
 *
 * @since  0.0.1
 */
class TeamManagementViewTeamManagement extends JViewLegacy
{

	function display($tpl = null)
	{
		JToolbarHelper::title('Team Management', "users");
		if($this->_layout == "default"){
			JToolBarHelper::addNew('teammanagement.add');
			$this->teams = $this->get("AllTeams");
		}else if($this->_layout == "edit"){
			JToolBarHelper::cancel('teammanagement.cancel');
			JToolBarHelper::custom('teammanagement.addPerson', 'new', 'new', 'Neuer Spieler', false);
			JToolBarHelper::apply('teammanagement.saveTeam', 'Team speichern');
		}else if($this->_layout == "editPlayer"){
			JToolBarHelper::cancel('teammanagement.cancelEditPlayer');
			JToolBarHelper::apply('teammanagement.savePlayer', 'Spieler speichern');
		}
		parent::display($tpl);
	}
}