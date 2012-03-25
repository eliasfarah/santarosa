<?php
/**
 * StockFixture
 *
 */
class StockFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'length' => 36, 'key' => 'primary'),
		'product_id' => array('type' => 'string', 'null' => true, 'length' => 36),
		'qtd' => array('type' => 'integer', 'null' => true),
		'color_id' => array('type' => 'string', 'null' => true, 'length' => 36),
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
			'id' => '4f6e0d91-b2c0-4b46-9fb5-0f884bc7e265',
			'product_id' => 'Lorem ipsum dolor sit amet',
			'qtd' => 1,
			'color_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-03-24 18:08:17',
			'modified' => '2012-03-24 18:08:17'
		),
	);
}
