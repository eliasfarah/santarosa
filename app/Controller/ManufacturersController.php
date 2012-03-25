<?php
App::uses('AppController', 'Controller');
/**
 * Manufacturers Controller
 *
 * @property Manufacturer $Manufacturer
 */
class ManufacturersController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Manufacturer->recursive = 0;
		$this->set('manufacturers', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Manufacturer->id = $id;
		if (!$this->Manufacturer->exists()) {
			throw new NotFoundException(__('Invalid manufacturer'));
		}
		$this->set('manufacturer', $this->Manufacturer->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Manufacturer->create();
			if ($this->Manufacturer->save($this->request->data)) {
				$this->Session->setFlash(__('The manufacturer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The manufacturer could not be saved. Please, try again.'));
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
		$this->Manufacturer->id = $id;
		if (!$this->Manufacturer->exists()) {
			throw new NotFoundException(__('Invalid manufacturer'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Manufacturer->save($this->request->data)) {
				$this->Session->setFlash(__('The manufacturer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The manufacturer could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Manufacturer->read(null, $id);
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
		$this->Manufacturer->id = $id;
		if (!$this->Manufacturer->exists()) {
			throw new NotFoundException(__('Invalid manufacturer'));
		}
		if ($this->Manufacturer->delete()) {
			$this->Session->setFlash(__('Manufacturer deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Manufacturer was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
