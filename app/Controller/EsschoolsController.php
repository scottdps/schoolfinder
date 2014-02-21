<?php
App::uses('AppController', 'Controller');
/**
 * Esschools Controller
 *
 * @property Esschool $Esschool
 * @property PaginatorComponent $Paginator
 */
class EsschoolsController extends AppController {

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
		$this->Esschool->recursive = 0;
		$this->set('esschools', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Esschool->exists($id)) {
			throw new NotFoundException(__('Invalid esschool'));
		}
		$options = array('conditions' => array('Esschool.' . $this->Esschool->primaryKey => $id));
		$this->set('esschool', $this->Esschool->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Esschool->create();
			if ($this->Esschool->save($this->request->data)) {
				$this->Session->setFlash(__('The esschool has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The esschool could not be saved. Please, try again.'));
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
		if (!$this->Esschool->exists($id)) {
			throw new NotFoundException(__('Invalid esschool'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Esschool->save($this->request->data)) {
				$this->Session->setFlash(__('The esschool has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The esschool could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Esschool.' . $this->Esschool->primaryKey => $id));
			$this->request->data = $this->Esschool->find('first', $options);
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
		$this->Esschool->id = $id;
		if (!$this->Esschool->exists()) {
			throw new NotFoundException(__('Invalid esschool'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Esschool->delete()) {
			$this->Session->setFlash(__('Esschool deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Esschool was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
