<?php
/**
 * OrderFixture
 *
 */
class OrderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'length' => 36, 'key' => 'primary'),
		'customer_id' => array('type' => 'string', 'null' => true, 'length' => 36),
		'data_hora' => array('type' => 'datetime', 'null' => true),
		'total' => array('type' => 'float', 'null' => true),
		'desconto' => array('type' => 'float', 'null' => true),
		'subtotal' => array('type' => 'float', 'null' => true),
		'acrescimo' => array('type' => 'float', 'null' => true),
		'entregue' => array('type' => 'datetime', 'null' => true),
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
			'id' => '4f6e0d68-b1cc-491c-96c4-0b984bc7e265',
			'customer_id' => 'Lorem ipsum dolor sit amet',
			'data_hora' => '2012-03-24 18:07:36',
			'total' => 1,
			'desconto' => 1,
			'subtotal' => 1,
			'acrescimo' => 1,
			'entregue' => '2012-03-24 18:07:36',
			'created' => '2012-03-24 18:07:36',
			'modified' => '2012-03-24 18:07:36'
		),
	);
}
