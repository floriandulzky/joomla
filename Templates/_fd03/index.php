<?php
    defined('_JEXEC') or die;
    
    JHTML::_('behavior.framework', true);
    $app = JFactory::getApplication();
?>

<?php echo '<!DOCTYPE html>'; ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="de">

<head>
    <jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/style.css" type="text/css" />
</head>
<body>
<div id="ausrichtung">
	<div id="platzhalter">
		<div id="kopf">
			
		</div>
		<div id="inhalt">
			<div id="breadcrumb">
			<jdoc:include type="modules" name="position-05" style="xhtml" />
			</div>
			<div id="left">
				<div id="menu">
                    <table>
                        <tr>
                            <td class="menu_style">
                                <jdoc:include type="modules" name="position-01" style="xhtml" />
                            </td>
                        </tr>
                    </table>
				</div>
				<div id="login">
                    <jdoc:include type="modules" name="position-02" style="xhtml" />
                </div>
			</div>
			<div id="news">
				<jdoc:include type="modules" name="position-03" style="xhtml" />	
			</div>
			<div id="content">
				 <jdoc:include type="component" style="xhtml" />
				 <jdoc:include type="modules" name="position-09" style="xhtml" />
			</div>
		</div>
		<div id="ausbildungen"><center><jdoc:include type="modules" name="ausbildungen" style="xhtml" /></center></div>
		<div id="fuss">
            <center><jdoc:include type="modules" name="position-04" style="xhtml" /> <p>Copyright © HS Frohnleiten | All Rights Reserved <br/> Design by F. Dulzky | Modified by F. Dulzky | Powered by Joomla</p></center>
		</div>
	</div>
</div>
</body>
</html>
