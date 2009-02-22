<?php $javascript->link('jquery', false); ?>
<?php //$javascript->link('jquery.validate', false); ?>
<?php //$javascript->link('jquery.validate.rules', false); ?>
<?php //$javascript->link('additional-methods', false); ?>
<div class="item_wrapper">
	<?php echo $form->create('User', array('action' => 'edit/'.$id));?>
		<fieldset>
		<?php
			echo $form->input('username', array('label'=>'E-Mail Address', 'value'=>$user['User']['username']));
			echo $form->input('Profile.first_name', array('label'=>'First Name', 'value'=>$user['Profile']['first_name']));
			echo $form->input('Profile.last_name', array('label'=>'Last Name', 'value'=>$user['Profile']['last_name']));
		?>
		<?php
			if($session->read('Auth.User.group_id')==1){
				//echo $form->input('group_id', array('label'=>'Group', 'value'=>$user['User']['group_id']));
				echo $form->input('artist_id', array('label'=>'Artist', 'value'=>$user['User']['artist_id']));
			}
		?>
		</fieldset>
		<?php echo $button->make('Edit', 'Edit this user.'); ?>
	</form>
</div>