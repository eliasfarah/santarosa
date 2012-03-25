<?php

App::uses('AppController', 'Controller');

/**
 * Stocks Controller
 *
 * @property Stock $Stock
 */
class StocksController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Stock->recursive = 0;
        $this->set('stocks', $this->paginate());
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

}
