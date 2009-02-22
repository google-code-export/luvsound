<?php $javascript->link(array('fckeditor/fckeditor.js'), false); ?>

<div class="item_wrapper">
	<?php echo $form->create('Artist', array('action' => 'add'));?>
		<fieldset>
		<?php
			echo $form->input('name', array('label'=>'Name'));

		?>
		<div class="input">
			<label>Artist Bio</label>
			<?php echo $fck->input('Artist.bio'); ?>
		</div>
		
		<?php
			echo $form->input('location', array('label'=>'Location'));
			echo $form->input('url', array('label'=>'Website'));
		?>
		</fieldset>
		<?php echo $button->make('Add', 'Add this artist.'); ?>
	</form>
</div>