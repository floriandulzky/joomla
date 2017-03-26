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

jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

/**
 * HelloWorld Model
 *
 * @since  0.0.1
 */
class TeamManagementModelTeamManagement extends JModelItem
{
	public function getAllTeams(){
		$db = JFactory::getDbo();
		// Create a new query object.
		$query = $db->getQuery(true);
		// Select all records from the user profile table where key begins with "custom.".
		// Order it by the ordering field.
		$query->select('*');
		$query->from('teammanagement_teams');
		$query->order('name');
		 
		// Reset the query using our newly populated query object.
		$db->setQuery($query);
		 
		// Load the results as a list of stdClass objects (see later for more options on retrieving data).
		$results = $db->loadObjectList();
		return $results;
	}
}