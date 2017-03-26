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
class TeamManagementViewPlayerManagement extends JViewLegacy
{
	function display($tpl = null){
		JToolbarHelper::title('Player Management', "users");
		if($this->_layout == "default"){
			JToolBarHelper::addNew('playermanagement.add');
			$this->teams = $this->get("allPlayers");
		}else if($this->_layout == "edit"){
			JToolBarHelper::cancel('playermanagement.cancel');
			JToolBarHelper::apply('playermanagement.save', 'Spieler speichern');
		}
		return parent::display($tpl);
	}
}