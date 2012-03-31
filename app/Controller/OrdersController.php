<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 */
class OrdersController extends AppController {
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Order->recursive = 0;
		$this->set('orders', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->set('order', $this->Order->find('first', array('contain'=>array('Customer','Stock'=>array('Color','Product'=>array('ProductType'))),'conditions'=>array('Order.id'=>$id))));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
                $this->Session->write('item_number', -1);
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		}
		$customers = $this->Order->Customer->find('list');
		$stocks = $this->Order->Stock->find('list');
		$this->set(compact('customers', 'stocks'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
//	public function edit($id = null) {
//                $this->Session->write('item_number', -1);
//		$this->Order->id = $id;
//		if (!$this->Order->exists()) {
//			throw new NotFoundException(__('Invalid order'));
//		}
//		if ($this->request->is('post') || $this->request->is('put')) {
//			if ($this->Order->save($this->request->data)) {
//				$this->Session->setFlash(__('The order has been saved'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
//			}
//		} else {
//			$this->request->data = $this->Order->read(null, $id);
//		}
//		$customers = $this->Order->Customer->find('list');
//		$this->set(compact('customers', 'stocks'));
//	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->Order->delete()) {
			$this->Session->setFlash(__('Order deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Order was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        
        public function new_item(){
            $this->layout = 'ajax';
            if($this->Session->check('item_number'))
            {   $this->Session->write('item_number', $this->Session->read('item_number')+1); }
            else
            {   $this->Session->write('item_number', 0); }
                        
            $item_number = $this->Session->read('item_number');
            $stocks = $this->Order->Stock->find('list');
            $this->set(compact('item_number', 'stocks'));                       
        }
}
