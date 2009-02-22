<?php
	class AppController extends Controller {
		var $components = array('Acl', 'Auth', 'Session', 'Email');
		var $helpers = array('Button', 'Debug');
		
		public $pageTitle = "LuvSound";
		
		function beforeFilter() {
			$this->Auth->authorize = 'actions';
			$this->Auth->loginAction = array('controller'=>'users', 'action'=>'login');
			$this->Auth->logoutRedirect = array('controller'=>'users', 'action'=>'login');
			$this->Auth->loginRedirect = array('controller'=>'admin', 'action'=>'index');
			$this->Auth->autoRedirect = false; // So we can set some cookie info.
		}
		
		function __sendEmail($options) {
			// Check we have the essential variables set.
    		if(!empty($options['Email']['to']) && !empty($options['Email']['subject']) && !empty($options['Email']['template'])) {
    			$this->Email->to = $options['Email']['to'];
    			$this->Email->subject = $options['Email']['subject'];
    			$this->Email->replyTo = 'noreply@luvsound.org';
    			$this->Email->from = 'IPRO <noreply@luvsound.org>';
    			$this->Email->template = $options['Email']['template'];
    			$this->set('options', $options);
    			
        		if ($this->Email->send()) {
    				return true;
    			} else {
    				$this->__logError('__sendEmail', 'Email failed to send.');
    				return false;
    			}
    		} else {
    			$this->__logError('__sendEmail', 'Incorrect or insufficient options passed.');
				return false;
    		}
    	}
    	
		function __logError($name, $args = ''){
			// Note the IP, Cookie and Session state
			$ip = $_SERVER['REMOTE_ADDR'];
			if (isset($_SESSION)){		
				ob_start();
				debug($_SESSION);
				$session = ob_get_contents();
				ob_end_clean();
			} else {
				$session = "No session information available";
			}
			if (isset($args)){		
				ob_start();
				debug($args);
				$args = ob_get_contents();
				ob_end_clean();
			} else {
				$session = "No session information available";
			}
			$this->log("[" . $ip . "]" . $name . "[ARGS]" . $args . "[SESSION]" . $session . " ENDERROR");
		}
	}
?>