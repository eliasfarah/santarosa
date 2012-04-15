<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 */
class OrdersController extends AppController {
    public $uses = array('Order', 'Template');
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
        
        public function print_order($id =null)
        {
            $this->layout = 'ajax';
            $this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$order = $this->Order->find('first', array('contain'=>array('Customer','Stock'=>array('Color','Product'=>array('Manufacturer','ProductType'))),'conditions'=>array('Order.id'=>$id)));
//                debug($order);
                $this->set('order', $order);
                
                $template = $this->Template->find('first', array('conditions' => array('Template.nome' => 'Pedidos')));
                $template = $template['Template']['template'];
                $template = str_replace('[DATA]', date('d/m/Y'), $template);
                $template = str_replace('[NOME]', $order['Customer']['nome'], $template);
                $template = str_replace('[ENDERECO]', $order['Customer']['endereco'].", ".$order['Customer']['numero'], $template);
                $template = str_replace('[COMPLEMENTO]', $order['Customer']['complemento'], $template);
                $template = str_replace('[BAIRRO]', $order['Customer']['bairro'], $template);
                $template = str_replace('[CIDADE]', $order['Customer']['cidade'], $template);
                $template = str_replace('[ESTADO]', $order['Customer']['estado'], $template);
                $template = str_replace('[TEL_RES]', $order['Customer']['telefone_residencial'], $template);
                $template = str_replace('[TEL_COM]', $order['Customer']['telefone_comercial'], $template);
                $template = str_replace('[CELULAR]', $order['Customer']['celular'], $template);
                $template = str_replace('[OBS]', $order['Customer']['observacoes'], $template);

                $this->set('template', $template);
                
                
                
        }
}
