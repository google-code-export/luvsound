<?php if($session->read('Auth.User')) : ?>
<div id="user_menu">
	<ul>
		<li>
			<a href="/users/view/<?php echo $session->read('Auth.User.id'); ?>">Profile</a>
		</li>
		<?php if($session->read('Auth.User.group_id')==1) : ?>
		<li>
			<a href="/users/index">Manage Users</a>
		</li>
		<?php endif; ?>
		<li>
			<a href="/users/logout">Log Out</a>
		</li>
	</ul>
</div>
<?php endif; ?>