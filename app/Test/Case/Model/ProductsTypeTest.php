<?php
App::uses('ProductsType', 'Model');

/**
 * ProductsType Test Case
 *
 */
class ProductsTypeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.products_type');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductsType = ClassRegistry::init('ProductsType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductsType);

		parent::tearDown();
	}

}
