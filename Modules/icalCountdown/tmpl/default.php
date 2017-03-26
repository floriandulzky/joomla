<?php 
// No direct access
defined('_JEXEC') or die; ?>
<div id="getting-started"></div>
<script type="text/javascript">
  $("#getting-started")
  .countdown("2017/01/01", function(event) {
    $(this).text(
      event.strftime('%D days %H:%M:%S')
    );
  });
</script>
<?php
echo "<pre>";
	var_dump($events);
echo "</pre>";
?>