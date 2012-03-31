<?php
App::uses('AppModel', 'Model');
/**
 * Order Model
 *
 * @property Customer $Customer
 * @property Stock $Stock
 */
class Order extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed
        public $actsAs = array('Containable');
        /**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'customer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Stock' => array(
			'className' => 'Stock',
			'joinTable' => 'orders_stocks',
			'foreignKey' => 'order_id',
			'associationForeignKey' => 'stock_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

        public function afterSave($created)
        {
            if($created)
            {
                foreach($this->data['Stock'] as $stock):
                    $get_stock = $this->Stock->read(null, $stock['stock_id']);
                    $this->Stock->saveField('qtd', ((int)$get_stock['Stock']['qtd']-(int)$stock['qtd']));
                endforeach;
                
//                2012-03-31 02:12:52 Debug: Array
//(
//    [Order] => Array
//        (
//            [data_hora] => now()
//            [customer] => Elias Farah
//            [customer_id] => 4f6e1121-dce8-4747-8679-190c4bc7e265
//            [desconto] => 
//            [acrescimo] => 
//            [subtotal] => 
//            [modified] => 2012-03-31 02:12:52
//            [created] => 2012-03-31 02:12:52
//            [id] => 4f766824-3950-4476-9969-1a744bc7e265
//        )
//
//    [Stock] => Array
//        (
//            [0] => Array
//                (
//                    [stock] => Guarda Roupa Cancun Preto e branco
//                    [stock_id] => 4f6e75a4-57a8-4b9f-bacc-0c544bc7e265
//                    [qtd] => 1
//                    [valor] => 500.00
//                )
//
//        )
//
//)


            }
        }
}
