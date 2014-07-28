<?php
class UsersController extends AppController{

        public function beforeFilter()
        {
           parent::beforeFilter();
           $this->Auth->allow('login', 'add');
           
        }

        public function isAuthorized($user)
        {
           if($user['role'] == 'admin')
           {
              return TRUE;
           }
           if(in_array($this->action, array('edit', 'delete')))
           {
              if($user['id'] != $this->request->params['pass'][0])
              {

                 return FALSE;
              }
           }
           return TRUE;
        }
        
         public function index() {
            $this->User->recursive = 0;
            $this->set('users', $this->paginate());
        }

        public function login()
        {
           
           if($this->request->is('post'))
           {
              if($this->Auth->login())
              {
                 $this->redirect($this->Auth->redirect());
              } else {
                 $this->Session->setFlash('Seu Email ou Senha estão incorretos');
              }
           }
        }

        public function logout()
        {
           $this->redirect($this->Auth->logout());
        }
        
         public function view($id = null) {
            $this->User->id = $id;
            if (!$this->User->exists()) {
                throw new NotFoundException(__('Usuário inválido'));
            }
            $this->set('user', $this->User->read(null, $id));
        }
        
        public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuário Salvo'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Usuário não foi salvo. Tente novamente.'));
            }
        }
    }
}