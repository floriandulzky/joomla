<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access
defined('_JEXEC') or die('Restricted access');
 
?>
<form action="<?php echo JRoute::_('index.php?option=com_teammanagement&view=playermanagement'); ?>"
    method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
	<div>
		<div style="float:left; min-width:300px; display:block;">
			<label for="firstname">Vorname:</label><input type="text" value="<?php echo (property_exists($this, 'person')) ? $this->person[0]->firstname : ''; ?>" name="firstname" id="firstname" />
			<label for="lastname">Nachname:</label><input type="text" value="<?php echo (property_exists($this, 'person')) ? $this->person[0]->lastname : '';?>" name="lastname" id="lastname" />
			<label for="lastname">Positionen:</label><input type="text" value="<?php echo (property_exists($this, 'person')) ? $this->person[0]->position : '';?>" name="position" id="position" />
			<label for="number">Rückennummer:</label><input type="text" value="<?php echo (property_exists($this, 'person')) ? $this->person[0]->number : '';?>" name="number" id="number" />
			<label for="image">Foto: </label><input type="file" name="image" id="image" />
			<?php if(property_exists($this, 'person') && $this->person[0]->peopleImage != ""): ?>
				<img src="<?php echo JURI::root() . $this->person[0]->peopleImage; ?>" width="300" />
			<?php endif; ?>
		</div>
		<div style="float:left;min-width:300px; display:block;">
			<?php foreach($this->teams as $team): ?>
				<div style="clear:both;">
					<input style="float: left;" type="checkbox" value="<?php echo $team->id; ?>" name="teams[]" 
						<?php echo (property_exists($this, 'personSelectedTeams') && in_array($team->id, $this->personSelectedTeams) ? "checked" : ""); ?>
					><label><?php echo $team->name;?></label>
				</div>
			<?php endforeach; ?>
		</div>
		<div style="clear: both;" />
		<label for="number">Text:</label>
		<?php 
		$editor = JFactory::getEditor();
		echo $editor->display("text", (property_exists($this, 'person')) ? $this->person[0]->text : "", "400", "100", "150", "10", false, null, null, null, array('mode' => 'simple'));
		?>
	</div>
	<input type="hidden" name="id" value="<?php echo (property_exists($this, 'person')) ? $this->person[0]->idPeople : '0'; ?>" />
    <input type="hidden" name="task" value="playermanagement.edit"/>
<?php echo JHtml::_('form.token'); ?>
</form>