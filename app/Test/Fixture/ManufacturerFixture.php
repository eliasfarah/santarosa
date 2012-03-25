<?php
/**
 * ManufacturerFixture
 *
 */
class ManufacturerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'length' => 36, 'key' => 'primary'),
		'nome' => array('type' => 'string', 'null' => true),
		'telefone' => array('type' => 'string', 'null' => true),
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
			'id' => '4f6e0cf3-f288-4b3c-9b5d-1f584bc7e265',
			'nome' => 'Lorem ipsum dolor sit amet',
			'telefone' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-03-24 18:05:39',
			'modified' => '2012-03-24 18:05:39'
		),
	);
}
