<?php
App::uses('ProductType', 'Model');

/**
 * ProductType Test Case
 *
 */
class ProductTypeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.product_type', 'app.product', 'app.manufacturer', 'app.items_order', 'app.stock', 'app.color');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductType = ClassRegistry::init('ProductType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductType);

		parent::tearDown();
	}

}
