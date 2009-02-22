<?php $javascript->link('jquery', false); ?>
<?php //$javascript->link('jquery.validate', false); ?>
<?php //$javascript->link('jquery.validate.rules', false); ?>
<?php //$javascript->link('additional-methods', false); ?>
<div class="item_wrapper">
	<?php echo $form->create('User', array('action' => 'add'));?>
		<fieldset>
		<?php
			echo $form->input('username', array('label'=>'E-Mail Address (This will be your username)'));
			echo $form->input('Profile.first_name', array('label'=>'First Name'));
			echo $form->input('Profile.last_name', array('label'=>'Last Name'));
			echo $form->input('password');
			echo $form->input('password_confirm', array('type'=>'password'));
			echo $form->input('group_id');
			//echo $form->input('artist_id');
		?>
		</fieldset>
		<?php echo $button->make('Add', 'Add this user.'); ?>
	</form>
</div>