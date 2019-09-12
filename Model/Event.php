<?php

App::uses('AppModel', 'Model');

class Event extends AppModel {

    var $name = 'Event';
    var $actsAs = array(
    );
    var $belongsTo = array(
        'Plan' => array(
            'foreignKey' => 'Plan_id',
            'className' => 'Plan',
        ),
        'Member' => array(
            'foreignKey' => 'created_by',
            'className' => 'Member',
        ),
    );
    var $hasMany = array(
        'Citizen' => array(
            'foreignKey' => 'Event_id',
            'dependent' => false,
            'className' => 'Citizen',
        ),
        'Speaker' => array(
            'foreignKey' => 'Event_id',
            'dependent' => false,
            'className' => 'Speaker',
        ),
    );

    function afterSave($created, $options = array()) {
        
    }

}
