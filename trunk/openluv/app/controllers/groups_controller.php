<?php
	class GroupsController extends AppController {
		var $name = 'Groups';
		var $uses = array('User', 'Group');
		var $helpers = array('Html', 'Form', 'Javascript', 'Time');
		
		function beforeFilter() {
			parent::beforeFilter();
			if(ACL_SECURITY_ENABLED == 0){
				$this->Auth->allowedActions = array('*');
			} else {
				$this->Auth->allowedActions = array();
			}
		}
		
		function index() {
			$this->layout = 'admin';
			$groups = $this->Group->find('all');
			$this->set('groups', $groups);
		}
		
		function add() {
			$this->layout = 'admin';
			if($this->data) {
				$this->Group->save($this->data);
				$this->Session->setFlash('Your group was created.');
				$this->redirect('/groups/index');
			}
		}
		
		function edit($id) {
			$this->layout = 'admin';
			if($this->data) {
				$this->Group->id = $id;
				if($this->Group->save($this->data)){
					$this->Session->setFlash('Group saved.');
					$this->redirect('/groups/index');
				} else {
					$this->Session->setFlash('Could not save group.');
					$this->redirect('/groups/index');
				}
			} 
			
			$group = $this->Group->findById($id);
			$this->set('group', $group);
			$this->set('id', $id);
		}
		
		function delete($id){
			$this->layout = 'none';
			if($this->Group->del($id)) {
				$this->Session->setFlash('Group deleted.');
				$this->redirect('/groups/index');
			}
		}
	}
?>