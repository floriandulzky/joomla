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
?>
<form action="index.php?option=com_teammanagement&view=playermanagement" method="post" id="adminForm" name="adminForm">
	
<?php
	$lastTeamID = 0; 	
	foreach($this->teams as $team): 
		$link = JRoute::_('index.php?option=com_teammanagement&view=playermanagement&task=playermanagement.edit&id=' . $team->idPeople);
		$linkDelete = JRoute::_('index.php?option=com_teammanagement&task=delete&id=' . $team->id);
?>
	<?php if($lastTeamID != 0 && $lastTeamID != $team->idTeam): ?>
		</tbody>
		</table>
		<hr />
	<?php endif; ?>
	<?php if($lastTeamID != $team->idTeam): $lastTeamID = $team->idTeam;?>

		<h2><?php echo $team->name;?></h2>
		<table class="table table-striped" class="player-management">
				<thead>
					<tr>
				<th style="width: 20px"></th>
				<th style="width: 20px"></th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Position</th>
			</tr>
		</thead>
		<tbody>
	<?php endif; ?>
	<tr>
		<td><a href="<?php echo $link ?>">EDIT</a></td>
		<td></td>
		<td><?php echo $team->firstname; ?></td>
		<td><?php echo $team->lastname; ?></td>
		<td><?php echo $team->position; ?></td>
	</tr>
<?php endforeach; ?>
<input type="hidden" name="task" value=""/>
<input type="hidden" name="boxchecked" value="0"/>
<?php echo JHtml::_('form.token'); ?>
</form>