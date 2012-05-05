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
            'foreignKey' => 'product_id'
        ),
        'Color' => array(
            'className' => 'Color',
            'foreignKey' => 'color_id'
        ),
        'ProductType' => array(
            'className' => 'ProductType',
            'foreignKey' => false,
            'conditions' => 'ProductType.id = Product.product_type_id'
        ),
        'Manufacturer' => array(
            'className' => 'Manufacturer',
            'foreignKey' => false,
            'conditions' => 'Manufacturer.id = Product.manufacturer_id')
    );
    public $hasAndBelongsToMany = array('Order');

}
