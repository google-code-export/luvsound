<?php
class Single extends AppModel {
	var $name = 'Single';
	
	var $belongsTo = array(
			'Artist' => array('className' => 'Artist',
								'foreignKey' => 'artist_id'
			)
	);
	
	function getSingles($number, $group){
		// Only show admins all singles
		if($group == 1) {
			$singles = $this->find('all', array('limit'=>$number, 'order'=>array('luv_id DESC')));
		} else {
			$singles = $this->find('all', array('limit'=>$number, 'conditions'=>array('visible'=>1), 'order'=>array('luv_id DESC')));
		}

		return $singles;
	}
	
	function getNewestSingle(){
		$single = $this->find('first', array('limit'=>1, 'conditions'=>array('visible'=>1), 'order'=>array('luv_id DESC')));		
		return $single;
	}
}
?>