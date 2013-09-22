<?php
/**
 * ProductFixture
 *
 */
class ProductFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'length' => 36, 'key' => 'primary'),
		'nome' => array('type' => 'string', 'null' => true),
		'altura' => array('type' => 'string', 'null' => true, 'length' => 20),
		'largura' => array('type' => 'string', 'null' => true, 'length' => 20),
		'prof' => array('type' => 'string', 'null' => true, 'length' => 20),
		'valor' => array('type' => 'float', 'null' => true),
		'manufacturer_id' => array('type' => 'string', 'null' => true, 'length' => 36),
		'created' => array('type' => 'datetime', 'null' => true),
		'modified' => array('type' => 'datetime', 'null' => true),
		'indexes' => array('PRIMARY' => array('unique' => true, 'column' => 'id')),
		'tableParameters' => array()
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '4f6e0d7c-2b94-41c1-b80f-1be84bc7e265',
			'nome' => 'Lorem ipsum dolor sit amet',
			'altura' => 'Lorem ipsum dolor ',
			'largura' => 'Lorem ipsum dolor ',
			'prof' => 'Lorem ipsum dolor ',
			'valor' => 1,
			'manufacturer_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-03-24 18:07:56',
			'modified' => '2012-03-24 18:07:56'
		),
	);
}
