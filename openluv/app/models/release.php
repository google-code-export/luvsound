<?php
class Release extends AppModel {
	var $name = 'Release';
	
	var $belongsTo = array(
			'Artist' => array('className' => 'Artist',
								'foreignKey' => 'artist_id'
			)
	);
	
	function getReleases($number, $group){
		// Only show artists and admins all releases
		if($group == 1 || $group == 3) {
			$releases = $this->find('all', array('limit'=>$number, 'order'=>array('luv_id DESC')));
		} else {
			$releases = $this->find('all', array('limit'=>$number, 'conditions'=>array('visible'=>1), 'order'=>array('luv_id DESC')));
		}
				
		return $releases;
	}
	
	function getNewestRelease(){
		$release = $this->find('first', array('limit'=>1, 'conditions'=>array('visible'=>1), 'order'=>array('luv_id DESC')));		
		return $release;
	}
	
	function getReleaseByCatalogId($id){
		$release = $this->find('first', array('conditions'=>array('luv_id'=>$id)));		
		return $release;
	}
}
?>