<?php
class Video extends AppModel {
	var $name = 'Video';
	
	function getVideos($number, $group){
		// Only show artists and admins all releases
		if($group == 1 || $group == 3) {
			$videos = $this->find('all', array('limit'=>$number, 'order'=>array('Video.created DESC')));
		} else {
			$videos = $this->find('all', array('limit'=>$number, 'conditions'=>array('Video.visible'=>1), 'order'=>array('Video.created DESC')));
		}
				
		return $releases;
	}
	
	function getNewestVideo(){
		$video = $this->find('first', array('limit'=>1, 'conditions'=>array('Video.visible'=>1), 'order'=>array('Video.created DESC')));		
		return $video;
	}
}
?>