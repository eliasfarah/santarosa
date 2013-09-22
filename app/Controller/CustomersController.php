<?php

App::uses('AppController', 'Controller');

/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class CustomersController extends AppController {

//    public $paginate = array('limit'=>1);

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $conditions = array();
        $data = empty($this->request->data)?$this->request->params['named']:$this->request->data;
        if(!empty($data))
        {   $conditions = array('Customer.nome ilike'=>'%'.$data['search'].'%');    }
    
        $this->Customer->recursive = 0;
        $this->set('customers', $this->paginate('Customer', $conditions));
        $this->set('args', $data);
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Customer->id = $id;
        if (!$this->Customer->exists()) {
            throw new NotFoundException(__('Invalid customer'));
        }
        $this->set('customer', $this->Customer->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Customer->create();
            if ($this->Customer->save($this->request->data)) {
                $this->Session->setFlash(__('The customer has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Customer->id = $id;
        if (!$this->Customer->exists()) {
            throw new NotFoundException(__('Invalid customer'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Customer->save($this->request->data)) {
                $this->Session->setFlash(__('The customer has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Customer->read(null, $id);
        }
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
        $this->Customer->id = $id;
        if (!$this->Customer->exists()) {
            throw new NotFoundException(__('Invalid customer'));
        }
        if ($this->Customer->delete()) {
            $this->Session->setFlash(__('Customer deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Customer was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    function customers_ajax() {
        $this->layout = 'ajax';
        $this->autoRender = false;
        $this->disableCache = true;

        $records = $this->Customer->find('all', array('limit' => '15','order' => array('Customer.nome' => 'ASC'), 'conditions' => array('Customer.nome ilike' => '%' . $this->request->query['term'] . '%')));
        $json = array();
        foreach ($records as $record):
            $json[] = array('id' => $record['Customer']['id'], 'value' => $record['Customer']['nome'], 'label' => $record['Customer']['nome']);
        endforeach;
        echo json_encode($json);
    }

}
