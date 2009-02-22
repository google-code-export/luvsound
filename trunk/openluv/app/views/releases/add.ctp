<?php $javascript->link(array('fckeditor/fckeditor.js'), false); ?>

<div class="item_wrapper">
	<?php echo $form->create('Release', array('action' => 'add'));?>
		<fieldset>
		<?php
			echo $form->input('name', array('label'=>'Release Title'));
			echo $form->input('luv_id', array('label'=>'Catalog ID (IE: luv019)'));
			echo $form->input('artist_id');
		?>
		<div class="input">
			<label>Release Description</label>
			<?php echo $fck->input('Release.description'); ?>
		</div>
			
		<div class="input">
			<label>Tracklist</label>
			<p>Please add tracks as a numbered list, with track times in bold, immediately following track titles.  Use italics for additional headings.</p>
			<?php echo $fck->input('Release.tracks'); ?>
		</div>
		
		<?php
			echo $form->input('cover', array('label'=>'Cover Art'));
			echo $form->input('download', array('label'=>'Zip download link'));
		?>
		</fieldset>
		<?php echo $button->make('Add', 'Add this release.'); ?>
	</form>
</div>