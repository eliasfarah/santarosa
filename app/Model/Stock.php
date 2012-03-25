<?php
App::uses('AppModel', 'Model');
/**
 * Stock Model
 *
 * @property Product $Product
 * @property Color $Color
 */
class Stock extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Color' => array(
			'className' => 'Color',
			'foreignKey' => 'color_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        public $hasAndBelongsToMany = array('Order');
}
