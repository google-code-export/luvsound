<div class="item_wrapper">
	<?php echo $form->create('User', array('action' => 'reset_password/'.$user_id.'/'.$secret_code)); ?>

	<fieldset>
		<div class="item_wrapper">
			<h3>Reset Password</h3>
			<h4>You may enter a new password below.  Be sure to carefully write it down so you don't forget it!</h4>
		</div>
		<?php echo $form->input('password'); ?>	
		<?php echo $form->input('password_confirm', array('type'=>'password')); ?>
		<?php echo $form->input('user_id', array('type'=>'hidden', 'value'=>$user_id)); ?>
	</fieldset>

	<?php echo $button->make('Reset', 'Reset your password.'); ?>
	</form>
</div>