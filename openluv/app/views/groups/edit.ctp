<div class="item_wrapper">
	<?php echo $form->create('Group', array('action' => 'edit/'.$id));?>
		<?php echo $form->input('Group.name', array('label'=>'Group name', 'value'=>$group['Group']['name'])); ?>
		<?php echo $button->make('Edit', 'Edit this group.'); ?>
	</form>
</div>