<?php
class Photo extends AppModel {
	var $name = 'Photo';
	
	var $belongsTo = array(
			'Release' => array('className' => 'Release',
								'foreignKey' => 'release_id'
			)
	);
	
	function getPhotos($number){
		$photos = $this->find('all', array('limit'=>$number, 'order'=>array('luv_id DESC')));
		return $photos;
	}
	
	function getPhotosByReleaseId($id){
		$photos = $this->find('all', array('conditions'=>array('release_id'=>$id)));
		return $photos;
	}
	
	function getPhotoByLink($link){
		if($photo = $this->find('first', array('conditions'=>array('link'=>$link)))){
			return $photo;
		} else {
			return false;
		}
	}
	
	function getNewestPhoto(){
		$photo = $this->find('first', array('limit'=>1, 'conditions'=>array('visible'=>1), 'order'=>array('luv_id DESC')));		
		return $photo;
	}
}
?>