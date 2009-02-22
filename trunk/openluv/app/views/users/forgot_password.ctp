<?php $javascript->link(array('jquery', 'jquery.validate', 'jquery.validate.rules', 'additional-methods'), false); ?>

<div class="item_wrapper">
	<?php echo $form->create('User', array('action' => 'forgot_password')); ?>

	<fieldset>
		<div class="item_wrapper">
			<h3>Forgot Password</h3>
			<h4>Please enter your email address below and we will send you instructions on 
			recovering your password.</h4>
		</div>
		<?php echo $form->input('username', array('label'=>'E-mail Address', 'class'=>'email required', 'remote'=>'/users/check/username')); ?>
	</fieldset>

	<?php echo $button->make('Send', 'Send a password recovery request.'); ?>
	</form>
</div>