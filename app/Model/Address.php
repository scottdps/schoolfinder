<?php
App::uses('AppModel', 'Model');
/**
 * Address Model
 *
 * @property Esschools $Esschools
 * @property Hsschools $Hsschools
 * @property Msschools $Msschools
 */
class Address extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'Address';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Esschools' => array(
			'className' => 'Esschools',
			'foreignKey' => 'esschools_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Hsschools' => array(
			'className' => 'Hsschools',
			'foreignKey' => 'hsschools_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Msschools' => array(
			'className' => 'Msschools',
			'foreignKey' => 'msschools_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
