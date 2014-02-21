<?php
App::uses('AppController', 'Controller');
/**
 * Msschools Controller
 *
 * @property Msschool $Msschool
 * @property PaginatorComponent $Paginator
 */
class MsschoolsController extends AppController {

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
		$this->Msschool->recursive = 0;
		$this->set('msschools', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Msschool->exists($id)) {
			throw new NotFoundException(__('Invalid msschool'));
		}
		$options = array('conditions' => array('Msschool.' . $this->Msschool->primaryKey => $id));
		$this->set('msschool', $this->Msschool->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Msschool->create();
			if ($this->Msschool->save($this->request->data)) {
				$this->Session->setFlash(__('The msschool has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The msschool could not be saved. Please, try again.'));
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
		if (!$this->Msschool->exists($id)) {
			throw new NotFoundException(__('Invalid msschool'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Msschool->save($this->request->data)) {
				$this->Session->setFlash(__('The msschool has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The msschool could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Msschool.' . $this->Msschool->primaryKey => $id));
			$this->request->data = $this->Msschool->find('first', $options);
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
		$this->Msschool->id = $id;
		if (!$this->Msschool->exists()) {
			throw new NotFoundException(__('Invalid msschool'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Msschool->delete()) {
			$this->Session->setFlash(__('Msschool deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Msschool was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
