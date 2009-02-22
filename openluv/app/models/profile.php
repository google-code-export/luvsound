<?php
class Profile extends AppModel {
	var $name = 'Profile';
	var $belongsTo = array(
			'User' => array('className' => 'User',
							'foreignKey' => 'user_id'
			)
	);
	
	function getIdByUserId($user_id){
		$profile = $this->find('first', array('conditions'=>array('user_id'=>$user_id)));
		return $profile['Profile']['id'];
	}
}
?>