<?php

App::uses('AppController', 'Controller');

/**
 * Stocks Controller
 *
 * @property Stock $Stock
 */
class StocksController extends AppController {
   // public $paginate = array('contain'=>array('Product'=> array('Manufacturer'),'Color','ProductType'));
    /**
     * index method
     *
     * @return void
     */
    public function index() {                
        $conditions = array();
        $data = empty($this->request->data)?$this->request->params['named']:$this->request->data;
        if(!empty($data))
        {   $conditions = array('OR'=>array('Product.nome ilike'=>'%'.$data['search'].'%',
                                            'Manufacturer.nome ilike'=>'%'.$data['search'].'%',
                                            'ProductType.tipo ilike'=>'%'.$data['search'].'%'
                                           )
                               );            
        }    
        $this->set('stocks', $this->paginate('Stock', $conditions));
        $this->set('args', $data);
        
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Stock->id = $id;
        if (!$this->Stock->exists()) {
            throw new NotFoundException(__('Invalid stock'));
        }
        $this->set('stock', $this->Stock->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Stock->create();
            if ($this->Stock->save($this->request->data)) {
                $this->Session->setFlash(__('The stock has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The stock could not be saved. Please, try again.'));
            }
        }
        $products = $this->Stock->Product->find('list', array('fields' => array('Product.id','Product.nome')));        
        $colors = $this->Stock->Color->find('list', array('fields' => array('Color.id', 'Color.cor')));
        $this->set(compact('products', 'colors'));
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Stock->id = $id;
        if (!$this->Stock->exists()) {
            throw new NotFoundException(__('Invalid stock'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Stock->save($this->request->data)) {
                $this->Session->setFlash(__('The stock has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The stock could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Stock->read(null, $id);
        }
        $products = $this->Stock->Product->find('list', array('fields' => array('Product.id', 'Product.nome')));
        $colors = $this->Stock->Color->find('list', array('fields' => array('Color.id', 'Color.cor')));
        $this->set(compact('products', 'colors'));
    }

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
        $this->Stock->id = $id;
        if (!$this->Stock->exists()) {
            throw new NotFoundException(__('Invalid stock'));
        }
        if ($this->Stock->delete()) {
            $this->Session->setFlash(__('Stock deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Stock was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

//    public function stocks_ajax(){
//     
//        debug($this->request->query);        
//        
//	$this->autoRender = false;
//        $stocks = $this->Stock->find('all', array('conditions'=>array('Product.nome ilike'=>'%'.$this->request->query['term'].'%' )));
//	echo json_encode($this->Stock->autoComplete_encode($stocks));
//    }    

    function stocks_ajax()
    {
        $this->layout = 'ajax';
        $this->autoRender = false;
        $this->disableCache = true;
                              
        $stocks = $this->Stock->find('all', array('limit'=>'15',
                                                  'order'=>array('Product.nome'=> 'ASC'),
                                                  'conditions'=> array('OR'=>array('Product.nome ilike'=>'%'.$this->request->query['term'].'%',
                                                                                   'ProductType.tipo ilike'=>'%'.$this->request->query['term'].'%'))
                                                 ));
        $json = array();
        foreach ($stocks as $stock):
            $json[] = array('id'=>$stock['Stock']['id'], 'value'=>$stock['ProductType']['tipo'].' '.$stock['Product']['nome'].' '.$stock['Color']['cor']."(".$stock['Stock']['qtd'].")", 'label'=>$stock['ProductType']['tipo'].' '.$stock['Product']['nome'].' '.$stock['Color']['cor']."(".$stock['Stock']['qtd'].")", 'valor'=>$stock['Product']['valor'], 'qtd'=>$stock['Stock']['qtd']);
        endforeach;
        echo json_encode($json);
    }       
}
