<div class="item_wrapper">
	<?php echo $button->link('Add A New User', '/users/add'); ?>
</div>

<?php foreach($users as $user) : ?>
<div class="item_wrapper">
	<h2><?php echo $user['Profile']['first_name'] . ' ' . $user['Profile']['last_name']; ?></h2>
	<h4><a href="/users/edit/<?php echo $user['User']['id']; ?>">Edit</a> | <a href="/users/delete/<?php echo $user['User']['id']; ?>">Delete</a></h4>
</div>
<?php endforeach; ?>