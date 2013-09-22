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

    public function afterSave($created) {
        if ($created) {
//            $this->log($this->request->data)
            foreach ($this->data['Stock'] as $stock):
                $get_stock = $this->Stock->read(null, $stock['stock_id']);
                $this->Stock->saveField('qtd', ((int) $get_stock['Stock']['qtd'] - (int) $stock['qtd']));
            endforeach;
        }
    }

    public function returnToStock()
    {
        $order = $this->find('first', array('conditions' => array('Order.id' => $this->id)));
        foreach($order['Stock'] as $stock):
            $get_stock = $this->Stock->read(null, $stock['OrdersStock']['stock_id']);
            $this->Stock->saveField('qtd', ((int)$get_stock['Stock']['qtd']+(int)$stock['OrdersStock']['qtd']));
        endforeach;                
    }
    
}
