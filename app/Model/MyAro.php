<?php

App::uses('AppModel', 'Model');

class MyAro extends AppModel {
    public $useTable  = 'aros';
    public $hasMany = array('Authorization'=>array('className'=>'Authorization', 'foreignKey'=>'aro_id'));
}