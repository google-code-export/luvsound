<?php
	class PagesController extends AppController {
		var $name = 'Pages';
		var $uses = array('Page', 'Release', 'Single', 'Video');
		var $helpers = array('Html', 'Form', 'Javascript', 'Time');
		
		function beforeFilter() {
			parent::beforeFilter();	
			$this->Auth->allowedActions = array('index');
		}
		
		function index(){
			$release = $this->Release->getNewestRelease();
			$this->pageTitle = 'luvsound: New! ' . $release['Release']['name'] . ' by ' . $release['Artist']['name'];
			$single = $this->Single->getNewestSingle();
			$video = $this->Video->getNewestVideo();
			$this->set('release', $release);
			$this->set('single', $single);
			$this->set('video', $video);
		}
		
	}
?>