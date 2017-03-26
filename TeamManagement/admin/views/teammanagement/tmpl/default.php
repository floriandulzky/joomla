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
<form action="index.php?option=com_teammanagement&view=teammanagement" method="post" id="adminForm" name="adminForm">
	<table class="table table-striped" id="team-management">
		<thead>
			<tr>
				<th style="width: 20px"></th>
				<th style="width: 20px"></th>
				<th>Team Name</th>
				<th>Team Kurzname</th>
			</tr>
		</thead>
		<tbody>
		<?php
			foreach($this->teams as $team): 
				$link = JRoute::_('index.php?option=com_teammanagement&task=edit&id=' . $team->id);
				$linkDelete = JRoute::_('index.php?option=com_teammanagement&task=delete&id=' . $team->id);
		?>
			<tr>
				<td>
					<a href="<?php echo $link; ?>" title="Edit">
						EDIT	
					</a>
				</td>
				<td>
					<a href="<?php echo $linkDelete; ?>" title="Delete">
						DEL	
					</a>
				</td>
				<td><?php echo $team->name; ?></td>
				<td><?php echo $team->shortname; ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<?php echo JHtml::_('form.token'); ?>
</form>