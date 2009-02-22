<?php $javascript->link(array('fckeditor/fckeditor.js'), false); ?>

<div class="item_wrapper">
	<?php echo $form->create('Release', array('action' => 'edit/'.$id));?>
		<fieldset>
		<?php
			echo $form->input('name', array('label'=>'Release Title', 'value'=>$release['Release']['name']));
			echo $form->input('luv_id', array('label'=>'Catalog ID (IE: luv019)', 'value'=>$release['Release']['luv_id']));
			echo $form->input('artist_id', array('value'=>$release['Release']['artist_id']));
		?>
		<div class="input">
			<label>Release Description</label>
			<?php echo $fck->input('Release.description', '400', $release['Release']['description']); ?>
		</div>
			
		<div class="input">
			<label>Tracklist</label>
			<p>Please add tracks as a numbered list, with track times in bold, immediately following track titles.  Use italics for additional headings.</p>
			<?php echo $fck->input('Release.tracks', '400', $release['Release']['tracks']); ?>
		</div>
		
		<?php
			echo $form->input('cover', array('label'=>'Cover Art', 'value'=>$release['Release']['cover']));
			echo $form->input('download', array('label'=>'Zip download link', 'value'=>$release['Release']['download']));
		?>
		</fieldset>
		<?php echo $button->make('Save and Rebuild Photo Associations', 'Edit this release.'); ?>
	</form>
</div>