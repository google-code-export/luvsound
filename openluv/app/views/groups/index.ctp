<div class="item_wrapper">
	<?php echo $button->link('Add A New Group', '/groups/add'); ?>
</div>

<?php foreach($groups as $group) : ?>
<div class="item_wrapper">
	<h2><?php echo $group['Group']['name']; ?></h2>
	<hr/>
	<h4><a href="/groups/edit/<?php echo $group['Group']['id']; ?>">Edit</a> | <a href="/groups/delete/<?php echo $group['Group']['id']; ?>">Delete</a></h4>
</div>
<?php endforeach; ?>