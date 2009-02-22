<?php
	class ReleasesController extends AppController {
		var $name = 'Releases';
		var $uses = array('Release', 'Photo');
		var $helpers = array('Html', 'Form', 'Javascript', 'Time', 'Fck');
		var $components = array('Flickr');
		
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
			$releases = $this->Release->getReleases(50, $this->Auth->user('group_id'));
			$this->set('releases', $releases);
		}
		
		function view($id){
			$this->layout = 'default';
			$this->set('disable_twitter', true); // Disable twitter for release pages.
			
			$release = $this->Release->getReleaseByCatalogId($id);
			$photos = $this->Photo->getPhotosByReleaseId($release['Release']['id']);
			
			$this->set('photos', $photos);
			$this->set('release', $release);			
		}
		
		function add() {
			$this->layout = 'admin';
			if($this->data) {
				if($this->Release->save($this->data)){
					// Grab photos from flickr and save them in the database
					$release = $this->Release->findById($id);
					$photos_url = $this->flickr->urls_getUserPhotos('54286115@N00');
					$photos = $this->flickr->photos_search(array('54286115@N00', 'tags'=>$release['Release']['luv_id']));
					
					foreach ($photos['photo'] as $photo) {
						$p = array();
						$p['Photo']['release_id'] = $release['Release']['id'];
						$p['Photo']['luv_id'] = $release['Release']['luv_id'];
						$p['Photo']['link'] = $photos_url . $photo['id'];
						$p['Photo']['src'] = $this->flickr->buildPhotoURL($photo, "Square");
						if(!$this->Photo->getPhotoByLink($p['Photo']['link'])){
							$this->Photo->create();
							$this->Photo->save($p);
						}
					}
					
					$this->Session->setFlash('Release created.');
					$this->redirect('/releases/index', null, true);
				} else {
					$this->Session->setFlash('Could not create release.');
					$this->redirect('/releases/index', null, true);
				}
			} 
			
			$artists = $this->Release->Artist->find('list');
			$this->set('artists', $artists);
		}
		
		function edit($id) {
			// Artists can only edit their own releases
			if($this->Auth->user('group_id')==3 && $this->Auth->user('artist_id')!==$id){
				$this->Session->setFlash('That isn\'t yours!');
				$this->redirect('/releases/index');
			}
			
			$this->layout = 'admin';
			if($this->data) {
				$this->layout = 'none';
				$this->Release->id = $id;
				if($this->Release->save($this->data)){
					// Grab photos from flickr and save them in the database
					$release = $this->Release->findById($id);
					$photos_url = $this->flickr->urls_getUserPhotos('54286115@N00');
					$photos = $this->flickr->photos_search(array('54286115@N00', 'tags'=>$release['Release']['luv_id']));
					
					foreach ($photos['photo'] as $photo) {
						$p = array();
						$p['Photo']['release_id'] = $release['Release']['id'];
						$p['Photo']['luv_id'] = $release['Release']['luv_id'];
						$p['Photo']['link'] = $photos_url . $photo['id'];
						$p['Photo']['src'] = $this->flickr->buildPhotoURL($photo, "Square");
						if(!$this->Photo->getPhotoByLink($p['Photo']['link'])){
							$this->Photo->create();
							$this->Photo->save($p);
						}
					}
					
					$this->Session->setFlash('Release saved.');
					// Retarded workaround for a retarded problem...
					header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/releases/index' );
					exit();
				} else {
					$this->Session->setFlash('Could not save release.');
					$this->redirect('/releases/index', null, true);
				}
			} 
			
			$release = $this->Release->findById($id);
			$artists = $this->Release->Artist->find('list');
			$this->set('artists', $artists);
			$this->set('release', $release);
			$this->set('id', $id);
		}
		
		function delete($id){
			$this->layout = 'none';
			if($this->Release->del($id, true)) {
				$this->Session->setFlash('Release deleted.');
				$this->redirect('/releases/index', null, true);
			}
		}
	}
?>