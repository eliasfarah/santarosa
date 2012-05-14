<?php
class Group extends Model {
    public $actsAs = array('Acl' => array('type' => 'requester'));
    public $hasMany = array('User');
    
    public function parentNode() {
        return null;
    }
}