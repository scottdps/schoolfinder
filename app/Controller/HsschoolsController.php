<?php
App::uses('AppController', 'Controller');
/**
 * Hsschools Controller
 *
 * @property Hsschool $Hsschool
 * @property PaginatorComponent $Paginator
 */
class HsschoolsController extends AppController {

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
		$this->Hsschool->recursive = 0;
		$this->set('hsschools', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Hsschool->exists($id)) {
			throw new NotFoundException(__('Invalid hsschool'));
		}
		$options = array('conditions' => array('Hsschool.' . $this->Hsschool->primaryKey => $id));
		$this->set('hsschool', $this->Hsschool->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Hsschool->create();
			if ($this->Hsschool->save($this->request->data)) {
				$this->Session->setFlash(__('The hsschool has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hsschool could not be saved. Please, try again.'));
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
		if (!$this->Hsschool->exists($id)) {
			throw new NotFoundException(__('Invalid hsschool'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Hsschool->save($this->request->data)) {
				$this->Session->setFlash(__('The hsschool has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hsschool could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Hsschool.' . $this->Hsschool->primaryKey => $id));
			$this->request->data = $this->Hsschool->find('first', $options);
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
		$this->Hsschool->id = $id;
		if (!$this->Hsschool->exists()) {
			throw new NotFoundException(__('Invalid hsschool'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Hsschool->delete()) {
			$this->Session->setFlash(__('Hsschool deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Hsschool was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
