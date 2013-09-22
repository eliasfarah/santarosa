<?php
App::uses('AppController', 'Controller');
/**
 * Templates Controller
 *
 * @property Template $Template
 */
class TemplatesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Template->recursive = 0;
		$this->set('templates', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Template->id = $id;
		if (!$this->Template->exists()) {
			throw new NotFoundException(__('Invalid template'));
		}
		$this->set('template', $this->Template->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Template->create();
			if ($this->Template->save($this->request->data)) {
				$this->Session->setFlash(__('The template has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The template could not be saved. Please, try again.'));
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
		$this->Template->id = $id;
		if (!$this->Template->exists()) {
			throw new NotFoundException(__('Invalid template'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Template->save($this->request->data)) {
				$this->Session->setFlash(__('The template has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The template could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Template->read(null, $id);
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
		$this->Template->id = $id;
		if (!$this->Template->exists()) {
			throw new NotFoundException(__('Invalid template'));
		}
		if ($this->Template->delete()) {
			$this->Session->setFlash(__('Template deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Template was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
