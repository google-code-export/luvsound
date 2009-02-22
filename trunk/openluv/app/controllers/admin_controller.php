<?php
	class AdminController extends AppController {
		var $name = 'Admin';
		var $uses = array('Page');
		var $helpers = array('Html', 'Form', 'Javascript', 'Time');
		
		function beforeFilter() {
			parent::beforeFilter();
			if(ACL_SECURITY_ENABLED == 0){
				$this->Auth->allowedActions = array('*');
			} else {
				$this->Auth->allowedActions = array();
			}
		}
		
		function index(){
			$this->layout = 'admin';
			$this->set('disable_twitter', true); // Disable twitter 
		}		
	}
?>