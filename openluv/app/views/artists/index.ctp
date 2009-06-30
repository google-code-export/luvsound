<p>Artist Index</p>
<?php foreach($artists as $artist) : ?>
<p><a href="#artist<?php echo $artist['Artist']['id']; ?>"><?php echo $artist['Artist']['name']; ?></a></p>
<?php endforeach; ?>
</div>
<div id="center_column">
	<?php if($session->read('Auth.User.group_id')==1) : ?>
	<div class="item_wrapper">
		<?php echo $button->link('Add A New Artist', '/artists/add'); ?>
	</div>
	<?php endif; ?>

	<?php foreach($artists as $artist) : ?>
	<a name="artist<?php echo $artist['Artist']['id']; ?>"></a>
	<div class="item_wrapper artist">
		<h2><a href="<?php echo $artist['Artist']['url']; ?>"><?php echo $artist['Artist']['name']; ?></a></h2>
		<h3>from <?php echo $artist['Artist']['location']; ?></h3>
		<?php echo $artist['Artist']['bio']; ?>
		<?php if($session->read('Auth.User.group_id')==1) : ?>
		<h4><a href="/artists/edit/<?php echo $artist['Artist']['id']; ?>">Edit</a> | <a href="/artists/delete/<?php echo $artist['Artist']['id']; ?>">Delete</a></h4>
		<?php endif; ?>
		
		<?php if($session->read('Auth.User.group_id')==3 && $session->read('Auth.User.artist_id')==$artist['Artist']['id']) : ?>
		<h4><a href="/artists/edit/<?php echo $artist['Artist']['id']; ?>">Edit</a></h4>
		<?php endif; ?>
	</div>
	<?php endforeach; ?>
