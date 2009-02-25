<?php
class Item extends AppModel {
	var $name = 'Item';
	
	var $belongsTo = array(
			'Release' => array('className' => 'Release',
								'foreignKey' => 'release_id'
			)
	);
	
	function getItems($number, $group){
		// Only show admins all items
		if($group == 1) {
			$items = $this->find('all', array('limit'=>$number, 'order'=>array('Item.luv_id DESC')));
		} else {
			$items = $this->find('all', array('limit'=>$number, 'conditions'=>array('Item.visible'=>1), 'order'=>array('Item.luv_id DESC')));
		}

		return $items;
	}
	
	function getNewestItem(){
		$item = $this->find('first', array('limit'=>1, 'conditions'=>array('Item.visible'=>1), 'order'=>array('Item.luv_id DESC')));		
		return $item;
	}
}
?>