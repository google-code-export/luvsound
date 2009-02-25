<?php
class Release extends AppModel {
	var $name = 'Release';
	
	var $belongsTo = array(
			'Artist' => array('className' => 'Artist',
								'foreignKey' => 'artist_id'
			)
	);
	
	var $hasOne = array(
			'Item' => array('className' => 'Item',
								'foreignKey' => 'release_id',
								'dependent' => false
			)
	);
	
	function getReleases($number, $group){
		// Only show artists and admins all releases
		if($group == 1 || $group == 3) {
			$releases = $this->find('all', array('limit'=>$number, 'order'=>array('Release.luv_id DESC')));
		} else {
			$releases = $this->find('all', array('limit'=>$number, 'conditions'=>array('Release.visible'=>1), 'order'=>array('Release.luv_id DESC')));
		}
				
		return $releases;
	}
	
	function getNewestRelease(){
		$release = $this->find('first', array('limit'=>1, 'conditions'=>array('Release.visible'=>1), 'order'=>array('Release.luv_id DESC')));		
		return $release;
	}
	
	function getReleaseByCatalogId($id){
		$release = $this->find('first', array('conditions'=>array('Release.luv_id'=>$id)));		
		return $release;
	}
}
?>