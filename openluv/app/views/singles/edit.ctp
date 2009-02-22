<div class="item_wrapper">
	<?php echo $form->create('Single', array('action' => 'edit/'.$id));?>
		<fieldset>
		<?php
			echo $form->input('name', array('label'=>'Single Title', 'value'=>$single['Single']['name']));
			echo $form->input('luv_id', array('label'=>'Catalog ID (IE: luvs005)', 'value'=>$single['Single']['luv_id']));
			echo $form->input('url', array('label'=>'URL - direct archive.org mp3 download link.', 'value'=>$single['Single']['url']));
			echo $form->input('artist_id', array('label'=>'Artist', 'value'=>$single['Single']['artist_id']));
			echo $form->input('description', array('label'=>'Single Description. Keep it twitter-length please. 160 characters max.', 'value'=>$single['Single']['description']));
		?>
		<?php echo $checkbox->make($single['Single']['visible'], 'Single', 'visible', 'Visible (When checked this is published to the live site.)'); ?>
		</fieldset>
		<?php echo $button->make('Save', 'Save this single.'); ?>
	</form>
</div>