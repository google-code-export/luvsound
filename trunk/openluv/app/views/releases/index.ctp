</div>

<div id="center_column">
	<?php if($session->read('Auth.User.group_id')==1) : ?>
	<div class="item_wrapper">
		<?php echo $button->link('Add A New Release', '/releases/add'); ?>
	</div>
	<?php endif; ?>

	<?php foreach($releases as $release) : ?>
	<div class="item_wrapper release">
		<div style="background-image: url('<?php echo $release['Release']['cover']; ?>');">
			&nbsp;
		</div>
		<h2><a href="/releases/view/<?php echo $release['Release']['luv_id']; ?>">&nbsp;<?php echo $release['Release']['name']; ?>&nbsp;</a>&nbsp;<?php echo $release['Release']['luv_id']; ?>&nbsp;</h2>
		<?php if($session->read('Auth.User.group_id')==1) : ?>
		<h4><a href="/releases/edit/<?php echo $release['Release']['id']; ?>">Edit</a> | <a href="/releases/delete/<?php echo $release['Release']['id']; ?>">Delete</a></h4>
		<?php endif; ?>
		
		<?php if($session->read('Auth.User.group_id')==3 && $session->read('Auth.User.artist_id')==$release['Release']['artist_id']) : ?>
		<h4><a href="/releases/edit/<?php echo $release['Release']['id']; ?>">Edit</a></h4>
		<?php endif; ?>

		<h3>by <?php echo $release['Artist']['name']; ?></h3>
	</div>
	<?php endforeach; ?>