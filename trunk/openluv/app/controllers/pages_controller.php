<?php
	class PagesController extends AppController {
		var $name = 'Pages';
		var $uses = array('Page', 'Release', 'Single');
		var $helpers = array('Html', 'Form', 'Javascript', 'Time');
		
		function beforeFilter() {
			parent::beforeFilter();	
			$this->Auth->allowedActions = array('index');
		}
		
		function index(){
			$release = $this->Release->getNewestRelease();
			$single = $this->Single->getNewestSingle();
			$this->set('release', $release);
			$this->set('single', $single);
		}
		
	}
?>