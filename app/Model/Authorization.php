<?php

App::uses('AppModel', 'Model');

class Authorization extends AppModel {
    
    public $useTable  = 'aros_acos';
    
    public $belongsTo = array('MyAro'=>array('className'=>'MyAro', 'foreignKey'=>'aro_id'),
                              'MyAco'=>array('className'=>'MyAco', 'foreignKey'=>'aco_id'));

}