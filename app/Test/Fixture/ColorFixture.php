<?php
/**
 * ColorFixture
 *
 */
class ColorFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'length' => 36, 'key' => 'primary'),
		'cor' => array('type' => 'string', 'null' => true),
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
			'id' => '4f6e0d15-dccc-44e8-857f-10f04bc7e265',
			'cor' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-03-24 18:06:13',
			'modified' => '2012-03-24 18:06:13'
		),
	);
}
