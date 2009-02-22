</div>
<div id="center_column">
	<div class="item_wrapper artist">
		<h2><a href="mailto:<?php echo $user['User']['username']; ?>"><?php echo $user['Profile']['first_name'] . ' ' . $user['Profile']['last_name']; ?></a></h2>
		<h3>joined <?php echo $time->timeAgoInWords($user['User']['created'], array('format'=>'l, F jS, o')); ?></h3>
		<?php if($session->read('Auth.User.id')==$user['User']['id']) : ?>
		<h4><a href="/users/edit/<?php echo $user['User']['id']; ?>">Edit</a></h4>
		<?php endif; ?>
	</div>