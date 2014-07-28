<?php
class LoginsController extends AppController{
   
   public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
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
                $this->Session->setFlash(__('Usuário será salvo'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Usuário não foi salvo. Tentar novamente.'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('O usuario será salvo'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Usuário não foi salvo. Tentar novamente.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário Inválido'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuário Deletado'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Usuário não foi deletado'));
        $this->redirect(array('action' => 'index'));
    }

}
?>