<?php
class PostsController extends AppController {
	var $name = 'Posts';
	var $components = array('Auth','Session','Security');  
   	var $paginate = array(
         'limit' => 5,
         'order' => array(
            'Post.modified' => 'desc'
         )
        );


	function beforeFilter()  
	{  
		App::import('Sanitize');
		//$this->Auth->allow('index', 'view');  
		$this->Auth->authError = '不正なろぐいんです。';
		$this->Auth->logoutRedirect = array(Configure::read('Routing.admin') => false, 'controller' => 'posts', 'action' => 'index');
		$this->Security->requireAuth();
		$this->Security->blackHoleCallback = 'error';
		$this->set('user',$this->Auth->user()); 
		$this->set('auth',$this->Auth); 
	 	$this->set('title_for_layout', '私的なブログ');
		
	} 

	function index() {
		$this->Post->recursive = 0;
		$this->__sanitize();
		$this->set('posts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->__sanitize();
		$this->set('post', $this->Post->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Post->create();
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(__('The post has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->__sanitize();
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(__('The post has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->__sanitize();
			$this->data = $this->Post->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for post', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Post->delete($id)) {
			$this->Session->setFlash(__('Post deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Post was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function logout() {
		$this->Session->setFlash('ログアウトしました。');
		$this->redirect($this->Auth->logout());
	}
	
	function error(){
		$this->redirect($this->Auth->logout());
	}
}
