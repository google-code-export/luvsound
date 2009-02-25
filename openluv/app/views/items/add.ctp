<div class="item_wrapper">
	<?php echo $form->create('Item', array('action' => 'add'));?>
		<fieldset>
		<?php
			echo $form->input('name', array('label'=>'Item Title'));
			echo $form->input('luv_id', array('label'=>'Catalog ID (IE: luv005)'));
			echo $form->input('url', array('label'=>'Direct link to flickr image - small size: 240 pixels wide.'));
			echo $form->input('release_id', array('label'=>'Did you remember to <a href="/releases/add">add this release</a> first?'));
			echo $form->input('description', array('label'=>'Item Description. Keep it twitter-length please. 160 characters max.'));
			echo $form->input('paypal_button', array('label'=>'Paypal button code.'));
		?>
			<div class="input">
				<label for="visible">Leave this unchecked if you don't want this to be published right away!</label>
				<input id="visible" type="checkbox" value="1" name="data[Item][visible]"/>               
				Visible 
			</div>
		</fieldset>
		<?php echo $button->make('Add', 'Add this item.'); ?>
	</form>
</div>