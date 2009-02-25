</div>
<div id="center_column">
	<?php if($session->read('Auth.User.group_id')==1) : ?>
	<div class="item_wrapper">
		<?php echo $button->link('Add A New Item', '/items/add'); ?>
	</div>
	<?php endif; ?>
	
	<?php foreach($items as $item) : ?>
	<div class="item_wrapper featured_item">
		<h2><a href="<?php echo $item['Item']['url']; ?>"><?php echo $item['Item']['name']; ?></a> from <?php echo $item['Release']['name']; ?></h2>
		<p><strong><?php echo $item['Item']['luv_id']; ?></strong> released <?php echo $time->timeAgoInWords($item['Item']['created'], array('format'=>'l, F jS, o')); ?></p>
	</div>
	<?php endforeach; ?>