<?php
App::uses('Street', 'Model');

/**
 * Street Test Case
 *
 */
class StreetTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.street',
		'app.address',
		'app.esschools',
		'app.hsschools',
		'app.msschools'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Street = ClassRegistry::init('Street');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Street);

		parent::tearDown();
	}

}
