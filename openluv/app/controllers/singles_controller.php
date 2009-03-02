<?php
	class SinglesController extends AppController {
		var $name = 'Singles';
		var $uses = array('Single');
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
			$this->pageTitle = 'luvsound: singles';
			$singles = $this->Single->getSingles(50, $this->Auth->user('group_id'));
			$this->set('singles', $singles);
		}
		
		function view($id){
			$this->layout = 'default';
			
			$single = $this->Single->findById($id);
			$this->set('single', $single);
			$this->set('id', $id);
		}
		
		function add() {
			$this->layout = 'admin';
			if($this->data) {
				if($this->Single->save($this->data)){
					$this->Session->setFlash('Single created.');
					$this->redirect('/singles/index');
				} else {
					$this->Session->setFlash('Could not create single.');
					$this->redirect('/singles/index');
				}
			} 
			
			$artists = $this->Single->Artist->find('list');
			$this->set('artists', $artists);
		}
		
		function edit($id) {
			$this->layout = 'admin';
			if($this->data) {
				$this->Single->id = $id;
				if($this->Single->save($this->data)){
					$this->Session->setFlash('Single saved.');
					$this->redirect('/singles/index');
				} else {
					$this->Session->setFlash('Could not save single.');
					$this->redirect('/singles/index');
				}
			} 
			
			$artists = $this->Single->Artist->find('list');
			$this->set('artists', $artists);
			$single = $this->Single->findById($id);
			$this->set('single', $single);
			$this->set('id', $id);
		}
		
		function delete($id){
			$this->layout = 'none';
			if($this->Single->del($id, true)) {
				$this->Session->setFlash('Single deleted.');
				$this->redirect('/singles/index');
			}
		}
	}
?>