<?php

App::uses('AppModel', 'Model');

class MyAco extends AppModel {
    public $useTable  = 'acos';
    
    public $hasMany   = array('Authorization'=>array('className'=>'Authorization', 'foreignKey'=>'aco_id'));
    
    public $belongsTo = array('Controller'=>array('className'=>'MyAco','foreignKey'=>'parent_id'));
    
    
}