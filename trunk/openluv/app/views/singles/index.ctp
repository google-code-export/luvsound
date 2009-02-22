</div>
<div id="center_column">
	<?php if($session->read('Auth.User.group_id')==1) : ?>
	<div class="item_wrapper">
		<?php echo $button->link('Add A New Single', '/singles/add'); ?>
	</div>
	<?php endif; ?>
	
	<?php foreach($singles as $single) : ?>
	<div class="item_wrapper featured_single">
		<h2><a href="<?php echo $single['Single']['url']; ?>"><?php echo $single['Single']['name']; ?></a> by <?php echo $single['Artist']['name']; ?></h2>
		<p><strong><?php echo $single['Single']['luv_id']; ?></strong> released <?php echo $time->timeAgoInWords($single['Single']['created'], array('format'=>'l, F jS, o')); ?></p>
		<?php echo $this->element('mp3player', array('url'=>$single['Single']['url'], 'description'=>$single['Single']['description'])); ?>
	</div>
	<?php endforeach; ?>