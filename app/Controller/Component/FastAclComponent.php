<?php

class FastAclComponent extends Component {

    public $components = array('Auth', 'Session');
    public $MyAco;
    public $MyAro;
    public $Controller;

    public function initialize(Controller $controller) {
        $this->Controller = $controller;
        if ($this->Auth->loggedIn()) {
            if(!$this->check())
            {
                //$this->Session->flash(__('You don\'t have permission'));
                $this->Controller->redirect('/pages/no_permission');
            }
        }
    }

    public function check() {
        App::uses('Authorization', 'Model');
        App::uses('MyAco', 'Model');
        App::uses('MyAro', 'Model');
        $this->Authorization = new Authorization();
        $this->MyAco = new MyAco();
        $this->MyAro = new MyAro();

        $aco = $this->MyAco->find('first', array('conditions' => array('Controller.alias' => ucwords($this->Controller->request->params['controller']), 'MyAco.alias' => strtolower($this->Controller->request->params['action']))));
        
        if (empty($aco)) {
            throw new ForbiddenException();
        }

        $user_aro = $this->MyAro->find('first', array('conditions' => array('MyAro.model' => 'User', 'MyAro.foreign_key' => $this->Auth->user('id'))));
        if (empty($user_aro)) {
            throw new ForbiddenException();
        }
        $user_can = $this->Authorization->find('first', array('conditions' => array('Authorization.aco_id' => $aco['MyAco']['id'], 'Authorization.aro_id' => $user_aro['MyAro']['id'])));
        if (!empty($user_can)) {
            if ($user_can['Authorization']['_create'] == '-1') {               
            } elseif ($user_can['Authorization']['_create'] == '1') {
                return true;
            }
        }
        $role_aro = $this->MyAro->find('first', array('conditions' => array('MyAro.model' => 'Group', 'MyAro.foreign_key' => $this->Auth->user('group_id'))));
        if (empty($role_aro)) {
            throw new HttpRequestMethodException();
        }
        $role_can = $this->Authorization->find('first', array('conditions' => array('Authorization.aco_id' => $aco['MyAco']['id'], 'Authorization.aro_id' => $role_aro['MyAro']['id'])));
        if (!empty($role_can)) {
            if ($role_can['Authorization']['_create'] == '-1') {                
            } elseif ($role_can['Authorization']['_create'] == '1') {
                return true;
            }
        }
        return false;
    }

}