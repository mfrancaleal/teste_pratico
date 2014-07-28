<?php
App::uses('Compromisso', 'Model');

/**
 * Compromisso Test Case
 *
 */
class CompromissoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.compromisso'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Compromisso = ClassRegistry::init('Compromisso');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Compromisso);

		parent::tearDown();
	}

}
