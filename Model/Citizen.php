<?php

App::uses('AppModel', 'Model');

class Citizen extends AppModel {

    var $name = 'Citizen';
    var $actsAs = array(
    );
    var $belongsTo = array(
        'Plan' => array(
            'foreignKey' => 'Plan_id',
            'className' => 'Plan',
        ),
        'Event' => array(
            'foreignKey' => 'Event_id',
            'className' => 'Event',
        ),
        'Member' => array(
            'foreignKey' => 'created_by',
            'className' => 'Member',
        ),
    );

    function afterSave($created, $options = array()) {
        
    }

}
