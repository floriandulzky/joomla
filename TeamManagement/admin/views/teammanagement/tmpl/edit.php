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
<form action="<?php echo JRoute::_('index.php?option=com_teammanagement'); ?>"
    method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
	<label for="name">Name:</label><input type="text" value="<?php echo (property_exists($this, 'team')) ? $this->team->name : ''; ?>" name="name" id="name" />
	<label for="shortname">Kurzname:</label><input type="text" value="<?php echo (property_exists($this, 'team')) ? $this->team->shortname : ''; ?>" name="shortname" id="shortname" />
	<label for="image">Foto: </label><input type="file" name="image" id="image" />
	<input type="hidden" name="id" value="<?php echo (property_exists($this, 'team')) ? $this->team->id : '0'; ?>" />
	<input type="hidden" name="task" value="teammanagement.edit"/>
	<?php echo JHtml::_('form.token'); ?>
</form>
