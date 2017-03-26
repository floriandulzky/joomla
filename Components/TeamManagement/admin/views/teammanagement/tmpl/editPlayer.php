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
<form action="<?php echo JRoute::_('index.php?option=com_teammanagement&teamId=' . $this->team->id ); ?>"
    method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">

    <label for="firstname">Vorname:</label><input type="text" value="<?php echo (property_exists($this, 'person')) ? $this->person->firstname : ''; ?>" name="firstname" id="firstname" />
	<label for="lastname">Nachname:</label><input type="text" value="<?php echo (property_exists($this, 'person')) ? $this->person->lastname : '';?>" name="lastname" id="lastname" />

	<input type="hidden" name="id" value="<?php echo (property_exists($this, 'person')) ? $this->person->id : '0'; ?>" />
    <input type="hidden" name="teamid" value="<?php echo (property_exists($this, 'team')) ? $this->team->id : '0'; ?>" />
    <input type="hidden" name="task" value="teammanagement.edit"/>
	<?php echo JHtml::_('form.token'); ?>
</form>