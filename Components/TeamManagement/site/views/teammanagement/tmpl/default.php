<div class="teams">
<?php foreach($this->teams as $team):?>
	<div class="row" style="margin-bottom: 10px;">
		<?php if($team->image != ""): ?>
	  		<div class="col-md-8">
	  			<img src="<?php echo JURI::root() . $team->image; ?>" width="500" />
	  		</div>
	  		<div class="col-md-4">
	  			<h2><?php echo $team->name; ?></h2>
	  		</div>
	  	<?php else: ?>
	  		<div class="col-md-12">
	  			<h2><?php echo $team->name; ?></h2>
	  		</div>
	  	<?php endif; ?>
  	</div>
<?php endforeach; ?>
</div>