<div class="item_wrapper">
	<?php echo $form->create('Single', array('action' => 'add'));?>
		<fieldset>
		<?php
			echo $form->input('name', array('label'=>'Single Title'));
			echo $form->input('luv_id', array('label'=>'Catalog ID (IE: luvs005)'));
			echo $form->input('url', array('label'=>'URL - direct archive.org mp3 download link.'));
			echo $form->input('artist_id', array('label'=>'Did you remember to <a href="/artists/add">add this artist</a> first?'));
			echo $form->input('description', array('label'=>'Single Description. Keep it twitter-length please. 160 characters max.'));
		?>
			<div class="input">
				<label for="visible">Leave this unchecked if you don't want this to be published right away!</label>
				<input id="visible" type="checkbox" value="1" name="data[Single][visible]"/>               
				Visible 
			</div>
		</fieldset>
		<?php echo $button->make('Add', 'Add this single.'); ?>
	</form>
</div>