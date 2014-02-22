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
   
       
        
        
    protected function _setprefixArray(){     
         $searchHelper = array();
            
            $prefixes = array('n','north','s','south','e','east','w','west','pl','place','cir','circle');
            $suffixes = array('ln','lane','dr','drive','st','street','ave','avenue','blvd','ct','court');  
            $specialStreets = array('outer drive','outer dr','ann arbor','west village','lake village','royal vale',
                           'town center','west village','executive plaza','fairlane woods', 'herbert weier','weier');

            $searchHelper['prefixes'] = $prefixes;
            $searchHelper['suffixes'] = $prefixes;
            $searchHelper['specialStreets'] = $specialStreets;
            return $searchHelper;
        }
        
    /*    
   // protected function _getAddressesInRange($minval,$maxval,$streetNums,$enteredNum){
      protected function _getAddressesInRange2(){   
        $streetNums = array('100','110','120','130','140','150','160','170','180','190',
                '200','210','220','230','240','250','260','270','280','290',
                '300','310','320','330','340','350','360','370','380','390',
                '400','410','420','430','440','450','460','470','480','490',
                '500','510','520','530','540','550','560','570','580','590'
                );
            
        $minval = 5;
        $maxval = 5;
            
            $enteredNum = 353;
      // gets the closese address on the street - assumes the street is found.  (or function should not have been called)
            $closest = null;
            foreach($streetNums as $streetNum) {
               if($closest == null || abs($enteredNum - $closest) > abs($streetNum - $enteredNum)) {
                  $closest = $streetNum;
               }
            }
           echo "<h2>The entered number is $enteredNum The closest number is $closest</h2>";
            $indexClosest = array_search($closest,$streetNums);
        echo "<h2>Its index is $indexClosest</h2>";
           $start = abs($indexClosest - $minval);
           $finish = abs($indexClosest + $maxval);
           echo "<h2>starting index is $start</h2>";
           echo "<h2> ending is $finish</h2>";
           
           for ($i = $start; $i <= $finish; $i++) {
               if(isset($streetNums[$i])){
                    echo $streetNums[$i].", ";
               }
            }

        }
        
     */   
        
    protected function _getAddressesInRange($minval,$maxval,$streetNums,$enteredNum){

            // gets the closest address on the street - assumes the street is found.  
            // (or function should not have been called)
            $addressList = array();
            $closest = null;
            foreach($streetNums as $streetNum) {
               if($closest == null || abs($enteredNum - $closest) > abs($streetNum - $enteredNum)) {
                  $closest = $streetNum;
               }
            }
            $indexClosest = array_search($closest,$streetNums);
           $start = abs($indexClosest - $minval);
           $finish = abs($indexClosest + $maxval);
       
           
           for ($i = $start; $i <= $finish; $i++) {
               if(isset($streetNums[$i])){
                   // echo $streetNums[$i].", ";
                    $addressList[] = $streetNums[$i];
               }
            }
                return $addressList;
        }
        
        
        
    protected function _isSpecial($streetName,$specialStreets){
   
        echo   $streetName;  
      //  pr($specialStreets);
            
      
        foreach($specialStreets as $item){
         //   if(preg_match("/ann arbor\s*\w*/",$item,$match)!== false){
                  if(preg_match_all("/^\b$streetName\b\s*\w*/i",$item,$match) != 0){
              echo "<h2>$streetName matched $item!</h2>";
              pr($match);
              break;
            } else {
                  echo  "<h4>So Sad ....$streetName was not found!</h4>";
            }
        
        }
        
        return TRUE;
        }
        
        
        
        
        protected function _getStreet($streetName){
            $streetArray = $this->_setprefixArray();
            
            $take1 = $this->Address->find('all',
                    array(
                        'recursive' => -1,
                        'conditions' => array('street LIKE' => "%$streetName%"),
                        'fields' => array('address','street'),
                    ));
            
         //   pr($take1);
      
        }
        
        
        
        
        
        
        
//=================================================================================//        
 /**
  * find schools method
  * 
  *  grab the address value from the form.  check to see if it starts with a number.  
  *  If so, do a search for the exact address.
  *  If found, report the schools
  *  Else, list all the addresses between minValue  and maxValue for the street field
  *     If nothing found  reurn error string. 
  * 
  * 
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
