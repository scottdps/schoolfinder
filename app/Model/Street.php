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
