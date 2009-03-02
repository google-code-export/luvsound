<?php
	class ArtistsController extends AppController {
		var $name = 'Artists';
		var $uses = array('Artist');
		var $helpers = array('Html', 'Form', 'Javascript', 'Time', 'Fck');
		
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
			$this->pageTitle = 'luvsound: artists';
			$artists = $this->Artist->getArtists(50);
			$this->set('artists', $artists);
		}
		
		function view($id){
			$this->layout = 'default';
			
			$artist = $this->Artist->findById($id);
			$this->set('artist', $artist);
			$this->set('id', $id);			
		}
		
		function add() {
			$this->layout = 'admin';
			if($this->data) {
				if($this->Artist->save($this->data)){
					$this->Session->setFlash('Artist created.');
					$this->redirect('/artists/index');
				} else {
					$this->Session->setFlash('Could not create artist.');
					$this->redirect('/artists/index');
				}
			}
		}
		
		function edit($id) {
			// Artists can only edit their own information
			if($this->Auth->user('group_id')==3 && $this->Auth->user('artist_id')!==$id){
				$this->Session->setFlash('That isn\'t you!');
				$this->redirect('/artists/index');
			}
			
			$this->layout = 'admin';
			if($this->data) {
				$this->Artist->id = $id;
				if($this->Artist->save($this->data)){
					$this->Session->setFlash('Artist saved.');
					$this->redirect('/artists/index');
				} else {
					$this->Session->setFlash('Could not save artist.');
					$this->redirect('/artists/index');
				}
			} 
			
			$artist = $this->Artist->findById($id);
			$this->set('artist', $artist);
			$this->set('id', $id);
		}
		
		function delete($id){
			$this->layout = 'none';
			if($this->Artist->del($id, true)) {
				$this->Session->setFlash('Artist deleted.');
				$this->redirect('/artists/index');
			}
		}
	}
?>