<?php

App::uses('AppController', 'Controller');

class DashboardController extends AppController {
    
    public $uses = array('Order');
    
    public function index(){
                
        $this->set('orders', $this->Order->find('all', array('conditions'=>array('Order.entregue is null','Order.cancelado'=>false), 'order'=>array('Order.created'=>'DESC'),'limit'=>10)));
        $this->set('sold', $this->Order->find('all', array('conditions'=>array('Order.cancelado'=>false, 'Order.created >='=>date('Y-m-d'), 'Order.created <='=>date('Y-m-d')))));
    }
}