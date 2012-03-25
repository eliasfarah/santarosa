<?php
/**
 * CustomerFixture
 *
 */
class CustomerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'length' => 36, 'key' => 'primary'),
		'nome' => array('type' => 'string', 'null' => true),
		'data_nascimento' => array('type' => 'datetime', 'null' => true),
		'endereco' => array('type' => 'string', 'null' => true),
		'numero' => array('type' => 'string', 'null' => true, 'length' => 30),
		'complemento' => array('type' => 'string', 'null' => true),
		'bairro' => array('type' => 'string', 'null' => true),
		'cidade' => array('type' => 'string', 'null' => true),
		'estado' => array('type' => 'string', 'null' => true, 'length' => 2),
		'telefone_residencial' => array('type' => 'string', 'null' => true, 'length' => 100),
		'telefone_comercial' => array('type' => 'string', 'null' => true, 'length' => 100),
		'celular' => array('type' => 'string', 'null' => true, 'length' => 100),
		'observacoes' => array('type' => 'text', 'null' => true, 'length' => 1073741824),
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
			'id' => '4f6e0d45-6f90-4a94-a959-19d44bc7e265',
			'nome' => 'Lorem ipsum dolor sit amet',
			'data_nascimento' => '2012-03-24 18:07:01',
			'endereco' => 'Lorem ipsum dolor sit amet',
			'numero' => 'Lorem ipsum dolor sit amet',
			'complemento' => 'Lorem ipsum dolor sit amet',
			'bairro' => 'Lorem ipsum dolor sit amet',
			'cidade' => 'Lorem ipsum dolor sit amet',
			'estado' => '',
			'telefone_residencial' => 'Lorem ipsum dolor sit amet',
			'telefone_comercial' => 'Lorem ipsum dolor sit amet',
			'celular' => 'Lorem ipsum dolor sit amet',
			'observacoes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-03-24 18:07:01',
			'modified' => '2012-03-24 18:07:01'
		),
	);
}
