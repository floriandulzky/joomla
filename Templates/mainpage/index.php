<?php
    defined('_JEXEC') or die;
    
    JHTML::_('behavior.framework', true);
    $app = JFactory::getApplication();
?>

<?php echo '<!DOCTYPE html>'; ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="de">

<head>
	<link href='http://fonts.googleapis.com/css?family=Roboto:500,900italic,900,400italic,100,700italic,300,700,500italic,100italic,300italic,400' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width">
    <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ekko-lightbox.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
	<header>
		<div class="logo">
			<a href="/">
				<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/img/logo.jpg" title="SV Frohnleiten" alt="SV Frohnleiten" style="max-width: 100px;">
			</a>
		</div>
		<span class="menu-opener glyphicon glyphicon-align-justify"></span>
		<div class="top">
			<div id="menu">
				<div class="moduletable_menu">
					<jdoc:include type="modules" name="position-01" style="xhtml" />
				</div>
			</div>
		</div>
	</header>
	<div class="main">
		<div class="content">
			<div class="sections">
				<jdoc:include type="modules" name="position-05" style="xhtml" />
			</div>
		</div>
	</div>
	<footer>
		<div class="footer-content">
			<jdoc:include type="modules" name="position-04" style="xhtml" />
		</div>
	</footer>
	<div class="scroll-top">
		<span class="glyphicon glyphicon-chevron-up"></span>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/ekko-lightbox.min.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
    <!-- custom.js: Custom JS comes here -->
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/custom.js"></script>
</body>
</html>
