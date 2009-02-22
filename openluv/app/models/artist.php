<?php
class Artist extends AppModel {
	var $name = 'Artist';
	
	var $hasMany = array(
			'Release' => array('className' => 'Release',
								'foreignKey' => 'artist_id',
								'dependent' => false
			), 
			'Single' => array('className' => 'Single',
								'foreignKey' => 'artist_id',
								'dependent' => false
			), 
			'User' => array('className' => 'User',
								'foreignKey' => 'artist_id',
								'dependent' => false
			)
	);
	
	function getArtists($number){
		$artists = $this->find('all', array('limit'=>$number, 'order'=>array('name ASC')));		
		return $artists;
	}
	
	function parentNode() {
	    if (!$this->id && empty($this->data)) {
	        return null;
	    }
	    $data = $this->data;
	    if (empty($this->data)) {
	        $data = $this->read();
	    }
	    if (!$data['Artist']['group_id']) {
	        return null;
	    } else {
	        return array('Group' => array('id' => $data['Artist']['group_id']));
	    }
	}
}
?>