<div class="item_wrapper">
	<?php echo $form->create('Item', array('action' => 'edit/'.$id));?>
		<fieldset>
		<?php
			echo $form->input('name', array('label'=>'Item Title', 'value'=>$item['Item']['name']));
			echo $form->input('luv_id', array('label'=>'Catalog ID (IE: luv005)', 'value'=>$item['Item']['luv_id']));
			echo $form->input('url', array('label'=>'Direct link to flickr image - small size: 240 pixels wide.', 'value'=>$item['Item']['url']));
			echo $form->input('release_id', array('label'=>'Release', 'value'=>$item['Item']['release_id']));
			echo $form->input('description', array('label'=>'Item Description. Keep it twitter-length please. 160 characters max.', 'value'=>$item['Item']['description']));
			echo $form->input('paypal_button', array('label'=>'Paypal button code.', 'value'=>$item['Item']['paypal_button']));
		?>
		<?php echo $checkbox->make($item['Item']['visible'], 'Item', 'visible', 'Visible (When checked this is published to the site.)'); ?>
		</fieldset>
		<?php echo $button->make('Save', 'Save this item.'); ?>
	</form>
</div>