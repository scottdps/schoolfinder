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
	public $components = array('Paginator');
        
        
        
        public function streetChooser(){
            $this->layout = 'simple'; 
        }
        
        public function numChooser($streetNum){
             $this->layout = 'simple';
            echo "<h2>Street Num is $streetNum</h2>";
            
        }
        

  //==============================================================================// 
  //==========================     OLD CODE   ====================================//  
  //==============================================================================//
        protected function _getStreet($streetName){
            $streetArray = $this->_setprefixArray();
            
            $take1 = $this->Address->find('all',
                    array(
                        'recursive' => -1,
                        'conditions' => array('street LIKE' => "%$streetName%"),
                        'fields' => array('address','street'),
                    ));
        }
               
        
      
 /**
  * find schools method
  *
  * @return void
  */
    public function whatSchool2() {
        $this->layout = 'simple';
        $minValue = 5;
        $maxValue = 5;
        $Numerr = '';
        $Nameerr = '';
        $searchWorked = 0;
        $notFoundStr = 'Sorry, your address was not found';
        $this->set('Numerr','');
             $this->set('Nameerr','');
             $this->set('notFoundStr','');
       
      
        if ($this->request->is('post')) {
          $streetNumber = strtolower(trim($this->request->data['Address']['StreetNumber']));
          $streetName = strtolower(trim($this->request->data['Address']['StreetName']));
          
          $streetName = preg_replace("/[^a-zA-Z 0-9]+/", " ", $streetName);
          echo "<h2>streetName is $streetName</h2>";
          $streetList = $this->_getStreet($streetName);
          
          
          //a. Attempt a simple search
            $yourSchools = $this->Address->find('first',array(
                'conditions' =>   array("AND" => array(
                    "Address" => $streetNumber,
                    "Street LIKE" => "%$streetName%")
                    //'Street' => $streetName)
                ),
                'contain' => array('Esschools','Msschools','Hsschools'),
                ));
             $this->set('yourSchools',$yourSchools);
            

            if(!$yourSchools){
                $searchHelper = $this->_setprefixArray();
                $streetArray = $this->_isSpecial($streetName,$searchHelper['specialStreets']); 

                // gets the closest address on the street - assumes the street is found.  
                // (or function should not have been called)
                // $addressList =  $this->_getAddressesInRange($minValue,$maxValue,$streetNums,$streetNumber);
                $this->set('notFoundStr',$notFoundStr);
              
                // b. See if     
                $this->set('yourSchools',$yourSchools);
              //  return $this->redirect(array('action' => 'index'));
            } else {
               // $this->Session->setFlash(__('The address was not found. Please, try again.'));
            }
        }
    }
        
//=================================================================================//         
        
        
        
        
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
