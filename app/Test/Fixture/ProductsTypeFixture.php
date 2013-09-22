<?php
/**
 * ProductsTypeFixture
 *
 */
class ProductsTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => true, 'length' => 36, 'key' => 'primary'),
		'type' => array('type' => 'string', 'null' => true),
		'created' => array('type' => 'datetime', 'null' => true),
		'modified' => array('type' => 'datetime', 'null' => true),
		'indexes' => array(),
		'tableParameters' => array()
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '4f6e1448-ba98-4c22-a41a-18c84bc7e265',
			'type' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-03-24 18:36:56',
			'modified' => '2012-03-24 18:36:56'
		),
	);
}
