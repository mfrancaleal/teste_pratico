<?php
App::uses('AppController', 'Controller');
/**
 * Compromissos Controller
 *
 * @property Compromisso $Compromisso
 * @property PaginatorComponent $Paginator
 */
class CompromissosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Compromisso->recursive = 0;
		$this->set('compromissos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Compromisso->exists($id)) {
			throw new NotFoundException(__('Invalid compromisso'));
		}
		$options = array('conditions' => array('Compromisso.' . $this->Compromisso->primaryKey => $id));
		$this->set('compromisso', $this->Compromisso->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Compromisso->create();
			if ($this->Compromisso->save($this->request->data)) {
				$this->Session->setFlash(__('The compromisso has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The compromisso could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Compromisso->exists($id)) {
			throw new NotFoundException(__('Invalid compromisso'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Compromisso->save($this->request->data)) {
				$this->Session->setFlash(__('The compromisso has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The compromisso could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Compromisso.' . $this->Compromisso->primaryKey => $id));
			$this->request->data = $this->Compromisso->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Compromisso->id = $id;
		if (!$this->Compromisso->exists()) {
			throw new NotFoundException(__('Invalid compromisso'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Compromisso->delete()) {
			$this->Session->setFlash(__('The compromisso has been deleted.'));
		} else {
			$this->Session->setFlash(__('The compromisso could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
