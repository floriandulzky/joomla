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
 * PlayerManagement Model
 *
 * @since  0.0.1
 */
class TeamManagementModelPlayerManagement extends JModelItem
{
	public function getAllPlayers(){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('teammanagement_teams t');
		$query->join('LEFT OUTER', $db->quoteName('teammanagement_people_team', 'pt') . ' ON (' . $db->quoteName('t.id') . ' = ' . $db->quoteName('pt.idTeam') . ')');
		$query->join('LEFT OUTER', $db->quoteName('teammanagement_people', 'p') . ' ON (' . $db->quoteName('pt.idPeople') . ' = ' . $db->quoteName('p.id') . ')');
		$query->order('t.name, p.firstname, p.lastname');
		$db->setQuery($query);
		$results = $db->loadObjectList();
		return $results;
	}

	public function save($data, $file){
		$filePath = $this->uploadFile($file);
		$db = JFactory::getDbo();
		// Create a new query object.
		$query = $db->getQuery(true);

		if($data["id"] == 0){
			// Insert columns.
			$columns = array('firstname', 'lastname', 'position', 'peopleImage', 'text', 'number');
			// Insert values.
			$values = array(
				$db->quote($data['firstname']), 
				$db->quote($data['lastname']), 
				$db->quote($data['position']),
				$db->quote($filePath),
				$db->quote($data['text']),
				$db->quote($data['number'])
			);
			$query
			    ->insert("teammanagement_people")
			    ->columns($db->quoteName($columns))
			    ->values(implode(',', $values));
		}else{
			// Udate columns.
			$columns = array('id', 'fistname', 'lastname', 'position', 'peopleImage', 'text', 'number');
			// update values.
			$values = array(
				$db->quoteName("firstname") . " = " . $db->quote($data['firstname']), 
				$db->quoteName("lastname") . " = " . $db->quote($data['lastname']),
				$db->quoteName("position") . " = " . $db->quote($data['position']), 
				$db->quoteName("text") . " = " . $db->quote($data['text']), 
				$db->quoteName("number") . " = " . $db->quote($data['number'])  
			);
			if($filePath != "")
				$values[] = $db->quoteName("peopleImage") . " = " . $db->quote($filePath);
			$query
			    ->update("teammanagement_people")
			    ->set($values)
			    ->where(array($db->quoteName("id") . " = " . $data["id"]));
		}
		// Set the query using our newly populated query object and execute it.
		$db->setQuery($query);
		$db->execute();
		$idPeople = $db->insertid();
		if($idPeople == 0 && $data["id"] != 0)
			$idPeople = $data["id"];
		$query = $db->getQuery(true);
		$conditions = array(
			$db->quoteName('idPeople') . ' = ' . $idPeople
		);
		$query->delete($db->quoteName('teammanagement_people_team'));
		$query->where($conditions);
		$db->setQuery($query);
		$db->execute();
		foreach ($data["teams"] as $team) {
			$query = $db->getQuery(true);
			$columns = array('idPeople', 'idTeam');
			// Insert values.
			$values = array($idPeople, $db->quote($team));
			$query
			    ->insert("teammanagement_people_team")
			    ->columns($db->quoteName($columns))
			    ->values(implode(',', $values));
			$db->setQuery($query);
			$db->execute();
		}
	}

	public function getPlayerById($id){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('teammanagement_people p');
		$query->join('LEFT OUTER', $db->quoteName('teammanagement_people_team', 'pt') . ' ON (' . $db->quoteName('p.id') . ' = ' . $db->quoteName('pt.idPeople') . ')');
		$query->join('LEFT OUTER', $db->quoteName('teammanagement_teams', 't') . ' ON (' . $db->quoteName('pt.idTeam') . ' = ' . $db->quoteName('t.id') . ')');
		$query->where('p.id = ' . $db->quote($id));
		$db->setQuery($query);
		$results = $db->loadObjectList();
		return $results;
	}

	public function getPersonSelectedTeams($personTeamList){
		$result = array();
		foreach($personTeamList as $teamlist){
			$result[] = $teamlist->idTeam;
		}
		return $result;
	}

	private function uploadFile($file){
		if($file["name"] != ""){
			$filename = JFile::makeSafe($file['name']);
	        $src = $file['tmp_name'];
	        $url = "/media/com_teammanagement/img/spieler";
	        $dest = JPATH_SITE . $url;
	        if(!JFolder::exists($dest))
	        	JFolder::create($dest, 0775);
	        $dest .= "/$filename";
	        if (JFile::upload($src, $dest)) {
	              return $url . "/$filename";
	        } else {
	              return "";
	        }
		}
	}
}