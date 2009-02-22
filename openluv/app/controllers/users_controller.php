<?php
	class UsersController extends AppController {
		var $name = 'Users';
		var $uses = array('User', 'Group', 'Profile');
		var $helpers = array('Html', 'Form', 'Javascript', 'Time');
		var $components = array('Cookie');
		
		function beforeFilter() {
			parent::beforeFilter();
			if(ACL_SECURITY_ENABLED == 0){
				$this->Auth->allowedActions = array('*');
			} else {
				$this->Auth->allowedActions = array('view', 'register', 'logout', 'check', 'forgot_password', 'reset_password');
			}
		}
		
		function index(){
			$this->layout = 'admin';
			$this->set('disable_twitter', true); // Disable twitter 
			$users = $this->User->getUsers(50);
			$this->set('users', $users);
			$this->set('group_id', $this->Auth->user('group_id'));
		}
		
		function view($id){
			$this->layout = 'default';
			$user = $this->User->findById($id);
			$this->set('user', $user);			
		}
		
		function add() {
			$this->layout = 'admin';
			$this->set('disable_twitter', true); // Disable twitter 
			if($this->data) {
				if($this->User->save($this->data)){
					$this->data['Profile']['user_id'] = $this->User->id;
					if($this->Profile->save($this->data)){
						$this->Session->setFlash('User created.');
					} else {
						$this->Session->setFlash('Could not create user.');
					}
					$this->redirect('/users/index');
				} else {
					$this->Session->setFlash('Could not create user.');
					$this->redirect('/users/index');
				}
			} 
			
			$groups = $this->User->Group->find('list');
			$this->set('groups', $groups);
			$artists = $this->User->Artist->find('list');
			$this->set('artists', $artists);
		}
		
		function edit($id) {
			// Users can only edit their own account
			if($this->Auth->user('group_id')<1 && $this->Auth->user('user_id')!==$id){
				$this->Session->setFlash('This isn\'t you!');
				$this->redirect('/');
			}
			
			$this->layout = 'admin';
			$this->set('disable_twitter', true); // Disable twitter 
			if($this->data) {
				$this->User->id = $id;
				if($this->User->save($this->data)){
					$this->Profile->id = $this->Profile->getIdByUserId($id);
					if($this->Profile->save($this->data)){
						$this->Session->setFlash('User saved.');
					} else {
						$this->Session->setFlash('Could not save user.');
					}
					$this->redirect('/');
				} else {
					$this->Session->setFlash('Could not save user.');
					$this->redirect('/');
				}
			} 
			
			$user = $this->User->findById($id);
			$groups = $this->User->Group->find('list');
			$artists = $this->User->Artist->find('list');
			$this->set('groups', $groups);
			$this->set('artists', $artists);
			$this->set('user', $user);
			$this->set('id', $id);
		}
		
		function delete($id){
			$this->layout = 'none';
			if($this->User->del($id, true)) {
				$this->Session->setFlash('User deleted.');
				$this->redirect('/users/index');
			}
		}
		
		function check(){
	    	$this->layout = "none";
			Configure::write('debug', 0);
			if ($this->User->find('first', array('conditions'=>array('username'=>$this->params['url']['data']['User']['username'])))){
				$this->set("check", "false");
				return false;
			} else {
				$this->set("check", "true");
				return true;
			}
	    }
		
		function register() {
			$this->layout = 'admin';
			$this->set('disable_twitter', true); // Disable twitter 
			if($this->data) {
				if($this->User->save($this->data)){
					$this->data['Profile']['user_id'] = $this->User->id;
					if($this->Profile->save($this->data)){
						$this->Session->setFlash('Account created, you may now login.');
					} else {
						$this->Session->setFlash('Could not create account.');
					}
					$this->redirect('/');
				} else {
					$this->Session->setFlash('Could not create account.');
					$this->redirect('/users/login');
				}
			} 
		}
		
		function login(){
			$this->layout = 'admin';
			$this->set('disable_twitter', true); // Disable twitter 
			
			if($this->Auth->user()){
				// Check for remember me
				if (isset($this->data['User']['remember_me']) && $this->data['User']['remember_me']){
					$this->Cookie->write('Auth.User', $this->Auth->user("id"));
				} 
				
				// Redirect after login based on group association
				switch($this->Auth->user('group_id')){
					case 1: 
						$this->redirect("/admin/");
						break;
					case 2: 
						$this->redirect("/");
						break;
					case 3: 
						$this->redirect("/artists/");
						break;
				}
			}
		}
		
		function logout(){
			$this->Session->setFlash('Bye!');
	        $this->Session->destroy();
	        $this->Cookie->destroy();
	        $this->Auth->logout();
		    $this->redirect('/users/login');
		}
		
		function forgot_password() {
			$this->set('disable_twitter', true); // Disable twitter 
			
			// Kick user back to wherever they were if they are already logged in.
		    if($this->Session->read("Auth.User.id")){
				$this->Session->setFlash("You are already logged in.");
				$this->redirect($this->referer());
    		}
    		
    		// Send a forgot password email.
    		if($this->data && $user = $this->User->getUserByUsername($this->data['User']['username'])) {
    			$options['Email']['secret_code'] = $this->User->makeSecretCode($user);
    			$options['Email']['user_id'] = $user['User']['id'];
    			$options['Email']['to'] = $user['User']['username'];
    			$options['Email']['subject'] = 'Forgot Password Request';
    			$options['Email']['template'] = 'forgot_password';

    			if($this->__sendEmail($options)) {
    				$this->Session->setFlash('Please check your email for instructions on recovering your password.');
					$this->redirect('/users/forgot_password');
    			} else {
    				$this->Session->setFlash('There was a problem sending your email, please try again.');
					$this->redirect('/users/forgot_password');
    			}
    		}
		}
		
		function reset_password() {
			$this->set('disable_twitter', true); // Disable twitter 
			
			if(!empty($this->params['pass'])) {
				$user_id = $this->params['pass'][0];
				$secret_code = $this->params['pass'][1];
			
				// Check that the secret code has not expired.
				if($this->User->checkSecretCode($user_id, $secret_code)) {
					if($this->data) {
						$this->User->id = $user_id;
						$this->Profile->id = $this->Profile->getIdByUserId($user_id);
						$user['User']['password'] = AuthComponent::password($this->data['User']['password']);
						$profile['Profile']['secret_code_expires'] = 0; // Expire the reset password link.
						if($this->User->save($user) && $this->Profile->save($profile)) {
							$this->Session->setFlash("Password changed, you may now login with your new password.");
							$this->redirect('/users/login');
						} else {
							$this->Session->setFlash("Could not save password, please try again.");
							$this->redirect('/users/forgot_password');
						}
					}
				
					$this->set('user_id', $user_id);
					$this->set('secret_code', $secret_code);
				} else {
					$this->Session->setFlash("This link is no longer valid, you may make a new request below.");
					$this->redirect('/users/forgot_password');
				}
			} else {
				$this->Session->setFlash("This link is not valid, you may make a new request below.");
				$this->redirect('/users/forgot_password');
			}
		}
		
		function buildAcl() {
			$log = array();

			$aco =& $this->Acl->Aco;
			$root = $aco->node('controllers');
			if (!$root) {
				$aco->create(array('parent_id' => null, 'model' => null, 'alias' => 'controllers'));
				$root = $aco->save();
				$root['Aco']['id'] = $aco->id; 
				$log[] = 'Created Aco node for controllers';
			} else {
				$root = $root[0];
			}	

			App::import('Core', 'File');
			$dir = new Folder(CONTROLLERS);
			list($dirs, $Controllers) = $dir->ls();
			$baseMethods = get_class_methods('Controller');
			$baseMethods[] = 'buildAcl';

			// look at each controller in app/controllers
			foreach ($Controllers as $Controller) {
				if($Controller !== '.DS_Store'){
					$ctrlName = Inflector::camelize(substr($Controller, 0, strpos($Controller, 'controller') -1));

					App::import('Controller', $ctrlName);
					$ctrlclass = $ctrlName . 'Controller';
					$methods = get_class_methods($ctrlclass);

					// find / make controller node
					$controllerNode = $aco->node('controllers/'.$ctrlName);
					if (!$controllerNode) {
						$aco->create(array('parent_id' => $root['Aco']['id'], 'model' => null, 'alias' => $ctrlName));
						$controllerNode = $aco->save();
						$controllerNode['Aco']['id'] = $aco->id;
						$log[] = 'Created Aco node for '.$ctrlName;
					} else {
						$controllerNode = $controllerNode[0];
					}

					//clean the methods. to remove those in Controller and private actions.
					foreach ($methods as $k => $method) {
						if (strpos($method, '_', 0) === 0) {
							unset($methods[$k]);
							continue;
						}
						if (in_array($method, $baseMethods)) {
							unset($methods[$k]);
							continue;
						}
						$methodNode = $aco->node('controllers/'.$ctrlName.'/'.$method);
						if (!$methodNode) {
							$aco->create(array('parent_id' => $controllerNode['Aco']['id'], 'model' => null, 'alias' => $method));
							$methodNode = $aco->save();
							$log[] = 'Created Aco node for '. $method;
						}
					}
				}
			}
			debug($log);
		}
		
		function initDB() {
			$group =& $this->User->Group;

			$group->id = 1;		
			$this->Acl->allow($group, 'controllers');

			$group->id = 2;
			$this->Acl->deny($group, 'controllers');
			$this->Acl->allow($group, 'controllers/Pages');
			$this->Acl->allow($group, 'controllers/Users/edit');
			
			$group->id = 3;
			$this->Acl->deny($group, 'controllers');
			$this->Acl->allow($group, 'controllers/Pages');
			$this->Acl->allow($group, 'controllers/Artists/edit');
			$this->Acl->allow($group, 'controllers/Releases/edit');
			$this->Acl->allow($group, 'controllers/Users/edit');
		}
	}
?>