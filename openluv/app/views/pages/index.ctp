	<div class="item_wrapper featured_single">
		<h2><a href="<?php echo $single['Single']['url']; ?>"><?php echo $single['Single']['name']; ?></a> by <?php echo $single['Artist']['name']; ?></h2>
		<p><strong><?php echo $single['Single']['luv_id']; ?></strong> The Single of the Week</p>
		<?php echo $this->element('mp3player', array('url'=>$single['Single']['url'], 'description'=>$single['Single']['description'])); ?>
	</div>
</div>
<div id="center_column">
	<div class="item_wrapper featured_release">
		<div style="background-image: url('<?php echo $release['Release']['cover']; ?>');">
			&nbsp;
		</div>
		<h2><a href="/releases/view/<?php echo $release['Release']['luv_id']; ?>">&nbsp;<?php echo $release['Release']['name']; ?>&nbsp;</a>&nbsp;<?php echo $release['Release']['luv_id']; ?>&nbsp;</h2>
		<h3>by <?php echo $release['Artist']['name']; ?></h3>
		<?php echo $release['Release']['description']; ?>
	</div>