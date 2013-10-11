<?php
class TasksController extends AppController {
  var $name = 'Tasks';
  var $uses = array('Task');
  var $components = array('Auth','Session','Security');
  var $paginate = array(
   'limit' => 5,
   'order' => array(
     'Task.created' => 'desc'
   )
  );
  function beforeFilter()
  {
     App::import('Sanitize');
     $this->Auth->allow('index', 'view');
     $this->Auth->authError = '荳~M正縷Aｪ縷B~M縷P縷D縷Sで縷A~Y縷B';
     $this->Auth->logoutRedirect = array(Configure::read('Routing.admin')         => false, 'controller' => 'posts', 'action' => 'index');
     $this->Security->requireAuth();
     $this->Security->blackHoleCallback = 'error';
     $this->set('user',$this->Auth->user());
  }
  function index() {
	$this->Task->recursive = 0;
	$this->__sanitize();
	$this->set('tasks', $this->pagenate());
  }
}
?>
