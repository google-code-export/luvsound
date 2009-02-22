<div class="item_wrapper">
	<?php echo $form->create('Group', array('action' => 'add'));?>
		<?php echo $form->input('Group.name', array('label'=>'Group name')); ?>
		<?php echo $button->make('Add', 'Add this group.'); ?>
	</form>
</div>