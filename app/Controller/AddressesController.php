<?php
App::uses('AppController', 'Controller');
/**
 * Addresses Controller
 *
 * @property Address $Address
 * @property PaginatorComponent $Paginator
 */
class AddressesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	//public $components = array('Paginator');
        public $components = array('RequestHandler');
        public $uses = array('Street');
        
        
        public function streetChooser(){
            $this->layout = 'simple'; 
             $Streets = $this->Street->jsonStreetList();
             $this->set('Streets',$Streets);
            
            
        }
        
        public function numChooser(){
            $this->layout = 'simple';
            echo "<h2>Street Num is $streetNum</h2>";     
            $Streets2 = $this->Street->jsonStreetList();
            $this->set('Streets2',$Streets2);    
        }
        
             public function ajaxGetNumber(){
      //  echo "hello From  ajaxGetStreets()";
        $this->autoRender = FALSE;
        
        $tString = "Congradulations";       
        return $tString;
    }
         
        
        
        
        public function ajaxGetStreets(){
      //  echo "hello From  ajaxGetStreets()";
        $this->autoRender = FALSE;
        
        $tString = "Now Enter your street number";       
        return $tString;
    }
        
public function addressAjax()
{
      $this->autoRender = false;
  echo "In AddressAjax";
     $Streets2 = $this->Street->jsonStreetList();
    $this->set('Streets2',$Streets2);
}
        
        
 /**
 * find schools method
 *
 * @return void
 */
	public function whatSchool() {
             $this->layout = 'simple';
		if ($this->request->is('post')) {
              
                  $address = $this->request->data['Address']['CompleteAddress'];
                  
                    $yourSchools = $this->Address->find('first',array(
                       // 'fields' => array()
                        'recursive' => -1,
                        'conditions' => array('CompleteAddress' => $address)
                        
                    )
                            );
                    $this->set('yourSchools',$yourSchools);
                   
                    
                    
                    
                    
                  //  return $this->redirect(array('action' => 'index'));
            } else {
                   // $this->Session->setFlash(__('The address was not found. Please, try again.'));
            }
        }
		
   
        
        

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Address->recursive = 0;
		$this->set('addresses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Address->exists($id)) {
			throw new NotFoundException(__('Invalid address'));
		}
		$options = array('conditions' => array('Address.' . $this->Address->primaryKey => $id));
		$this->set('address', $this->Address->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Address->create();
			if ($this->Address->save($this->request->data)) {
				$this->Session->setFlash(__('The address has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The address could not be saved. Please, try again.'));
			}
		}
		$esschools = $this->Address->Esschool->find('list');
		$hsschools = $this->Address->Hsschool->find('list');
		$msschools = $this->Address->Msschool->find('list');
		$this->set(compact('esschools', 'hsschools', 'msschools'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Address->exists($id)) {
			throw new NotFoundException(__('Invalid address'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Address->save($this->request->data)) {
				$this->Session->setFlash(__('The address has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The address could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Address.' . $this->Address->primaryKey => $id));
			$this->request->data = $this->Address->find('first', $options);
		}
		$esschools = $this->Address->Esschool->find('list');
		$hsschools = $this->Address->Hsschool->find('list');
		$msschools = $this->Address->Msschool->find('list');
		$this->set(compact('esschools', 'hsschools', 'msschools'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Address->id = $id;
		if (!$this->Address->exists()) {
			throw new NotFoundException(__('Invalid address'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Address->delete()) {
			$this->Session->setFlash(__('Address deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Address was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
