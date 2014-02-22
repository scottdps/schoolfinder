<?php
App::uses('AppController', 'Controller');
/**
 * Streets Controller
 *
 * @property Street $Street
 * @property PaginatorComponent $Paginator
 */
class StreetsController extends AppController {

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
		$this->Street->recursive = 0;
		$this->set('streets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Street->exists($id)) {
			throw new NotFoundException(__('Invalid street'));
		}
		$options = array('conditions' => array('Street.' . $this->Street->primaryKey => $id));
		$this->set('street', $this->Street->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Street->create();
			if ($this->Street->save($this->request->data)) {
				$this->Session->setFlash(__('The street has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The street could not be saved. Please, try again.'));
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
		if (!$this->Street->exists($id)) {
			throw new NotFoundException(__('Invalid street'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Street->save($this->request->data)) {
				$this->Session->setFlash(__('The street has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The street could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Street.' . $this->Street->primaryKey => $id));
			$this->request->data = $this->Street->find('first', $options);
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
		$this->Street->id = $id;
		if (!$this->Street->exists()) {
			throw new NotFoundException(__('Invalid street'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Street->delete()) {
			$this->Session->setFlash(__('Street deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Street was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
