<?php
	class ItemsController extends AppController {
		var $name = 'Items';
		var $uses = array('Item');
		var $helpers = array('Html', 'Form', 'Javascript', 'Time', 'Checkbox');
		
		function beforeFilter() {
			parent::beforeFilter();
			if(ACL_SECURITY_ENABLED == 0){
				$this->Auth->allowedActions = array('*');
			} else {
				$this->Auth->allowedActions = array('index', 'view');
			}
		}
		
		function index(){
			$this->layout = 'default';
			$items = $this->Item->getItems(50, $this->Auth->user('group_id'));
			$this->set('items', $items);
		}
		
		function view($id){
			$this->layout = 'default';
			
			$item = $this->Item->findById($id);
			$this->set('item', $item);
			$this->set('id', $id);
		}
		
		function add() {
			$this->layout = 'admin';
			if($this->data) {
				if($this->Item->save($this->data)){
					$this->Session->setFlash('Item created.');
					$this->redirect('/items/index');
				} else {
					$this->Session->setFlash('Could not create item.');
					$this->redirect('/items/index');
				}
			} 
			
			$releases = $this->Item->Release->find('list');
			$this->set('releases', $releases);
		}
		
		function edit($id) {
			$this->layout = 'admin';
			if($this->data) {
				$this->Item->id = $id;
				if($this->Item->save($this->data)){
					$this->Session->setFlash('Item saved.');
					$this->redirect('/items/index');
				} else {
					$this->Session->setFlash('Could not save item.');
					$this->redirect('/items/index');
				}
			} 
			
			$releases = $this->Item->Release->find('list');
			$this->set('releases', $releases);
			$item = $this->Item->findById($id);
			$this->set('item', $item);
			$this->set('id', $id);
		}
		
		function delete($id){
			$this->layout = 'none';
			if($this->Item->del($id, true)) {
				$this->Session->setFlash('Item deleted.');
				$this->redirect('/items/index');
			}
		}
	}
?>