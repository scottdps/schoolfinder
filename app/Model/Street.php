<?php
App::uses('AppModel', 'Model');
/**
 * Street Model
 *
 * @property Address $Address
 */
class Street extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'Street';

  /**
     * jsonStreetList()
     * 
     * gets a list of Dearborn streets - to be fed to Ajax calls
     * 
     * @name    jsonStreetList()
     * @author Scott Tobias
     * @return json String $JSONStreets
     */
       public function jsonStreetList(){
        $Streets = $this->find('list',array(
                    'recursive' => -1,
                    'fields' => array('id','Street'),
                    'order' => array('Street' => 'asc')
                ));  
       
           return  $JSONStreets = json_encode($Streets);
       }      
        
        
        
        
        
        
        
        

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Address' => array(
			'className' => 'Address',
			'foreignKey' => 'street_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
