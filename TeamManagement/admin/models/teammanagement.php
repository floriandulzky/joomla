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
 * HelloWorld Model
 *
 * @since  0.0.1
 */
class TeamManagementModelTeamManagement extends JModelItem
{
	function getAllTeams(){
		// Get a db connection.
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

	function getTeam($id){
		$id = (int)$id;
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('t.*');
		$query->from("teammanagement_teams t");
		$query->where("t.id = " . $db->quote($id));
		$db->setQuery($query);
		return $db->loadObject();	
	}

	function saveTeam($data, $file){
		$db = JFactory::getDbo();
		// Create a new query object.
		$query = $db->getQuery(true);

		if($data["id"] == 0){
			// Insert columns.
			$columns = array('name', 'shortname', 'image');
			// Insert values.
			$values = array($db->quote($data['name']), $db->quote($data['shortname']), $db->quote("") );
			$query
			    ->insert("teammanagement_teams")
			    ->columns($db->quoteName($columns))
			    ->values(implode(',', $values));
		}else{
			// Udate columns.
			$columns = array('id', 'name', 'shortname', 'image');
			// update values.
			$values = array(
				$db->quoteName("name") . " = " . $db->quote($data['name']), 
				$db->quoteName("shortname") . " = " . $db->quote($data['shortname'])
			);
			$query
			    ->update("teammanagement_teams")
			    ->set($values)
			    ->where(array($db->quoteName("id") . " = " . $data["id"]));
		}
		// Set the query using our newly populated query object and execute it.
		$db->setQuery($query);
		$db->execute();
	}

	public function delTeam($id){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$condition = array($db->quoteName('id') . " = $id" );
		$query->delete($db->quoteName("teammanagement_teams"));
		$query->where($condition);
		$db->setQuery($query);
		return $db->execute();
	}

	public function savePlayer($data){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		if($data["id"] != 0){
//EDIT Player

			echo "TODO: update";
			exit();

		}else{
//INSERT Player
			// Insert columns.
			$columns = array('firstname', 'lastname', 'team_id');
			// Insert values.
			$values = array($db->quote($data['firstname']), $db->quote($data['lastname']), $db->quote($data['teamid']));
			$query
			    ->insert("teammanagement_people")
			    ->columns($db->quoteName($columns))
			    ->values(implode(',', $values));
		}
		$db->setQuery($query);
		$db->execute();
	}
}