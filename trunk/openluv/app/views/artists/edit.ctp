<?php $javascript->link(array('fckeditor/fckeditor.js'), false); ?>

<div class="item_wrapper">
	<?php echo $form->create('Artist', array('action' => 'edit/'.$id));?>
		<fieldset>
		<?php
			echo $form->input('name', array('label'=>'Name', 'value'=>$artist['Artist']['name']));

		?>
		<div class="input">
			<label>Artist Bio</label>
			<?php echo $fck->input('Artist.bio', '400', $artist['Artist']['bio']); ?>
		</div>
		
		<?php
			echo $form->input('location', array('label'=>'Location', 'value'=>$artist['Artist']['location']));
			echo $form->input('url', array('label'=>'Website', 'value'=>$artist['Artist']['url']));
		?>
		</fieldset>
		<?php echo $button->make('Edit', 'Edit this artist.'); ?>
	</form>
</div>