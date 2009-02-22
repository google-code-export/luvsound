<div class="users form">
	<?php
		if ($session->check('Message.auth')) $session->flash('auth');
		echo $form->create('User', array('action' => 'login'));
	?>

	<fieldset>
		<?php
			echo $form->input('username', array('label'=>'E-mail Address'));
			echo $form->input('password');
		?>
		<div class="input">     
			<input id="remMe" type="checkbox" value="1" name="data[User][remember_me]"/>               
			Remember me 
		</div>
	</fieldset>

	<?php echo $button->make('Login', 'Login to this website.'); ?>
	<?php echo $button->link('Forgot Password', '/users/forgot_password'); ?>
	</form>
</div>