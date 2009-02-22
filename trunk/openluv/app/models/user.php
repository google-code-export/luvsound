<?php
class User extends AppModel {
	var $name = 'User';
	var $belongsTo = array(
			'Group' => array('className' => 'Group',
								'foreignKey' => 'group_id'
			), 
			'Artist' => array('className' => 'Artist',
								'foreignKey' => 'artist_id'
			)
	);
	
	var $hasOne = array(
			'Profile' => array('className' => 'Profile',
								'foreignKey' => 'user_id',
								'dependent' => true
			)
	);

	var $actsAs = array('Acl' => array('requester'));
	
	function getUsers($number){
		$users = $this->find('all', array('limit'=>$number));		
		return $users;
	}
	
	function getUserByUsername($username){
		if($user = $this->find('first', array('conditions'=>array('username'=>$username)))){
			return $user;
		} else {
			return false;
		}
	}
	
	function makeSecretCode($user){
		$data['Profile']['secret_code'] = AuthComponent::password($user['User']['id'] . time());
		$data['Profile']['secret_code_expires'] = time() + (60 * 60 * 24);
		$this->Profile->id = $this->Profile->getIdByUserId($user['User']['id']);
		
		if($this->Profile->save($data)) {
			return $data['Profile']['secret_code'];
		} else {
			return false;
		}
	}
	
	function checkSecretCode($user_id, $secret_code) {
		$user = $this->findById($user_id);
		if($secret_code == $user['Profile']['secret_code'] && time() < $user['Profile']['secret_code_expires']) {
			return true;
		} else {
			return false;
		}
	}

	function parentNode() {
	    if (!$this->id && empty($this->data)) {
	        return null;
	    }
	    $data = $this->data;
	    if (empty($this->data)) {
	        $data = $this->read();
	    }
	    if (!$data['User']['group_id']) {
	        return null;
	    } else {
	        return array('Group' => array('id' => $data['User']['group_id']));
	    }
	}
}
?>